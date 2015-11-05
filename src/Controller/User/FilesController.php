<?php

namespace App\Controller\User;

use App\Controller\AppController;

/**
 * Files Controller
 *
 * @property \App\Model\Table\FilesTable $Files
 */
class FilesController extends UserAppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('UpManager');
        $this->loadComponent('SimpleImage');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function manage()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('files', $this->paginate($this->Files));
        $this->set('_serialize', ['files']);
    }

    /**
     * View method
     *
     * @param string|null $id File id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $file = $this->Files->get($id, [
            'contain' => ['Users', 'Itemfiles']
        ]);
        $this->set('file', $file);
        $this->set('_serialize', ['file']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $file = $this->Files->newEntity();
        if ($this->request->is('post')) {
            $fileInfos = $this->request->data['file'];
            $pathInfo = pathinfo($fileInfos['name']);

            // Checking file :
            if (!$this->UpManager->checkFileType($pathInfo['extension'])) {
                $this->Flash->error(__d('files', 'This filetype is not allowed.'));
            } elseif (!$this->UpManager->checkFileSize($fileInfos['size'])) {
                $this->Flash->error(__d('files', 'File is too long. Max file size is {0}Kb', $this->UpManager->maxSize / 1024));
            } else {

                // Saving file and preparing the db infos
                $fileItem = [
                    'name' => $fileInfos['name'],
                    'filename' => $this->UpManager->makeFileName($pathInfo['extension']),
                    'weight' => $fileInfos['size'],
                    'description' => $this->request->data['description'],
                    'sfw' => $this->request->data['sfw'],
                    'user_id' => $this->Auth->user('id'),
                    'license_id' => $this->request->data['license_id']
                ];

                if (in_array($pathInfo['extension'], $this->UpManager->accepted['image'])) {
                    $this->UpManager->preparePath('thumb');
                    // Make some thumbs
                    $this->SimpleImage->load($fileInfos['tmp_name']);
                    $this->SimpleImage->resizeToWidth('200');
                    // Save and return errors if any
                    if (!$this->SimpleImage->save($this->UpManager->currentThumbPath . DS . $fileItem['filename'])) {
                        $this->Flash->error(__d('files', 'The thumbnail could not be saved in the destination folder. Please, try again.'));
                    }
                }
                
                // Save the uploaded file
                $this->UpManager->preparePath('file');

                if (!move_uploaded_file($fileInfos['tmp_name'], $this->UpManager->currentFilePath . DS . $fileItem['filename'])) {
                    $this->Flash->error(__d('files', 'The file could not be saved in the destination folder. Please, try again.'));
                } else {
                    $file = $this->Files->patchEntity($file, $fileItem);
                    if ($this->Files->save($file)) {
                        $this->Flash->success(__d('files', 'The file has been saved.'));
                        $this->Act->add($file->id, 'add', 'Files');
                        return $this->redirect(['action' => 'manage']);
                    } else {
                        $this->Flash->error(__d('elabs', 'The file could not be saved. Please, try again.'));
                    }
                }
            }
        }
        $licenses = $this->Files->Licenses->find('list', ['limit' => 200]);
        $this->set(compact('file', 'licenses'));
        $this->set('_serialize', ['file']);
    }

    /**
     * Edit method
     *
     * @param string|null $id File id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $file = $this->Files->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $file = $this->Files->patchEntity($file, $this->request->data);
            if ($this->Files->save($file)) {
                $this->Flash->success(__('The file has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The file could not be saved. Please, try again.'));
            }
        }
        $users = $this->Files->Users->find('list', ['limit' => 200]);
        $this->set(compact('file', 'users'));
        $this->set('_serialize', ['file']);
    }

    /**
     * Delete method
     *
     * @param string|null $id File id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $file = $this->Files->get($id);
        if ($this->Files->delete($file)) {
            $this->Flash->success(__('The file has been deleted.'));
        } else {
            $this->Flash->error(__('The file could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
