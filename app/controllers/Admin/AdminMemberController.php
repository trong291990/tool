<?php
class AdminMemberController extends \BaseAdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
           /*echo "<pre>";
           print_r();
           echo "</pre>";*/
           $members = Member::paginate(5);
           
           $this->render(\View::make('admin.member.index')->with('members',$members));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            $this->render(\View::make('admin.member.create'));
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
            $error_message = "The member could not be saved";
            if($validator){
                Session::flash('error_message',$error_message);
                return Redirect::to('/admin/member/create')->withErrors($validator);
            }
            $user->save();
            $member = new Member();
            $member->user_id = $user->id;
            $member->joined_date = Input::get('joined_date');
            $memberValidator = $member->isFailValidation();
            if(!$memberValidator){
                $user->member()->save($member);
                $message = "The member has been created success. Password is <strong>$password</strong>";
                Session::flash('message',$message);
                return Redirect::to('/admin/member/create');
            }
            Session::flash('error_message',$error_message);
            return Redirect::to('/admin/member/create')->withErrors($memberValidator);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
	
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
            $member = Member::find($id);
            if($member->joined_date){
                $member->joined_date = LocalizedCarbon::createFromFormat
                        ('Y-m-d',$member->joined_date)->format('m/d/Y');
            }
            if($member->user->birthday){
                $member->user->birthday = LocalizedCarbon::createFromFormat
                        ('Y-m-d',$member->user->birthday)->format('m/d/Y');
            }
            //die($member->user->birthday);
            $this->render(View::make('admin.member.edit')->with('member',$member));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
            $user =  User::find(Input::get('user_id'));
            $user->name = Input::get('name');
            $user->email = Input::get('email');
            $user->gender = Input::get('gender');
            $user->birthday = Input::get('birthday');
            $user->phone_number = Input::get('phone_number');
            $user->street_address = Input::get('street_address');
            $user->city = Input::get('city');
            $user->country = Input::get('country');
            $password = Input::get('password');
            if($password){
                $user->password = $password;
            }else {
                unset($user->password);
            }
            $member = Member::find($id);
            $member->joined_date = Input::get('joined_date');
            $validator = $user->isFailValidation(true);
            $error_message = "The member could not be saved";
            if($validator){
                Session::flash('error_message',$error_message);
                return Redirect::to('/admin/member/'.$id.'/edit')->withErrors($validator);
            }
            $memberValidator = $member->isFailValidation();
            if($memberValidator){
                Session::flash('error_message',$error_message);
                return Redirect::to('/admin/member/create')->withErrors($memberValidator);
            }
            $user->save();
            $user->member()->save($member);
            $message = "The member {$user->name} has been saved success.";
            Session::flash('message',$message);
            return Redirect::to('/admin/member');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
            $member = Member::find($id);
            $message = "The member {$member->user->name} has been deteted.";
            $member->delete();
            Session::flash('message',$message);
            return Redirect::to('/admin/member');
	}
        
        

}
