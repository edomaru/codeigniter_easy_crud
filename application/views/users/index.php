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

<?= $pagination ?>
