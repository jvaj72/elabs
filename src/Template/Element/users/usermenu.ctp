<?php
$linkConfig = ['escape' => false];
?>
<li>
  <?php echo $this->Html->link(__d('elabs', '{0}&nbsp;{1}', [$this->Html->icon('pencil'), __d('users', 'Update profile')]), ['prefix' => 'user', 'controller' => 'users', 'action' => 'edit'], $linkConfig) ?>
</li>
<li>
  <?php echo $this->Html->link(__d('elabs', '{0}&nbsp;{1}', [$this->Html->icon('sign-out'), __d('users', 'Logout')]), ['prefix' => false, 'controller' => 'users', 'action' => 'logout'], $linkConfig) ?>
</li>
<li class="dropdown-header">
  <?php echo __d('posts', 'Articles:') ?>
</li>
<li><?php echo $this->Html->link(__d('elabs', '{0}&nbsp;{1}', [$this->Html->icon('list'), __d('elabs', 'Manage')]), ['prefix' => 'user', 'controller' => 'posts', 'action' => 'index'], $linkConfig) ?></li>
<li><?php echo $this->Html->link(__d('elabs', '{0}&nbsp;{1}', [$this->Html->icon('plus'), __d('posts', 'Write something !')]), ['prefix' => 'user', 'controller' => 'posts', 'action' => 'add'], $linkConfig) ?></li>
<li class="dropdown-header">
  <?php echo __d('projects', 'Projects:') ?>
</li>
<li><?php echo $this->Html->link(__d('elabs', '{0}&nbsp;{1}', [$this->Html->icon('list'), __d('elabs', 'Manage')]), ['prefix' => 'user', 'controller' => 'projects', 'action' => 'index'], $linkConfig) ?></li>
<li><?php echo $this->Html->link(__d('elabs', '{0}&nbsp;{1}', [$this->Html->icon('plus'), __d('projects', 'Add a project !')]), ['prefix' => 'user', 'controller' => 'projects', 'action' => 'add'], $linkConfig) ?></li>
<li class="dropdown-header">
    <?php echo __d('files', 'Files:') ?>
</li>
<li><?php echo $this->Html->link(__d('elabs', '{0}&nbsp;{1}', [$this->Html->icon('list'), __d('elabs', 'Manage')]), ['prefix' => 'user', 'controller' => 'files', 'action' => 'index'], $linkConfig) ?></li>
<li><?php echo $this->Html->link(__d('elabs', '{0}&nbsp;{1}', [$this->Html->icon('plus'), __d('files', 'Upload some files !')]), ['prefix' => 'user', 'controller' => 'files', 'action' => 'add'], $linkConfig) ?></li>
