<?php

namespace App\Controller\User;

/**
 * Files Controller
 *
 * @property \App\Model\Table\FilesTable $Files
 */
class FilesController extends UserAppController
{

    /**
     * Initializes and loads extra components
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('UpManager');
        $this->loadComponent('SimpleImage');
    }

    /**
     * Index method
     *
     * @param string $nsfw NSFW filter
     * @param string $status Status filter
     *
     * @return void
     */
    public function index($nsfw = 'all', $status = 'all')
    {
        $this->paginate = [
            'fields' => ['id', 'name', 'filename', 'sfw', 'created', 'modified', 'status', 'license_id', 'user_id'],
            'contain' => [
                'Licenses' => ['fields' => ['id', 'name']],
                'Languages' => ['fields' => ['id', 'name', 'iso639_1']],
                'Projects' => ['fields' => ['id', 'name', 'ProjectsFiles.file_id']],
            ],
            'conditions' => ['user_id' => $this->Auth->user('id')],
            'order' => ['created' => 'desc'],
            'sorWhiteList' => ['name', 'created', 'modified', 'weight'],
        ];

        if ($nsfw === 'safe') {
            $this->paginate['conditions']['sfw'] = 1;
        } elseif ($nsfw === 'unsafe') {
            $this->paginate['conditions']['sfw'] = 0;
        }
        if ($status === 'locked') {
            $this->paginate['conditions']['status'] = 2;
        }

        $this->set('files', $this->paginate($this->Files));
        $this->set('filterNSFW', $nsfw);
        $this->set('filterStatus', $status);
        $this->set('_serialize', ['files']);
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
            $finalFileName = $this->UpManager->makeFileName($pathInfo['extension']);

            // Checking file :
            if (!$this->UpManager->checkFileType($pathInfo['extension'])) {
                $this->Flash->error(__d('elabs', 'This filetype is not allowed.'));
            } elseif (!$this->UpManager->checkFileSize($fileInfos['size'])) {
                $this->Flash->error(__d('elabs', 'File is too big. Max file size is {0}Kb', $this->UpManager->maxSize / 1024));
            } else {
                if (in_array($pathInfo['extension'], $this->UpManager->accepted['image'])) {
                    $this->UpManager->preparePath('thumb');
                    // Make some thumbs
                    $this->SimpleImage->load($fileInfos['tmp_name']);
                    $this->SimpleImage->resizeToWidth('200');
                    // Save and return errors if any
                    if (!$this->SimpleImage->save(WWW_ROOT . $this->UpManager->baseDir . DS . $this->UpManager->currentThumbPath . DS . $finalFileName)) {
                        $this->Flash->error(__d('elabs', 'The thumbnail could not be saved in the destination folder. Please, try again.'));
                    }
                }

                //Creates folder and return final file path
                $currentFilePath = $this->UpManager->preparePath('file') . DS . $finalFileName;
                $fileItem = [
                    'name' => $fileInfos['name'],
                    'filename' => $currentFilePath,
                    'weight' => $fileInfos['size'],
                    'mime' => $fileInfos['type'],
                    'description' => $this->request->data['description'],
                    'sfw' => $this->request->data['sfw'],
                    'user_id' => $this->Auth->user('id'),
                    'license_id' => $this->request->data['license_id'],
                    'language_id' => $this->request->data['language_id'],
                    'projects' => $this->request->data['projects'],
                    'albums' => $this->request->data['albums'],
                    'status' => 1
                ];

                if (!move_uploaded_file($fileInfos['tmp_name'], WWW_ROOT . $this->UpManager->baseDir . $currentFilePath)) {
                    $this->Flash->error(__d('elabs', 'The file could not be saved in the destination folder. Please, try again.'));
                } else {
                    $file = $this->Files->patchEntity($file, $fileItem);
//                    debug($this->request->data);
//                    debug($file);die;
                    if ($this->Files->save($file)) {
                        $this->Flash->success(__d('elabs', 'The file has been saved.'));
                        $this->Act->add($file->id, 'add', 'Files', $file->created);
                        $this->redirect(['action' => 'index']);
                    } else {
//                        debug($file->errors());die;
                        $this->Flash->error(__d('elabs', 'The file could not be saved. Please, try again.'));
                    }
                }
            }
        }
        $licenses = $this->Files->Licenses->find('list', ['limit' => 200]);
        $languages = $this->Files->Languages->find('list');
        $projects = $this->Files->Projects->find('list', ['condition' => ['user_id' => $this->Auth->user('id')]]);
        $albums = $this->Files->Albums->find('list', ['condition' => ['user_id' => $this->Auth->user('id')]]);
        $this->set(compact('file', 'licenses', 'languages', 'projects', 'albums'));
        $this->set('_serialize', ['file']);
    }

    /**
     * Edit method
     *
     * @param string|null $id File id.
     *
     * @return void Redirects on successful edit, renders view otherwise.
     *
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $file = $this->Files->get($id, [
            'conditions' => ['user_id' => $this->Auth->user('id')],
            'contain' => [
                'Projects' => ['fields' => ['id', 'name', 'ProjectsFiles.file_id']],
                'Albums' => ['fields' => ['id', 'name', 'AlbumsFiles.file_id']],
            ]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $file = $this->Files->patchEntity($file, $this->request->data);
            if ($this->Files->save($file)) {
                $this->Flash->success(__d('elabs', 'The file has been saved.'));
                if ($this->request->data['isMinor'] == '0') {
                    $this->Act->add($file->id, 'edit', 'Files', $file->modified);
                }
                $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__d('elabs', 'The file could not be saved. Please, try again.'));
                $errors = $file->errors();
                $errorMessages = [];
                array_walk_recursive($errors, function ($a) use (&$errorMessages) {
                    $errorMessages[] = $a;
                });
                $this->Flash->error(__d('elabs', 'Some errors occured. Please, try again.'), ['params' => ['errors' => $errorMessages]]);
            }
        }
        $licenses = $this->Files->Licenses->find('list', ['limit' => 200]);
        $languages = $this->Files->Languages->find('list');
        $projects = $this->Files->Projects->find('list', ['condition' => ['user_id' => $this->Auth->user('id')]]);
        $albums = $this->Files->Albums->find('list', ['condition' => ['user_id' => $this->Auth->user('id')]]);
        $this->set(compact('file', 'licenses', 'languages', 'projects', 'albums'));
        $this->set('_serialize', ['file']);
    }

    /**
     * Delete method
     *
     * @param string|null $id File id.
     *
     * @return void Redirects to index.
     *
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $file = $this->Files->get($id, [
            'conditions' => [
                'user_id' => $this->Auth->user('id')
            ]
        ]);
        if ($this->Files->delete($file)) {
            $this->Flash->success(__d('elabs', 'The file has been deleted.'));
            $this->Act->remove($id);
        } else {
            $this->Flash->error(__d('elabs', 'The file could not be deleted. Please, try again.'));
        }
        $this->redirect(['action' => 'index']);
    }
}
