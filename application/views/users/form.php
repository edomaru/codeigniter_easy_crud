<?php $form_attr = array("id" => "form_{$class_name}", "class" => "form-horizontal") ?>
<?php echo form_open("", $form_attr); ?>    
    <div class="control-group">
        <label class="control-label" for="name">Full Name</label>
        <div class="controls">
            <input type="text" name="name" id="name" class='span7' value='<?= $name ?>' />
            <?php echo form_error("name", "<br /><span class='validation label label-important'>", "</span>")?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="email">Email</label>
        <div class="controls">
            <input type="text" name="email" id="email" class='span7' value='<?= $email ?>' />
            <?php echo form_error("email", "<br /><span class='validation label label-important'>", "</span>")?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="username">Username</label>
        <div class="controls">
            <input type="text" name="username" id="username" class='span7' value='<?= $username ?>' />
            <?php echo form_error("username", "<br /><span class='validation label label-important'>", "</span>")?>
        </div>
    </div>
	<div class="control-group">
        <label class="control-label" for="password">Password</label>
        <div class="controls">
            <input type="text" name="password" id="password" class='span7' />
            <?php echo form_error("password", "<br /><span class='validation label label-important'>", "</span>")?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="password_confirm">Password Confirm</label>
        <div class="controls">
            <input type="text" name="password_confirm" id="password_confirm" class='span7' />
            <?php echo form_error("password_confirm", "<br /><span class='validation label label-important'>", "</span>")?>
        </div>
    </div>    
    <div class="control-group">
        <label class="control-label" for="password_confirm">Group</label>
        <div class="controls">
            <?php echo form_dropdown("group_id", $group_options, $group_id, 'class="span3"') ?>            
        </div>
    </div>  

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn" onclick="history.go(-1);">Batal</button>
    </div>
<?php echo form_close() ?>