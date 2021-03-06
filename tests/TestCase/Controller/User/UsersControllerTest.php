<?php

namespace App\Test\TestCase\Controller\User;

use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\User\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{
    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.languages', // Needed for some layout vars
        'app.users',
    ];

    /**
     * Users credentials to put in session in order to create a fake authentication
     *
     * @var array
     */
    public $userCreds = [
        'author' => ['Auth' => ['User' => ['id' => 'c5fba703-fd07-4a1c-b7b0-345a77106c32', 'email' => 'test@example.com', 'username' => 'real_test', 'realname' => 'The real tester', 'password' => '$2y$10$wpJrqUvcAlUbLUxLnP8P5.OU7TXtfjT4/K5RYGdjJVkh6BqNEh3XC', 'website' => null, 'bio' => 'Some things', 'created' => '2016-08-09 01:15:26', 'modified' => '2016-08-09 01:18:01', 'role' => 'author', 'status' => 1, 'file_count' => 0, 'note_count' => 0, 'post_count' => 1, 'project_count' => 0, 'preferences' => '{"showNSFW":"0","defaultSiteLanguage":"","defaultWritingLanguage":"eng","defaultWritingLicense":"1"}']]],
    ];

    /**
     * Test edit action
     *
     * @return void
     */
    public function testEdit()
    {
        $this->session($this->userCreds['author']);

        // Form
        // ----
        $this->get('/user/users/edit');
        $this->assertResponseOk();

        // Edition
        // -------
        $postData = [
            'email' => 'test@example.com',
            'realname' => 'The real tester',
            'website' => 'http://some-example.com',
            'bio' => 'Some other things',
            'role' => 'author',
            'preferences' => '{"showNSFW":"0","defaultSiteLanguage":"","defaultWritingLanguage":"eng","defaultWritingLicense":"1"}'];
        $this->post('/user/users/edit', $postData);
        $this->assertRedirect('/user/users/edit');
        $this->assertEquals('Some other things', $this->_controller->viewVars['user']['bio']);

        // Faking the user id in post:
        $adminId = '70c8fff0-1338-48d2-b93b-942a26e4d685';
        $postData = [
            'id' => $adminId,
            'email' => 'test@example.com',
            'realname' => 'The real tester',
            'website' => 'http://some-example.com',
            'bio' => 'Some things',
            'role' => 'author',
            'preferences' => '{"showNSFW":"0","defaultSiteLanguage":"","defaultWritingLanguage":"eng","defaultWritingLicense":"1"}'];
        $this->post('/user/users/edit', $postData);
        $this->assertNotEquals($adminId, $this->_controller->viewVars['user']['id']);
        $this->assertRedirect('/user/users/edit');
    }

    /**
     * Test add action
     *
     * @return void
     */
    public function testUpdatePassword()
    {
        $this->markTestIncomplete();
    }

    /**
     * Test index action
     *
     * @return void
     */
    public function testCloseAccount()
    {
        $this->session($this->userCreds['author']);

        // Form
        // ----
        $this->get('/user/users/edit');
        $this->assertResponseOk();

        // Edition
        // -------
        $postData = ['current_password' => 'adminadmin'];
        $this->post('/user/users/close_account', $postData);
        // Checke for users state
        $Users = \Cake\ORM\TableRegistry::get('Users');
        $nb = $Users->find('all', ['conditions' => ['id' => 'c5fba703-fd07-4a1c-b7b0-345a77106c32', 'status' => 3]])->count();
        $this->assertEquals(1, $nb);
        $this->assertRedirect('/');
    }
}
