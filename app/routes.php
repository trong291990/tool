<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('/bye',function(){
    return View::make('bye');
});
Route::resource('page','PageController'
);
Route::group(array('namespace'=>'AppUser'),function(){
    //Route::get('user',array('uses'=>'UserController@index'));
    Route::resource('user','UserController');
});
Route::group(array('prefix' => 'admin'),function(){
    Route::resource('project','AdminProjectController');
    Route::get('project/{id}/resource',array('uses'=>'AdminProjectController@resource'));
    
    Route::resource('member','AdminMemberController',
                array('names' => array('edit' => 'member.edit'))
            );
    Route::get('user/{id}/edit',array('as'=>'user.edit',function($id){
        $user = User::find($id);
        //die($user->name);
        if($user->group_id==User::MEMBER_GROUP){
            return Redirect::to(route('member.edit',array('id'=>$user->member->id)));
        }
    }));
});

