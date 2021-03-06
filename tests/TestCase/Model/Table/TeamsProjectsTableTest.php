<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TeamsProjectsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TeamsProjectsTable Test Case
 */
class TeamsProjectsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TeamsProjectsTable
     */
    public $TeamsProjectsTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.teams_projects',
        'app.teams',
        'app.projects',
        'app.licenses',
        'app.files',
        'app.languages',
        'app.notes',
        'app.users',
        'app.posts',
        'app.tags',
        'app.files_tags',
        'app.notes_tags',
        'app.posts_tags',
        'app.projects_tags',
        'app.projects_posts',
        'app.acts',
        'app.reports',
        'app.teams_users',
        'app.projects_notes',
        'app.projects_files'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TeamsProjects') ? [] : ['className' => 'App\Model\Table\TeamsProjectsTable'];
        $this->TeamsProjectsTable = TableRegistry::get('TeamsProjects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TeamsProjectsTable);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
