<?php echo form_open("", array('id' => 'search_form', 'style' => "float:right;margin-right:50px;")) ?>
    <div class="input-append">
        <input class="input-block-level" id="appendedInputButton" type="text" name='keywords' value='<?php echo $this->session->userdata("find_keywords") ?>' placeholder="Search...">
        <button class="btn" type="submit">Go!</button>
    </div>
<?php echo form_close() ?>