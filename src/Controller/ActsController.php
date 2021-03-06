<?php

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\ActsTable;
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;

/**
 * Acts Controller
 *
 * @property ActsTable $Acts
 */
class ActsController extends AppController
{
    /**
     * Config value, like strings and model names.
     * Filled in initialize();
     *
     * @var array
     */
    public $config = [
        'strings' => [],
        'models' => [],
    ];

    /**
     * Loads additionnal models and create the configuration array
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        // Create config strings
        $this->config = [
            'strings' => [
                'edit' => __d('elabs', 'has been updated'),
                'delete' => __d('elabs', 'has been removed'),
            ],
            'models' => [
                'Files' => __d('elabs', 'File'),
                'Posts' => __d('elabs', 'Article'),
                'Projects' => __d('elabs', 'Project'),
                'Notes' => __d('elabs', 'Note'),
                'Albums' => __d('elabs', 'Album'),
            ]
        ];

        // Load models
        foreach ($this->config['models'] as $model => $item) {
            $this->$model = TableRegistry::get($model);
        }
    }

    /**
     * Index method
     *
     * @param string $updateFilter Hides the updates, 'yes' or 'no'
     *
     * @return void
     */
    public function index($updateFilter = 'showUpdates')
    {
        // Commons fields to get from Licenses table
        $licenseConfig = ['fields' => ['id', 'name', 'icon', 'link']];
        $userConfig = ['fields' => ['id', 'realname', 'username']];
        $languageConfig = ['fields' => ['id', 'name', 'iso639_1']];

        // Get the list of items
        $this->paginate = [
            'contain' => [
                'Posts' => [
                    'fields' => ['id', 'title', 'excerpt', 'modified', 'publication_date', 'sfw', 'user_id', 'created', 'license_id', 'language_id'],
                    'conditions' => [ // SFW is made after
                        'Posts.status' => 1,
                    ],
                    'Licenses' => $licenseConfig,
                    'Users' => $userConfig,
                    'Languages' => $languageConfig,
                    'Projects' => ['fields' => ['id', 'name', 'ProjectsPosts.post_id']],
                ],
                'Projects' => [
                    'fields' => ['id', 'name', 'short_description', 'sfw', 'created', 'modified', 'user_id', 'license_id', 'language_id'],
                    'conditions' => [ // SFW is made after
                        'Projects.status' => 1,
                    ],
                    'Licenses' => $licenseConfig,
                    'Users' => $userConfig,
                    'Languages' => $languageConfig,
                ],
                'Files' => [
                    'fields' => ['id', 'name', 'description', 'filename', 'created', 'modified', 'sfw', 'user_id', 'license_id', 'language_id'],
                    'conditions' => [ // SFW is made after
                        'Files.status' => 1,
                    ],
                    'Licenses' => $licenseConfig,
                    'Users' => $userConfig,
                    'Languages' => $languageConfig,
                    'Projects' => ['fields' => ['id', 'name', 'ProjectsFiles.file_id']],
                ],
                'Notes' => [
                    'fields' => ['id', 'text', 'created', 'modified', 'sfw', 'user_id', 'license_id', 'language_id'],
                    'conditions' => [ // SFW is made after
                        'Notes.status' => 1,
                    ],
                    'Licenses' => $licenseConfig,
                    'Users' => $userConfig,
                    'Languages' => $languageConfig,
                    'Projects' => ['fields' => ['id', 'name', 'ProjectsNotes.note_id']],
                ],
                'Albums' => [
                    'fields' => ['id', 'name', 'created', 'modified', 'sfw', 'user_id', 'language_id'],
                    'conditions' => [], // SFW is made after
                    'Users' => $userConfig,
                    'Languages' => $languageConfig,
                    'Projects' => [
                        'fields' => ['id', 'name', 'ProjectsAlbums.album_id'],
                        'conditions' => ['status' => STATUS_PUBLISHED],
                    ],
                    'Files' => [
                        'fields' => ['id', 'name', 'filename', 'sfw', 'AlbumsFiles.album_id'],
                        'conditions' => [
                            'status' => STATUS_PUBLISHED,
                        ],
                    ],
                ],
            ],
            'limit' => 30,
            'order' => [
                'Acts.created' => 'desc'
            ],
            'sortWhiteList' => [],
        ];

        // SFW conditions :
        if (!$this->request->session()->read('seeNSFW')) {
            $this->paginate['contain']['Posts']['conditions']['Posts.sfw'] = true;
            $this->paginate['contain']['Projects']['conditions']['Projects.sfw'] = true;
            $this->paginate['contain']['Files']['conditions']['Files.sfw'] = true;
            $this->paginate['contain']['Notes']['conditions']['Notes.sfw'] = true;
            $this->paginate['contain']['Albums']['conditions']['Albums.sfw'] = true;
        }

        if ($updateFilter === 'hideUpdates') {
            $this->paginate['conditions']['type'] = 'add';
        }

        $acts = $this->paginate($this->Acts);

        // Pass variables to view
        $this->set('filterUpdates', $updateFilter);
        $this->set('acts', $acts);
        $this->set('config', $this->config);
        $this->set('_serialize', ['acts']);
    }
}
