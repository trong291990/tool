<?php View::startSection('title'); ?>
     | All Projects
<?php View::stopSection(); ?>
 <?php echo Breadcrumbs::render('project'); ?>     
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
            <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Project Name</th>
                <th>Plan Start</th>
                <th>Actual Start</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($projects as $project):
                  $planStart = LocalizedCarbon::createFromFormat('Y-m-d',$project->plan_start_date);
                  $now = LocalizedCarbon::now();
                  if(!$project->actual_start_date){
                      if($now > $planStart){
                          $label = '<span class="label label-info">Pending</span>';
                      }else{
                          $label = '<span class="label label-warning">Pending</span>';
                      }
                  }elseif(!$project->actual_end_date) {
                      $planEnd = LocalizedCarbon::createFromFormat('Y-m-d',$project->plan_end_date);
                      if($now < $planEnd){
                          $label = '<span class="label label-info">Inprogress</span>';
                      }else{
                          $label = '<span class="label label-danger">Inprogress</span>';
                      }
                  }else {
                      $label = '<span class="label label-success">Completed</span>';
                  }
                  
              ?>
              <tr>
                <td><?=$project->id?></td>
                <td><?=$project->name?></td>
                <td><?= $project->plan_start_date ? LocalizedCarbon::createFromFormat('Y-m-d',$project->plan_start_date)->format('m/d/Y') : ''?></td>
                <td><?= $project->actual_start_date ? LocalizedCarbon::createFromFormat('Y-m-d',$project->actual_start_date)->format('m/d/Y'): ''?></td>
                <td><?=$label?></td>
                <td class="actions-td">
                    <a title="View & Edit" class="edit" href="/admin/project/<?=$project->id?>/edit">View & Edit</a>
                    <a title="Resources" class="resource" href="/admin/project/<?=$project->id?>/resource">Resources</a>
                    <?=Form::delete('/admin/project/'.$project->id, 'Delete','Are you sure delete this project ?',array(),array('title'=>'Delete'))?>
                </td>
              </tr>
              <?php endforeach;?>
            </tbody>
          </table>
          <?php echo $projects->links(); ?>
        </div>
    </div>
</div>