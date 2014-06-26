<?php
class AdminMemberController extends \BaseAdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
           $members = Member::paginate(20);
           $this->render(\View::make('member.index')->with('members',$members));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            $this->render(\View::make('member.create'));
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
            if($validator){
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
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
            
	}
        
        

}
