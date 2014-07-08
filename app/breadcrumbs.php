<?php

Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('Home','/admin');
});

Breadcrumbs::register('user', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Users','/admin/user');
});
Breadcrumbs::register('add_member', function($breadcrumbs) {
    $breadcrumbs->parent('member');
    $breadcrumbs->push('Add');
});
Breadcrumbs::register('edit_member', function($breadcrumbs,$member) {
    $breadcrumbs->parent('member');
    $breadcrumbs->push($member->user->name);
});

Breadcrumbs::register('project', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Projects','/admin/project');
});
Breadcrumbs::register('add_project', function($breadcrumbs) {
    $breadcrumbs->parent('project');
    $breadcrumbs->push('Add');
});
Breadcrumbs::register('edit_project', function($breadcrumbs,$project) {
    $breadcrumbs->parent('project');
    $breadcrumbs->push($project->name,"/admin/project/{$project->id}/edit");
});
Breadcrumbs::register('resource', function($breadcrumbs,$project) {
    $breadcrumbs->parent('edit_project',$project);
    $breadcrumbs->push('Resources');
});