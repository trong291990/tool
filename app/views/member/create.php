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
                 <?php 
                    echo Former::horizontal_open('/admin/member')
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
                          ));
                    echo Former::text('phone_number')
                          ->class('form-control');
                    echo Former::text('street_address')
                          ->class('form-control');
                    echo Former::text('city')
                          ->class('form-control');
                    echo Former::text('country')
                          ->class('form-control');
                    echo Former::actions()
                          ->large_primary_submit('Submit')
                          ->large_inverse_reset('Reset');
                    ?>
                   <div class="form-group">
                        <label>Date masks:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" data-mask="" data-inputmask="'alias': 'mm/dd/yyyy'" class="form-control">
                        </div><!-- /.input group -->
                    </div>
                    <?php  echo  Former::close()
                    ?>
            </div>
        </div>
    </div>
</div>
<?php View::startSection('script'); ?>
     <script>
         $(function(){
             $("[data-mask]").inputmask();
         })
     </script>
<?php View::stopSection(); ?>  
