<?php
class AdminProjectController extends \BaseAdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
           $projects = Project::orderBy('created_at','DESC')->paginate(5);
           $this->render(\View::make('admin.project.index')->with('projects',$projects));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            $this->render(\View::make('admin.project.create'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
            $project = new Project();
            $project->name = Input::get('name');
            $project->description = Input::get('description');
            $project->plan_start_date = Input::get('plan_start_date');
            $project->plan_end_date = Input::get('plan_end_date');
            $validator = $project->isFailValidation();
            if($validator){
                $error_message = "The project could not be saved";
                Session::flash('error_message',$error_message);
                return Redirect::to('/admin/member/create')->withErrors($validator);
            }
            $project->save();
            $message = "The project has been created success";
            Session::flash('message',$message);
            return Redirect::to("/admin/project/{$project->id}/resource");
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
		//
	}
        
        public function resource($id){
            $project = Project::find($id);
            $members = Member::all();
            $this->render(\View::make('admin.project.resource')->with(compact('project','members')));
        }

}
