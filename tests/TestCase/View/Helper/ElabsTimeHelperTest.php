<?php

namespace App\Test\TestCase\View\Helper;

use App\View\Helper\ElabsTimeHelper;
use Cake\TestSuite\TestCase;
use Cake\View\View;

/**
 * App\View\Helper\ElabsTimeHelper Test Case
 */
class ElabsTimeHelperTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\View\Helper\ElabsTimeHelper
     */
    public $ElabsTimeHelper;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $view = new View();
        $this->ElabsTimeHelper = new ElabsTimeHelper($view);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ElabsTimeHelper);

        parent::tearDown();
    }

    /**
     * Test isSameDay method
     *
     * @return void
     */
    public function testIsSameDay()
    {
        $this->assertEquals(true, $this->ElabsTimeHelper->isSameDay(\Cake\I18n\FrozenTime::now(), \Cake\I18n\FrozenTime::now()));
        $this->assertEquals(false, $this->ElabsTimeHelper->isSameDay(\Cake\I18n\FrozenTime::now()->yesterday(), \Cake\I18n\FrozenTime::now()->tomorrow()));
        $this->assertEquals(true, $this->ElabsTimeHelper->isSameDay(\Cake\I18n\FrozenTime::now()->yesterday(), \Cake\I18n\FrozenTime::now()->subDay()));
    }
}
