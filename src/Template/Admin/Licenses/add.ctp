<?php
/*
 * File:
 *   src/Templates/Admin/Licenses/add.ctp
 * Description:
 *   Form to add a license
 * Layout element:
 *   adminform.ctp
 */

// Page title
$this->assign('title', __d('licenses', 'Admin/License&gt; Create'));

// Related links block
// -------------------
$this->start('pageLinks');
$linkOptions = ['class' => 'list-group-item', 'escape' => false];
echo $this->Html->link(__d('licenses', '{0}&nbsp;{1}', [$this->Html->icon('list'), 'List licenses']), ['prefix' => 'admin', 'controller' => 'Licenses', 'action' => 'index'], $linkOptions);
$this->end();

// Page content block
// ------------------
$this->start('pageContent');
echo $this->Form->create($license);
echo $this->Form->input('name');
echo $this->Form->input('link');
?>
<div class="row">
    <div class="col-sm-6">
        <?php echo $this->Form->select('icon', ['creative-commons' => 'Creative Commons', 'copyright' => 'Copyright sign']); ?>
    </div>
    <div class="col-sm-6">
        <?php echo $this->Form->submit(__d('elabs', 'Create'), ['class' => 'btn-primary btn-block']); ?>
    </div>
</div>
<?php
echo $this->Form->end();
$this->end();

// Load the custom layout element
// ------------------------------
echo $this->element('layouts/adminform');
