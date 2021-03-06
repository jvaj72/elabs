<?php
/*
 * File:
 *   src/Templates/Admin/Files/index.ctp
 * Description:
 *   Administration - List of files, sortable
 * Layout element:
 *   adminindex.ctp
 * @todo: add filters
 * Notes: paginations links are in the table, not in a block.
 */

// Page title
$this->assign('title', __d('elabs', 'List of licenses'));

// Breadcrumbs
$this->Html->addCrumb(__d('elabs', 'Licenses'), ['action' => 'index']);
$this->Html->addCrumb($this->fetch('title'));

// Block: Page actions
// -------------------
$this->start('pageActions');
$linkIcon=$this->Html->iconT('plus', __d('elabs', 'New license'));
echo $this->Html->link($linkIcon, ['action' => 'add'], ['class' => 'btn btn-success btn-block', 'escape' => false]);
$this->end();

// Block: Page content
// -------------------
$this->start('pageContent');
?>
<div class="panel">
    <table class="table table-condensed table-striped table-bordered">
        <thead>
            <tr>
                <th><?php echo $this->Paginator->sort('name', __d('elabs', 'Name')) ?></th>
                <th><?php echo $this->Paginator->sort('link', __d('elabs', 'Link')) ?></th>
                <th><?php echo $this->Paginator->sort('post_count', __d('elabs', 'Articles')) ?></th>
                <th><?php echo $this->Paginator->sort('project_count', __d('elabs', 'Projects')) ?></th>
                <th><?php echo $this->Paginator->sort('file_count', __d('elabs', 'Files')) ?></th>
                <th class="actions"><?php echo __d('elabs', 'Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!$licenses->isEmpty()):
                foreach ($licenses as $license):
                    ?>
                    <tr>
                        <td><?php echo $this->Html->iconT($license->icon, h($license->name)) ?></td>
                        <td><?php echo $this->Html->link(h($license->link), h($license->link)) ?></td>
                        <td><?php echo h($license->post_count) ?></td>
                        <td><?php echo h($license->project_count) ?></td>
                        <td><?php echo h($license->file_count) ?></td>
                        <td>
                            <div class="btn-group btn-group-xs">
                                <?php
                                echo $this->Html->link($this->Html->icon('pencil', ['title' => __d('elabs', 'Edit')]), ['action' => 'edit', $license->id], [
                                    'class' => 'btn btn-primary',
                                    'escape' => false
                                ]);
                                echo $this->Form->postLink($this->Html->icon('trash', ['title' => __d('elabs', 'Delete')]), ['action' => 'delete', $license->id], [
                                    'confirm' => __d('elabs', 'Are you sure you want to delete # {0}?', $license->id),
                                    'class' => 'btn btn-danger',
                                    'escape' => false])
                                ?>
                            </div>
                        </td>
                    </tr>
                    <?php
                endforeach;
            else:
                ?>
                <tr>
                    <td colspan="7" class="text-center"><?php echo __d('elabs', 'You have no licenses yet. Please add one.') ?></td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php
$this->end();

// Load the layout element
// -----------------------
echo $this->element('layouts/adminindex');
