<?php View::startSection('title'); ?>
     | Edit Member
<?php View::stopSection(); ?>  
<?php echo Breadcrumbs::render('edit_member',$member) ?> 
<div class="row">
    <div class="col-sm-3">
        <div class="webpage">
            <div class="row">
                <h4 class="sidebar-title">Actions</h4>
                <ul class="list-unstyled actions-sidebar">
                    <li><a href="/admin/member">All member</a></li>
                    <li><a href="/admin/member/create">Create member</a></li>
                    <li>
                         <?=Form::delete('/admin/member/'.$member->id, 'Delete this member','Are you sure delete this member ?')?>
                    </li>
                </ul> 
            </div>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="webpage">
            <h3>Member detail <small>* -signifies as required field</small></h3>
                
              <?php 
                    if (Session::has('message')){
                        $message = Session::get('message');
                        echo HTML::alert('success',$message,'Success');
                    }
                    if (Session::has('error_message')){
                        $message = Session::get('error_message');
                        echo HTML::alert('danger',$message,'Error');
                    }
                ?>
                 <?php 
                    echo Former::horizontal_open('/admin/member/'.$member->id)
                        ->class('form-in-box')
                        ->secure()
                        ->rules(['name' => 'required'])
                        ->populate($member->user)
                        ->method('PUT');
                    echo Former::populateField('joined_date', $member->joined_date);
                    echo Former::populateField('user_id', $member->user_id);
                    echo Former::hidden('user_id');
                    echo Former::text('name')
                          ->class('form-control')
                          ->required();

                    echo Former::email('email')
                          ->class('form-control')
                          ->required();
                    echo Former::radios('gender')
                          ->radios(array(
                            ' Gendle' => array('name' => 'gender', 'value' => '1'),
                            ' Female' => array('name' => 'gender', 'value' => '0'),
                          ))
                          ->required();
                     echo Former::text('birthday')
                          ->class('form-control');
                    echo Former::text('phone_number')
                          ->class('form-control');
                    echo Former::text('street_address')
                          ->class('form-control');
                    echo Former::text('city')
                          ->class('form-control');
                    echo Former::text('country')
                          ->class('form-control');
                    echo Former::text('joined_date')
                          ->class('form-control');
                    echo Former::password('password')
                          ->value('')
                          ->class('form-control');
                    echo Former::password('password_confirmation')
                          ->value('')
                          ->class('form-control');
                    echo Former::actions()
                          ->large_primary_submit('Submit')
                          ->large_inverse_reset('Reset');
                    echo  Former::close()
                    ?>
        </div>
    </div>
</div>

<?php View::startSection('script'); ?>
    <script type="text/javascript" src="/assets/clean/js/plugins/input-mask/jquery.inputmask.js"></script>
    <script type="text/javascript" src="/assets/clean/js/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script type="text/javascript" src="/assets/clean/js/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script>
        $("#birthday").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        $("#joined_date").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    </script>
<?php View::stopSection(); ?>  
