<?php

namespace App\View\Helper;

use Cake\View\Helper;

class ItemsAdminHelper extends Helper
{
    public $helpers=['Html'];
    public function statusLabel($status, $icon = true)
    {
        switch ($status) {
            case 0: // Waiting for approval
                $statusIcon = 'exclamation';
                $text = __d('user', 'Waiting');
                break;
            case 1: // Approved
                $statusIcon = 'check';
                $text = __d('user', 'Published');
                break;
            case 2: // Locked
                $statusIcon = 'lock';
                $text = __d('user', 'Locked');
                break;
            case 3: // Deleted
                $statusIcon = 'times';
                $text = __d('user', 'Removed');
                break;
        }
        if ($icon) {
            return __d('elabs', '{0}&nbsp;{1}', [$this->Html->icon($statusIcon), $text]);
        } else {
            return $text;
        }
    }
    
    public function sfwLabel($sfw, $icon=true){
        switch($sfw){
            case 1:
                $labelIcon='check';
                $labelColor='success';
                $text=__d('elabs', 'Yes');
                break;
            default:
                $labelIcon='times';
                $labelColor='danger';
                $text=__d('elabs', 'No');
        }
        if ($icon) {
            $out= __d('elabs', '{0}&nbsp;{1}', [$this->Html->icon($labelIcon), $text]);
        } else {
            $out= $text;
        }
        return '<span class="label label-'.$labelColor.'">'.$out.'</span>';
    }
}
