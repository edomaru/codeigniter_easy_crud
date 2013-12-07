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

1. create model class. In this class you can just specify what table would be used and the primary key field

```php
class Users_model extends MY_Model {

	function __construct()
	{
		parent::__construct();
		parent::set_model("users", "id");		
	}

}
```

2. create controller class. In this class you simply specify what model would be used for controller

```php
class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		parent::set_module("users_model");		
	}

}
```

3. next, create directory in application/views based on controller class name. for example controller name users so the direcoty name also named users. 

4. Create file index.php on directory created in above explaination. In this file you can defined HTML table as example below. 

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
                <?= anchor($class_name . "/edit/" . $row->id, $icon_edit, array('title' => 'Edit user', 'class' => 'btn')); ?>
                <?= anchor($class_name . "/delete/" . $row->id, $icon_delete, array('title' => 'Delete user', 'class' => 'btn btn-danger', 'onclick' => 'Are you sure ?')); ?>                
            </td>           
            <td><?= $row->name ?></td>
            <td><?= $row->username ?></td>
            <td><?= $row->email ?></td>            
            <td><?= $row->active ? $active_status : $inactive_status ?></td>
        </tr>                        
        <?php endforeach; ?>
    </tbody>
</table>
```

5. Go http://localhost/codeigniter_easy_crud/users. Click add button and it would be show error that form.php cannot be loaded. Create form.php as index.php created on. Create your own HTML Form with every element name must be same name with table field name.

```php
<?php $form_attr = array("id" => "form_{$class_name}", "class" => "form-horizontal") ?>
<?= form_open("", $form_attr); ?>   
	<!-- sample form element -->  
    <div class="control-group">
        <label class="control-label" for="name">Full Name</label>
        <div class="controls">
            <input type="text" name="name" id="name" class='span7' value='<?= $name ?>' />
            <?= form_error("name", "<br /><span class='label label-important'>", "</span>")?>
        </div>
    </div>
    
    <!-- your other form element here --> 

    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn" onclick="history.go(-1);">Batal</button>
    </div>
<?= form_close() ?>
```

Extra
---

- **Custom what fields to fetch.**
By default all filds would be fetch when get_all called. You can specify the fields would be fetched in third **set_model** parameter.

```php
class Users_model extends MY_Model {

    function __construct()
    {
        parent::__construct();
        parent::set_model("users", "id", array('id', 'username', 'email'));      
    }

}
```

- **Custom search criteria.** 
By default all field are used as search criteria. You can specify what field(s) to used as search criteria by passing in fourth **set_model** parameter. 

```php
class Users_model extends MY_Model {

	function __construct()
	{
		parent::__construct();
		parent::set_model("users", "id", null, array('username', 'name'));		
	}

}
```

- **Set form validation.**
To activate form validation in your form, you must specify form validation rules in 4th parameter of **set_module** like this

```php
class Users extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        parent::set_module(
            "users_model", "Users", 10,
            array(
                'add' => array(
                    'username' => array('Username', 'trim|required|is_unique[users.username]'),
                    'name' => array('Name', 'trim|required'),
                    'email' => array('Email', 'trim|required|valid_email'),
                    'password' => array('Password', 'trim|required'),
                    'password_confirm' => array('Password', 'trim|required|matches[password]')
                )
            )
        );        
    }

}
```