<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class ProjectController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$projects = Project::all();
		return response()->json($projects);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$exploded = explode(',', $request->image);
		$decoded = base64_decode($exploded[1]);

		if(str_contains($exploded[0], 'jpeg'))
			$extension = 'jpg';
		else
			$extension = 'png';

		$fileName = str_random().'.'.$extension;
		$path = public_path().'/assets/images/'.$fileName;

		file_put_contents($path, $decoded);

		$project = new Project([
			'title' 		=> $request->get('title'),
			'technologies' 	=> $request->get('technologies'),
			'description' 	=> $request->get('description'),
			'date'		 	=> $request->get('date'),
			'sourcecode'	=> $request->get('sourcecode'),
			'hostedlink'	=> $request->get('hostedlink'),
			'hostedstatus'	=> $request->get('hostedstatus'),
			'searchtags' 	=> $request->get('searchtags'),
			'image' 		=> $fileName
		]);
		$project->save();
		
		return response()->json('Successfully Stored');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$project = Project::find($id);
		return response()->json($project);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$project = Project::find($id);
        $project->title 		= $request->get('title');
		$project->technologies 	= $request->get('technologies');
		$project->description 	= $request->get('description');
		$project->date			= $request->get('date');
		$project->sourcecode	= $request->get('sourcecode');
		$project->hostedlink	= $request->get('hostedlink');
		$project->hostedstatus	= $request->get('hostedstatus');
		$project->searchtags	= $request->get('searchtags');
        $project->save();

        return response()->json('Successfully Updated');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		$project = Project::find($id);
        $project->delete();

        return response()->json('Successfully Destroyed');
	}
}
