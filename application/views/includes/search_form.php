<?php echo form_open("", array('id' => 'search_form', 'style' => "float:right;margin-right:50px;")) ?>
	<?php $keyword_input_name = $this->config->item('default_search_keyword_input_name') ?>
    <div class="input-append">
        <input class="input-block-level" id="appendedInputButton" type="text" name='<?php echo $keyword_input_name ?>' value='<?php echo $this->session->userdata("find_{$keyword_input_name}") ?>' placeholder="Search...">
        <button class="btn" type="submit">Go!</button>
    </div>
<?php echo form_close() ?>