<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Requests\ProjectFormRequest;
use App\Http\Controllers\Controller;
use App\Projects;
use Illuminate\Http\Request;

class ProjectController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        if(($request->user()->is_admin())) {
            //fetch 20 projects
            $projects = Projects::orderBy('created_at', 'desc')->paginate(20);
            //page heading
            $title = '20 Latest Projects';

            return view('project')->withProjects($projects)->withTitle($title);
        }
        else
        {
            return redirect('/')->withErrors('You have not sufficient permissions for writing project');
        }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		// if user can submit project
		if($request->user()->can_project())
		{
			return view('projects.create');
		}
		else
		{
			return redirect('/')->withErrors('You have not sufficient permissions for writing project');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ProjectFormRequest $request)
	{
		$project = new Projects();
		$project->title = $request->get('title');
		$project->client_name = $request->get('client_name');
		$project->slug = str_slug($project->title);
        $project->client_adresse = $request->get('client_adresse');
        $project->client_mail = $request->get('client_mail');
        $project->client_phone = $request->get('client_phone');
        $project->contact_name = $request->get('contact_name');
        $project->contact_adresse = $request->get('contact_adresse');
        $project->contact_mail = $request->get('contact_mail');
        $project->contact_phone = $request->get('contact_phone');
        $project->client_info = $request->get('client_info');
        $project->project_type = $request->get('project_type');
        $project->context = $request->get('context');
        $project->need = $request->get('need');
        $project->goals = $request->get('goals');
        $project->more_infos = $request->get('more_infos');
			$message = 'Post saved successfully';
		$project->save();
		return redirect('/')->withMessage($message);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($slug)
	{
        $project = Projects::where('slug',$slug)->first();
        if(!$project)
        {
            return redirect('/')->withErrors('requested page not found');
        }
        return view('projects.show')->withProject($project);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Request $request,$slug)
	{
        $project = Projects::where('slug',$slug)->first();
        if($project && ($request->user()->is_admin()))
            return view('project.edit')->with('project',$project);
        return redirect('/')->withErrors('You have not sufficient permissions');
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
        $project_id = $request->input('project_id');
        $project = Projects::find($project_id);
        if($project && ($request->user()->is_admin()))
        {
            if($request->has('confirmed'))
            {
                $project->active = 1;
                $message = 'Project saved';
            }
            elseif ($request->has('rejected')) {
                $project->active = 2;
                $message = 'Project refused';
            }
            else {
                $project->active = 0;
                $message = 'Project waiting';
            }
            $project->save();
            return redirect('/project')->withMessage($message);
        }
        else
        {
            return redirect('/')->withErrors('you have not sufficient permissions');
        }
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
