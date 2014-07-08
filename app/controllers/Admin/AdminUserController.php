<?php

class AdminUserController extends BaseAdminController {
    public function index(){
        $users = User::paginate(100);
        $this->render(\View::make('admin.user.index')->with('users',$users));
    }
    public function create()
    {
        $this->render(\View::make('admin.user.create'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $user = new User;
        $password = User::generalPassword();
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->gender = Input::get('gender');
        $user->birthday = Input::get('birthday');
        $user->password = $password;
        $user->phone_number = Input::get('phone_number');
        $user->street_address = Input::get('street_address');
        $user->city = Input::get('city');
        $user->country = Input::get('country');
        $validator = $user->isFailValidation();
        $error_message = "The user could not be saved";
        if($validator){
            Session::flash('error_message',$error_message);
            return Redirect::to('/admin/user/create')->withErrors($validator);
        }
        $user->save();
        $message = "The user has been created success. Password is <strong>$password</strong>";
        Session::flash('message',$message);
        return Redirect::to('/admin/user/create');
    }
    public function destroy($id)
    {
        $member = Member::find($id);
        $message = "The member {$member->user->name} has been deteted.";
        $member->delete();
        Session::flash('message',$message);
        return Redirect::to('/admin/member');
    }
}
