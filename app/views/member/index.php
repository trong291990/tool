<?php View::startSection('title'); ?>
     | All Members
<?php View::stopSection(); ?>  
<div class="clearfix">
        <div class="box box-primary">
            <div class="box-header">
                <h3><i class="fa fa-plus-circle"></i> <a href="/admin/member/add">Add Member</a></h3>
                <div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
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
                    <tr>
                        <td>1.</td>
                        <td class="avatar-td"><img src="/assets/img/avatar3.png" class="img-responsive img-circle" /></td>
                        <td>Tran Dinh Trong</td>
                        <td><a href="mailto:trandinhtrong90@gmail.com">trandinhtrong90</a></td>
                        <td>0989944721</td>
                        <td>
                           
                        </td>
                        <td class="actions-td">
                            <a href="#">View detail</a>
                            <?=Form::delete('/admin/member/1', 'Delete','Are you sure delete this member ?')?>
                        </td>
                    </tr>
                </tbody></table>
            </div><!-- /.box-body -->
        </div>
    </div>
