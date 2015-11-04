<?php

namespace App\Controller\Admin;

use App\Controller\Admin\AdminAppController;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AdminAppController
{

    public function beforeRender(\Cake\Event\Event $event)
    {
        parent::beforeRender($event);
        $this->viewBuilder()->helpers(['ItemsAdmin']);
        $this->viewBuilder()->helpers(['License']);
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'fields' => ['id', 'name', 'sfw', 'created', 'modified', 'status', 'user_id', 'license_id'],
            'contain' => [
                'Users' => ['fields' => ['id', 'username']],
                'Licenses' => ['fields' => ['id', 'name', 'icon']]
            ]
        ];
        $this->set('projects', $this->paginate($this->Projects));
        $this->set('_serialize', ['projects']);
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => [
                'Users' => ['fields' => ['id', 'username']],
                'Licenses' => ['fields' => ['id', 'name', 'icon']],
                'ProjectUsers']
        ]);
        $this->set('project', $project);
        $this->set('_serialize', ['project']);
    }

    /**
     * Changes a project's status.
     * 
     * @param int $id
     * @param string $state The new state (lock, unlock or remove)
     * @return void
     */
    public function changeState($id, $state = 'lock')
    {
        switch ($state) {
            case 'lock':
                $successMessage = __d('users', 'The project has been locked.');
                $this->Act->remove($id);
                $bit = 2;
                break;
            case 'unlock':
                $successMessage = __d('users', 'The project has been unlocked.');
                // TODO: there's something to do with re-publishing things
                $bit = 1;
                break;
            case 'remove':
                $successMessage = __d('users', 'The project has been removed.');
                $bit = 3;
                $this->Act->remove($id, 'Projects', false);
                break;
            default:
                $successMessage = __d('users', 'The project has been locked.');
                $bit = 2;
        }
        $project = $this->Projects->get($id, [
            'fields' => ['id', 'status']
        ]);
        $project->status = $bit;
        if ($this->Projects->save($project)) {
            if (!$this->request->is('ajax')) {
                $this->Flash->Success($successMessage);
            }
        } else {
            if (!$this->request->is('ajax')) {
                $this->Flash->Error(__d('users', 'An error occured'));
            }
        }
        $this->set('project', $project);
        $this->set('_serialize', ['project']);
        // Ready fo ajax calls
        // TODO : ajax action in index view
        if (!$this->request->is('ajax')) {
            $this->redirect(['action' => 'index']);
        }
    }
}
