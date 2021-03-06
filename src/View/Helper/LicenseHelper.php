<?php

namespace App\View\Helper;

use Cake\View\Helper;

class LicenseHelper extends Helper
{
    public $helpers = ['Html'];

    /**
     * Returns a nice link with license and icon
     *
     * @param object $license License instance
     * @param bool $link Set to false to return plain text (with icon)
     *
     * @return string
     */
    public function d($license, $link = true)
    {
        $text = $this->Html->iconT($license->icon, $license->name);

        return ($link) ? $this->Html->link($text, ['prefix' => false, 'controller' => 'licenses', 'action' => 'view', $license->id], ['escape' => false]) : $text;
    }
}
