<?php

namespace App\Test\TestCase\Controller\Admin;

use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Admin\PostsController Test Case
 */
class PostsControllerTest extends IntegrationTestCase
{
    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.languages', // Needed for some layout vars
        'app.posts',
        // Relations
        'app.acts',
        'app.languages',
        'app.licenses',
        'app.users',
    ];

    /**
     * Users credentials to put in session in order to create a fake authentication
     *
     * @var array
     */
    public $userCreds = [
        'admin' => ['Auth' => ['User' => ['id' => '70c8fff0-1338-48d2-b93b-942a26e4d685', 'email' => 'admin@example.com', 'username' => 'administrator', 'realname' => 'Administrator', 'website' => null, 'bio' => null, 'created' => null, 'modified' => null, 'role' => 'admin', 'status' => 1, 'file_count' => 3, 'note_count' => 0, 'post_count' => 1, 'project_count' => 3, 'preferences' => '{}']]],
    ];

    /**
     * Tests the index function
     */
    public function testIndex()
    {
        // Set session data
        $this->session($this->userCreds['admin']);
        $this->get('/admin/posts');

        // No error
        $this->assertResponseOk();
    }

    /**
     * Tests the view function
     */
    public function testView()
    {
        // Set session data
        $this->session($this->userCreds['admin']);
        $this->get('/admin/posts/view/6e0c6123-2dbd-47d3-868b-9797cd9f3039');

        // No error
        $this->assertResponseOk();
    }

    /**
     * Tests the changeState function
     */
    public function testChangeStateToLocked()
    {
        $postPk = '6e0c6123-2dbd-47d3-868b-9797cd9f3039';
        $Posts = \Cake\ORM\TableRegistry::get('Posts');

        // Set session data
        $this->session($this->userCreds['admin']);

        // Lock
        // ----
        $this->get('/admin/posts/change_state/' . $postPk . '/lock');
        // Checks the new state
        $nb = $Posts->find('all', ['conditions' => ['id' => $postPk, 'status' => 2]])->count();
        $this->assertEquals(1, $nb, 'Post cannot be locked');
        // No error
        $this->assertRedirect('/admin/posts');

        // Unlock
        // ------
        $this->get('/admin/posts/change_state/' . $postPk . '/unlock');
        // Checks the new state
        $nb = $Posts->find('all', ['conditions' => ['id' => $postPk, 'status' => 1]])->count();
        $this->assertEquals(1, $nb, 'Post cannot be unlocked');
        // No error
        $this->assertRedirect('/admin/posts');

        // Remove
        // ------
        $this->get('/admin/posts/change_state/' . $postPk . '/remove');
        // Checks the new state
        $nb = $Posts->find('all', ['conditions' => ['id' => $postPk, 'status' => 3]])->count();
        $this->assertEquals(1, $nb, 'Post cannot be removed');
        // No error
        $this->assertRedirect('/admin/posts');

        // Unlock again (should be impossible)
        // ------------
        $this->get('/admin/posts/change_state/' . $postPk . '/lock');
        // Checks the new state
        $nb = $Posts->find('all', ['conditions' => ['id' => $postPk, 'status' => 2]])->count();
        $this->assertEquals(0, $nb, 'Removed post was unlocked');

        // Error
        $this->assertResponseError();

        // Ajax
        $this->markTestIncomplete('Missing ajax test');
    }
}
