Codeigniter Easy CRUD
========================

**Codeigniter Easy CRUD** is a Codeigniter tools for make CRUD easily with Twitter Bootstrap v 2.3.0 as front-end by default.

Instalation
---

1. Just copy and paste codeigniter_easy_crud folder to your web directory (you can change folder as you wish)
2. open PhpMyAdmin or any other tools and create database named you wish or ci_easy_crud_test for a test
3. Restore database_test.sql on codeigniter_easy_crud folder
4. Go to http://localhost/codeigniter_easy_crud/users

Usage
---
1. Basic sample
- create model class. In this class you can just specify what table would be used and the primary key field

```php
class Users_model extends MY_Model {

	function __construct()
	{
		parent::__construct();
		parent::set_model("users", "id");		
	}

}
```

- create controller class. In this class you simply specify what model would be used for controller
```php
class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::set_module("users_model");		
	}

}
```

- next, create directory in application/views based on controller class name. for example controller name 'users' so the direcoty name also named 'users'. 

- Create file index.php on directory created in above explaination. In this file you can defined HTML table as example below. 
```php
<table class='table table-bordered table-striped'>       
    <thead>
        <tr>            
            <th style='width:100px;'>Action</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>            
            <th style="width:20px;">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $icon_edit = '<i class="icon-pencil"></i>';
            $icon_delete = '<i class="icon-remove-sign icon-white"></i>';
            $active_status = '<span class="label label-success">Active</span>';
            $inactive_status = '<span class="label label-important">Inactive</span>';
        ?>

        <?php foreach ($query->result() as $row) : ?>
        <tr>
            <td>
                <?php echo anchor($class_name . "/edit/" . $row->id, $icon_edit, array('title' => 'Edit user', 'class' => 'btn')); ?>
                <?php echo anchor($class_name . "/delete/" . $row->id, $icon_delete, array('title' => 'Delete user', 'class' => 'btn btn-danger', 'onclick' => 'Are you sure ?')); ?>                
            </td>           
            <td><?php echo $row->name ?></td>
            <td><?php echo $row->username ?></td>
            <td><?php echo $row->email ?></td>            
            <td><?php echo $row->active ? $active_status : $inactive_status ?></td>
        </tr>                        
        <?php endforeach; ?>
    </tbody>
</table>
```

- Go http://localhost/codeigniter_easy_crud/users. Click add button and it would be show error that form.php cannot be loaded. Create form.php as index.php created on. Create your own HTML Form with every element name must be same name with table field name.

```php
<?php $form_attr = array("id" => "form_{$class_name}", "class" => "form-horizontal") ?>
<?php echo form_open("", $form_attr); ?>   
	<!-- sample form element -->  
    <div class="control-group">
        <label class="control-label" for="name">Full Name</label>
        <div class="controls">
            <input type="text" name="name" id="name" class='span7' value='<?= $name ?>' />
            <?php echo form_error("name", "<br /><span class='label label-important'>", "</span>")?>
        </div>
    </div>
    
    <!-- your other form element here --> 

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn" onclick="history.go(-1);">Batal</button>
    </div>
<?php echo form_close() ?>
```