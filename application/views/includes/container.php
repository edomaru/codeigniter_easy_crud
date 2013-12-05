<div class='box'>
    <div class='box-title'>
        <span class='muted'><?php echo $the_title; ?></span>
    </div>        

    <?php if ( ($message = get_message()) ): ?>
    <!-- start message  -->
    <div class='box-content'>
        <div class="alert alert-<?php echo $message['alert'] ?>">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $message['content'] ?>
        </div>
    </div>
    <!-- // message -->
    <?php endif; ?>

    <div class='box-content'>
        
        <?php if (isset($the_widget)) $this->view($the_widget) ?>
        
        <?php $this->view($the_content) ?>

    </div>

</div>