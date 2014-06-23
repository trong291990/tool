<?php

return array(

    'initialize' => function($authority) {
    	$user = $authority->getCurrentUser();
    	
        $authority->addAlias('manage', array('create', 'read', 'update', 'delete'));
        $authority->addAlias('moderate', array('read', 'update', 'delete'));
        if ($user->hasRole('admin')) {
            $authority->allow('manage', 'all');
        }

        // loop through each of the users permissions, and create rules
        foreach ($user->permissions as $perm) {
            if ($perm->type == 'allow') {
                $authority->allow($perm->action, $perm->resource);
            } else {
                $authority->deny($perm->action, $perm->resource);
            }
        }
    }
    
    

);
