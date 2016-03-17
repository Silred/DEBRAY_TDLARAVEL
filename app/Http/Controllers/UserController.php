<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Posts;

use Illuminate\Http\Request;

class UserController extends Controller {

		/*
	 * Display the posts of a particular user
	 * 
	 * @param int $id
	 * @return Response
	 */
	public function user_posts($id)
	{
		//
		$posts = Posts::where('author_id',$id)->where('active','1')->orderBy('created_at','desc')->paginate(5);
		$title = User::find($id)->name;
		return view('home')->withPosts($posts)->withTitle($title);
	}

	/**
	 * profile for user
	 */
	public function profile(Request $request, $id) 
	{
		if($id == $request->user()->id) {
			$data['user'] = User::find($id);
			if (!$data['user']) {
				return redirect('/');
			}
			else {
				return view('admin.profile', $data);
			}
		}
		else{
			return redirect('/')->withMessage('You have not sufficient permissions');
		}
	}

	public function update(Request $request, $id)
	{
		if($id == $request->user()->id) {
			$users = User::find($id);
			if (!$users)
				return redirect('/');
			else {

				$users->name = $request->input('name');
				$users->email = $request->input('email');

				$message = 'Saved successfully';
				$users->save();
				return redirect('/user/' . $id)->withMessage($message);
			}
		}
		else{
			return redirect('/')->withMessage('You have not sufficient permissions');
		}
	}


	public function contact()
	{
		return view('contact');
	}
}

