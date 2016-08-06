<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\FilesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Admin\FilesController Test Case
 */
class FilesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.files',
        'app.languages',
        'app.licenses',
        'app.users',
        'app.notes',
        'app.posts',
        'app.projects',
        'app.projects_files',
        'app.reports',
        'app.teams',
        'app.teams_users',
        'app.tags',
        'app.files_tags'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
