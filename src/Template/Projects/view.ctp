<?php
/*
 * File:
 *   src/Templates/Projects/view.ctp
 * Description:
 *   Display of a single project
 * Layout element:
 *   defaultview.ctp
 */

// Page title
$this->assign('title', h($project->name));

// Language
$this->assign('contentLanguage', $project->language->iso639_1);

// Breadcrumbs
$this->Html->addCrumb(__d('elabs', 'Projects'), ['action' => 'index']);
$this->Html->addCrumb($this->Html->langLabel($project->name, $project->language->iso639_1, ['label' => false]));

// Block: Item informations
// ------------------------
$this->start('pageInfos');
?>
<ul class="list-unstyled">
    <li><strong><?php echo __d('elabs', 'License:') ?></strong> <?php echo $this->Html->link($this->Html->iconT($project->license->icon, $project->license->name), ['controller' => 'Licenses', 'action' => 'view', $project->license->id], ['escape' => false]) ?></li>
    <li><strong><?php echo __d('elabs', 'Language:') ?></strong> <?php echo $this->Html->langLabel($project->language->name, $project->language->iso639_1) ?></li>
    <li><strong><?php echo __d('elabs', 'Created on:') ?></strong> <?php echo h($project->created) ?></li>
    <?php if ($project->has('modified')): ?>
        <li><strong><?php echo __d('elabs', 'Updated on:') ?></strong> <?php echo h($project->modified) ?></li>
    <?php endif; ?>
    <li><strong><?php echo __d('elabs', 'Safe content:') ?></strong> <span class="label label-<?php echo $project->sfw ? 'success' : 'danger'; ?>"><?php echo $project->sfw ? __d('elabs', 'Yes') : __d('elabs', 'No'); ?></span></li>
    <li><strong><?php echo __d('elabs', 'Tags:') ?></strong> <?php echo $this->element('layout/dev_inline') ?></li>
</ul>

<h5 class="list-group-item-heading"><?php echo __d('elabs', 'Members') ?></h5>
<ul class="list-unstyled">
    <li><?php echo $project->has('user') ? $this->Html->link($project->user->username, ['controller' => 'Users', 'action' => 'view', $project->user->id]) : '' ?></li>
    <li><?php echo $this->element('layout/dev_inline') ?></li>
</ul>
<?php
$this->end();

// Block: Actions
// --------------
if ($project->has('mainurl')):
    $this->start('pageActions');
    echo $this->Html->link($this->Html->iconT('external-link', __d('elabs', 'Website')), $project->mainurl, ['escape' => false, 'class' => 'btn btn-block']);
    $this->end();
endif;

// Block: Page content
// -------------------
$this->start('pageContent');
?>
<div lang="<?php echo $project->language->id ?>">
    <?php
    echo $this->Html->displayMD($project->short_description);
    echo $this->Html->displayMD($project->description);
    ?>
</div>
<div class="panel">
    <ul class="nav nav-tabs nav-justified">
        <li class="active"><a data-toggle="tab" href="#posts-tab"><?php echo __d('elabs', 'Articles {0}', '<span class="badge">' . count($project->posts) . '</span>') ?></a></li>
        <li><a data-toggle="tab" href="#notes-tab"><?php echo __d('elabs', 'Notes {0}', '<span class="badge">' . count($project->notes) . '</span>') ?></a></li>
        <li><a data-toggle="tab" href="#files-tab"><?php echo __d('elabs', 'Files {0}', '<span class="badge">' . count($project->files) . '</span>') ?></a></li>
        <li><a data-toggle="tab" href="#albums-tab"><?php echo __d('elabs', 'Albums {0}', '<span class="badge">' . count($project->albums) . '</span>') ?></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="posts-tab">
            <?php
            if (!empty($project->posts)):
                foreach ($project->posts as $posts):
                    echo $this->element('posts/card', ['data' => $posts, 'projectInfos' => false, 'event' => false]);
                endforeach;
            else:
                echo $this->element('layout/empty', ['alternative' => false]);
            endif;
            ?>
        </div>

        <div class="tab-pane" id="notes-tab">
            <?php
            if (!empty($project->notes)):
                foreach ($project->notes as $note):
                    echo $this->element('notes/card', ['data' => $note, 'projectInfos' => false, 'event' => false]);
                endforeach;
            else:
                echo $this->element('layout/empty', ['alternative' => false]);
            endif;
            ?>
        </div>

        <div class="tab-pane" id="files-tab">
            <?php
            if (!empty($project->files)):
                foreach ($project->files as $files):
                    echo $this->element('files/card', ['data' => $files, 'projectInfos' => false, 'event' => false]);
                endforeach;
            else:
                echo $this->element('layout/empty', ['alternative' => false]);
            endif;
            ?>
        </div>

        <div class="tab-pane" id="albums-tab">
            <?php
            if (!empty($project->albums)):
                foreach ($project->albums as $albums):
                    echo $this->element('albums/card', ['data' => $albums, 'projectInfos' => false, 'event' => false]);
                endforeach;
            else:
                echo $this->element('layout/empty', ['alternative' => false]);
            endif;
            ?>
        </div>
    </div>
</div>
<?php
echo $this->cell('Comments::AddForm', ['authUser'=>$authUser]);

$this->end();

// Additionnal JS
// --------------
$this->Html->script('scrollbar',['block'=>'pageBottomScripts']);

// Load the layout element
// -----------------------
echo $this->element('layouts/defaultview');
