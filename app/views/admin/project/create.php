<?php View::startSection('title'); ?>
     | Create Project
<?php View::stopSection(); ?>
<?php echo Breadcrumbs::render('add_project') ?>     
<div class="row">
    <div class="col-sm-3">
        <div class="webpage">
            <div class="row">
                <h4 class="sidebar-title ">Actions</h4>
                <ul class="list-unstyled actions-sidebar">
                    <li><a href="/admin/member">All member</a></li>
                </ul> 
            </div>
        </div>
    </div>
    <div class="col-sm-9">
        <div class="webpage">
            <h3>Project detail <small>* -signifies as required field</small></h3>             
                 <?php 
                    echo Former::horizontal_open('/admin/project')
                        ->class('form-in-box')
                        ->secure()
                        ->rules(['name' => 'required'])
                        ->method('POST');

                    echo Former::text('name')
                          ->class('form-control')
                          ->required();

                    echo Former::textarea('description')
                          ->rows(10)->columns(20)
                          ->class('form-control')
                          ->required();
                     echo Former::text('plan_start_date')
                          ->class('form-control')
                          ->required();;
                    echo Former::text('plan_end_date')
                          ->class('form-control')
                          ->required();
                ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                             <div class="col-sm-5">
                                <label class="control-label">Product owner<sup>*</sup></label>
                                <ul class="project-manager" id="project-product-owner">

                                </ul>
                            </div>
                            <div class="col-sm-5">
                                <label class="control-label">Scrum master</label>
                                <ul class="project-manager" id="project-scrum-master">

                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="control-label">Team members<sup>*</sup></label>
                                <ul class="project-member" id="project-member">
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        
                    </div>
                </div>    
                <?php 
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
        $("#plan_start_date").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        $("#plan_end_date").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    </script>
<?php View::stopSection(); ?>  
