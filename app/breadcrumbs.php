<?php

Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('Dashboard','/admin');
});

Breadcrumbs::register('member', function($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Member','/admin/member');
});
Breadcrumbs::register('add_member', function($breadcrumbs) {
    $breadcrumbs->parent('member');
    $breadcrumbs->push('Add');
});
Breadcrumbs::register('edit_member', function($breadcrumbs,$member) {
    $breadcrumbs->parent('member');
    $breadcrumbs->push($member->user->name);
});