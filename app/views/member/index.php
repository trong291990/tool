<?php View::startSection('title'); ?>
     | All Members
<?php View::stopSection(); ?>  
<div class="clearfix">
        <div class="box box-primary">
            <div class="box-header">
                <h3><i class="fa fa-plus-circle"></i> <a href="/admin/member/create">Add Member</a></h3>
                <div class="box-tools">
                    <?php echo $members->links(); ?>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">
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
            </div><!-- /.box-body -->
        </div>
    </div>
