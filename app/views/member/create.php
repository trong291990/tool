<?php View::startSection('title'); ?>
     | Create Member
<?php View::stopSection(); ?>  
<div class="clearfix">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <div class="box-body no-padding clearfix">
            <div class="col-sm-8 col-sm-offset-2">
                <h3>Add new member</h3>
                <hr class="divider" />
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
                    echo Former::text('joind_date')
                          ->class('form-control');
                    echo Former::actions()
                          ->large_primary_submit('Submit')
                          ->large_inverse_reset('Reset');
                    echo  Former::close()
                    ?>
            </div>
        </div>
    </div>
</div>
<?php View::startSection('script'); ?>
     <script>
        $("#birthday").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        $("#joind_at").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
     </script>
<?php View::stopSection(); ?>  
