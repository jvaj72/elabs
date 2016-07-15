<?php
/*
 * File:
 *   src/Templates/Users/Files/index.ctp
 * Description:
 *   List of files owned by the logged in user
 * Layout element:
 *   defaultindex.ctp
 */

// Page title
$this->assign('title', __d('files', 'Your files'));

// Block: Pagination order links
// -----------------------------
$this->start('pageOrderBy');
echo $this->Paginator->sort('name', __d('files', 'Name'));
echo $this->Paginator->sort('weight', __d('files', 'File size'));
echo $this->Paginator->sort('created', __d('files', 'Addition date'));
echo $this->Paginator->sort('modified', __d('elabs', 'Modification date'));
$this->end();

// Filters
// -------
$this->start('pageFilters');
$options = ['escape' => false];
$active = ['<span class="fa fa-fw fa-check-circle-o"></span>'];
$inactive = ['<span class="fa fa-fw fa-circle-o"></span>'];
$clear = ['<span class="fa fa-fw fa-times"></span>'];
echo $this->Html->link(__d('elabs', '{0}&nbsp;Clear filters', $clear), ['all', 'all'], $options);
$icon = ($filterNSFW === 'safe') ? $active : $inactive;
echo $this->Html->link(__d('elabs', '{0}&nbsp;Only safe files', $icon), ['safe', $filterStatus], $options);
$icon = ($filterNSFW === 'unsafe') ? $active : $inactive;
echo $this->Html->link(__d('elabs', '{0}&nbsp;Only unsafe files', $icon), ['unsafe', $filterStatus], $options);
$icon = ($filterStatus === 'locked') ? $active : $inactive;
echo $this->Html->link(__d('elabs', '{0}&nbsp;Only locked files', $icon), [$filterNSFW, 'locked'], $options);
$this->end();

// Page actions
// ------------
$this->start('pageActions');
echo $this->Html->link(__d('elabs', '{0}&nbsp;{1}', ['<span class="fa fa-fw fa-plus"></span>', 'Add a file']), ['action' => 'add'], ['class' => 'btn btn-block', 'escape' => false]);
$this->end();

// Page content
// ------------
$this->start('pageContent');
if (!$files->isEmpty()):
    $tileGroupId = 'tiles-files-group';
    ?>
    <div class="panel-group" id="<?= $tileGroupId ?>" role="tablist" aria-multiselectable="true">
        <?php
        foreach ($files as $file):
            $config = $this->Items->fileConfig($file['filename']);
            echo $this->element('files/tile_userindex', ['tileGroupId' => $tileGroupId, 'file' => $file, 'config' => $config]);
        endforeach;
        ?>
    </div>
    <?php
else:
    echo $this->element('layout/empty');
endif;
$this->end();

// Load the layout element
// -----------------------
echo $this->element('layouts/defaultindex');
