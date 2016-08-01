<div class="col-sm-4 col-xs-6">
    <div class="card">
        <div class="card-main">
            <div class="card-heading">
                <div class="card-header">
                    <!-- Title -->
                    <h3>
                        <?php echo $this->Html->link(h($language['name']), ['action' => 'view', $language->id], ['escape' => false]) ?>
                    </h3>
                </div>
            </div>
            <div class="card-content">
                <?php
                $linkTitle = $this->Html->iconT('font', __dn('elabs', '{0} article', '{0} articles', $language['post_count'], $language['post_count']));
                echo $this->Html->link($linkTitle, ['controller' => 'posts', 'action' => 'index', 'filter' => 'license', $language['id']], ['class' => 'btn btn-block', 'escape' => false]);
                $linkTitle = $this->Html->iconT('cogs', __dn('elabs', '{0} project', '{0} projects', $language['project_count'], $language['project_count']));
                echo $this->Html->link($linkTitle, ['controller' => 'projects', 'action' => 'index', 'filter' => 'license', $language['id']], ['class' => 'btn btn-block', 'escape' => false]);
                $linkTitle = $this->Html->iconT('file', __dn('elabs', '{0} file', '{0} files', $language['file_count'], $language['file_count']));
                echo $this->Html->link($linkTitle, ['controller' => 'files', 'action' => 'index', 'filter' => 'license', $language['id']], ['class' => 'btn btn-block', 'escape' => false]);
                ?>
            </div>
        </div>
    </div>
</div>
