<?php View::startSection('title'); ?>
     | All User
<?php View::stopSection(); ?>
 <?php echo Breadcrumbs::render('user'); ?>  
<div class="row">
    <div class="col-sm-3">
        <div class="webpage">
            <div class="row">
                <h4 class="sidebar-title">Actions</h4>
                <ul class="list-unstyled actions-sidebar">
                    <li><a href="/admin/member/create">Add User</a></li>
                    <li><a href="#">Progress Report</a></li>
                </ul> 
            </div>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="webpage">
             <table class="table" id="admin-list-member-table">
                    <tbody>
                        <tr>
                        <th style="width: 10px">#</th>
                        <th style="width: 30px;">Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?=$user->id?></td>
                        <td class="avatar-td">
                            <img src="/assets/img/avatar3.png" class="img-responsive img-circle" />
                        </td>
                        <td><?=$user->name?></td>
                        <td><a href="mailto:<?=$user->email?>"><?=$user->email?></a></td>
                        <td>
                            <?php 
                                $roleNames = array();
                                foreach ($user->roles as $role){
                                    $roleNames[] = $role->name;
                                }
                                echo implode(', ',$roleNames);
                            ?> 
                        </td>
                        <td class="actions-td">
                            <a class="edit" href="/admin/user/<?=$user->id?>/edit">View detail</a>
                            <?=Form::delete('/admin/user/'.$user->id, 'Delete',"Are you sure delete user {$user->name} ?")?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody></table>
             <?php echo $users->links(); ?>
        </div>
    </div>
</div>