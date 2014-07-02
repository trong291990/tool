<?php View::startSection('title'); ?>
     | Create Project
<?php View::stopSection(); ?>
<?php echo Breadcrumbs::render('resource',$project) ?>     
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
            <h3>Project resource <small>* -signifies as required field</small></h3>
                <?php 
                    echo Former::horizontal_open("/admin/project/{$project->id}/update-resource/")
                        ->class('form-in-box')
                        ->id('assign-resource-project')
                        ->secure()
                        ->rules(['name' => 'required'])
                        ->method('POST');
                ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                             <div class="col-sm-5">
                                <label class="control-label" for="project-product-owner">Product owner<sup>*</sup></label>
                                <ul class="project-manager" id="project-product-owner">
                                    <?php if($productOwner):?>
                                    <li data-id="<?=$productOwner->id?>"><?php echo SiteHelper::adminUserLink($productOwner->user); ?></li>
                                    <?php endif;?>
                                </ul>
                            </div>
                            <div class="col-sm-5">
                                <label class="control-label" for="project-scrum-master">Scrum master</label>
                                <ul class="project-manager" id="project-scrum-master">
                                    <?php if($scrumMaster):?>
                                    <li data-id="<?=$scrumMaster->id?>"><?php echo SiteHelper::adminUserLink($scrumMaster->user); ?></li>
                                    <?php endif;?>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="control-label" for="project-member">Team members<sup>*</sup></label>
                                <ul class="project-member" id="project-member">
                                    <?php foreach ($projectMembers as $member): ?>
                                     <li data-id="<?=$member->id?>"><?php echo SiteHelper::adminUserLink($member->user); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="control-label">All people</label>
                        <ul id="project-source-resource">
                            <?php foreach ($members as $member):
                                   // $member->user->avatar = '/assets/uploads/users/avatar.jpg';
                                ?>
                                <li data-id="<?=$member->id?>"><?php echo SiteHelper::adminUserLink($member->user); ?></li>
                            <?php endforeach; ?>
                        </ul>
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
    <script type="text/javascript" src="/assets/clean/js/plugins/jquery-ui-1.10.3.min.js"></script>
    <script>
        function isNullResource(dom) {
            if($(dom).find('li').length > 1){
                return false;
            }
            return true;
        }
        $("#plan_start_date").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        $("#plan_end_date").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        
        $("#project-source-resource").sortable({ connectWith: "#project-member,#project-product-owner,#project-scrum-master" });
        $('#project-member').sortable({ connectWith: "#project-source-resource,#project-product-owner,#project-scrum-master" });
        $('#project-product-owner').sortable({ connectWith: "#project-source-resource,#project-member,#project-scrum-master",receive : function(event,ui){
                if(!isNullResource($(this)) && ui.sender !== null){
                   $(ui.sender).sortable('cancel');
                }
        } });
        $('#project-scrum-master').sortable({ connectWith: "#project-source-resource,#project-member,#project-product-owner",receive :function(event,ui){
                if(!isNullResource($(this)) && ui.sender !== null){
                   $(ui.sender).sortable('cancel');
                }
        } });
    
        $('#assign-resource-project').on('submit',function(){
            var vaild = true;
            $(this).find('input[type="hidden"].hidden').remove();
            $(this).addHiddenField('scrum_master', $('#project-scrum-master li:first').data('id'));
            $(this).addHiddenField('product_owner', $('#project-product-owner li:first').data('id'));
            var form = $(this);
            $('#project-member li').each(function(){
                $(form).addHiddenField('members[]',$(this).data('id'));
            });
            if($('#project-product-owner li').length===0){
                vaild= false;
                $('label[for="project-product-owner"]').after('<span class="help-inline">Product owner is required.</span>')
            }
            if($('#project-member li').length===0){
                vaild = false;
                $('label[for="project-member"]').after('<span class="help-inline">Members is required.</span>')
            }
            return vaild;
        });
    </script>
<?php View::stopSection(); ?>  
