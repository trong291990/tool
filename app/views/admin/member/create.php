<?php View::startSection('title'); ?>
     | Create Member
<?php View::stopSection(); ?>
<?php echo Breadcrumbs::render('add_member') ?>     
<div class="row">
    <div class="col-sm-3">
        <div class="webpage">
            <div class="row">
                <h4 class="sidebar-title">Actions</h4>
                <ul class="list-unstyled actions-sidebar">
                    <li><a href="/admin/member">All member</a></li>
                    <li><a href="#">Import project</a></li>
                    <li><a href="#">Export project</a></li>
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
                ?>
                 <?php 
                    echo Former::horizontal_open('/admin/member')
                        ->class('form-in-box')
                        ->secure()
                        ->rules(['name' => 'required'])
                        ->method('POST');

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
