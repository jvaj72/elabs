<div aria-hidden="true" class="modal" id="reportModal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-heading">
                <a class="modal-close" data-dismiss="modal">×</a>
                <h2 class="modal-title" id="uModTitle">Modal Title</h2>
            </div>
            <div class="modal-inner" id="modal-content">
                <?php
                echo $this->Form->create('Report', ['url' => $this->Url->build(['admin' => false, 'controller' => 'reports', 'action' => 'add'], true)]);
                $this->Form->templates([
                    'label' => '<label class="floating-label {{attrs.class}}" {{attrs}}>{{text}}</label>',]);
                ?>
                <div class="alert alert-info">
                    <i class="fa fa-info-circle fa-2x pull-left"></i><?php echo __d('elabs', ' You have found something wrong or want to react about something ? Your comments are welcome.'); ?>
                </div>
                <?php
                if (is_null($authUser)):
                    echo $this->Form->input('name', array(
                        'label' => __d('reports', 'Your name'),
                        'placeholder' => __d('reports', 'Name'),
                        'required' => true,
                    ));
                    echo $this->Form->input('email', array(
                        'label' => __d('reports', 'Your email'),
                        'placeholder' => __d('reports', 'Email'),
                        'required' => false,
                    ));
                    ?>
                <?php else: ?>
                    <div class="input-static"><?php echo $authUser['username'] ?></div>
                <?php endif; ?>
                <?php
                echo $this->Form->input('reason', array(
                    'type' => 'textarea',
                    'maxlenght' => '255',
                    'label' => __d('reports', 'Reason for your report'),
                    'class' => 'form-control',
                    'placeholder' => __d('reports', 'Reason'),
                    'required' => true
                ));
                ?>
            </div>
            <div class="modal-footer">
                <p class="text-right">
                    <?php
                    echo $this->Form->hidden('url', ['id'=>'reportModalUrl']);
                    echo $this->Form->button(__('Send'), array(
                        'class' => 'btn btn-flat btn-brand waves-attach waves-effect',
                    ));
                    ?>
                    <button class="btn btn-flat btn-brand waves-attach waves-effect" data-dismiss="modal" type="button">Close</button>
                </p>
            </div>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>

<?php
$this->append('pageBottomScripts');
?>
<script>
//    // Reports modal
    $('#reportModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var itemTarget = button.data('itemtarget'); // Button that triggered the modal //      var id = button.data('id'); // Extract info from data-* attributes
      //      var action = button.data('action'); // Extract info from data-* attributes
//      alert(itemTarget);
        $('#reportModalUrl').val(itemTarget);
    });
//    function showReportModal(target) {
//      var request = $.ajax({
//        type: "POST",
//        url: "<?php echo $this->Url->build(['prefix' => false, 'controller' => 'Reports', 'action' => 'add']); ?>" + '/' + id,
//        dataType: 'json',
//        async: true
//      });
//      //      request.done(function (msg) {
//      //        $("#log").html(msg);
//      //      });
//      request.fail(function (jqXHR, textStatus) {
//        alert(<?php echo __d('elabs', '"Request failed: " + textStatus') ?>);
//      });
//      request.success(function (response) {
//        $('#rModTitle').html(response.user.realname);
//        $('#rModBio').html(response.user.bio);
//        $('#rModArticleCount').html(response.user.post_count);
//        $('#rModProjectCount').html((response.user.project_count + response.user.project_user_count) + ' (' + response.user.project_user_count + ')');
//        $('#rModFileCount').html(response.user.file_count);
//      });
//    }
</script>
<?php
$this->end();
