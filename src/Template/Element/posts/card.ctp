<div class="card">
	<div class="card-side pull-left">
		<span class="card-heading">
			<?= $this->Html->link(__d('elabs', 'Read more...'), ['prefix' => false, 'controller' => 'Posts', 'action' => 'view', $item['fkid']], ['class' => 'waves-attach waves-effect btn btn-flat']) ?>
		</span>
	</div>
	<div class="card-main">
		<!-- Header -->
		<div class="card-header">
			<!-- Icon -->
			<div class="card-header-side pull-left">
				<i class="fa fa-font fa-3x"></i>
			</div>
			<!-- Title -->
			<div class="card-inner">
				<div class="text-overflow"><?= h($data['title']) ?></div>
				<em class="subtitle"> <?= __d('elabs', 'Pub: {0}', h($data['publication_date'])) ?></em>
			</div>
		</div>
		<!-- Content -->
		<div class="card-description">
			<?= __d('elabs', '{0}&nbsp;Author: {1}', '<i class="fa fa-user"></i>', $this->Html->link($item['user']['username'], ['prefix' => false, 'controller' => 'Users', 'action' => 'view', $item['user']['id']])) ?><br/>
			<?= __d('elabs', '{0}&nbsp;License: {1}', '<i class="fa fa-copyright"></i>', $this->Html->link($data['license']['name'], ['prefix' => false, 'controller' => 'Licenses', 'action' => 'view', $data['license']['id']])) ?>
		</div>
		<div class="card-inner">
			<p>
				<?= h($data['excerpt']) ?>
			</p>
		</div>
	</div>
</div>