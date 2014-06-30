<?php View::startSection('title'); ?>
     | All Members
<?php View::stopSection(); ?>
   
<div class="row">
    <div class="col-sm-3">
        <div class="webpage">
            <div class="row">
                <h4 class="sidebar-title">Actions</h4>
                <ul class="list-unstyled actions-sidebar">
                    <li><a href="#">Add project</a></li>
                    <li><a href="#">Import project</a></li>
                    <li><a href="#">Export project</a></li>
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
                        <th>Phone number</th>
                        <td>Joined at</td>
                        <th>Actions</th>
                    </tr>
                    <?php foreach ($members as $member): ?>
                    <tr>
                        <td><?=$member->id?></td>
                        <td class="avatar-td">
                            <img src="/assets/img/avatar3.png" class="img-responsive img-circle" />
                        </td>
                        <td><?=$member->user->name?></td>
                        <td><a href="mailto:<?=$member->user->email?>"><?=$member->user->email?></a></td>
                        <td><?=$member->user->phone_number?></td>
                        <td>
                           
                        </td>
                        <td class="actions-td">
                            <a href="#">View detail</a>
                            <?=Form::delete('/admin/member/'.$member->id, 'Delete','Are you sure delete this member ?')?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody></table>
             <?php echo $members->links(); ?>
        </div>
    </div>
</div>
