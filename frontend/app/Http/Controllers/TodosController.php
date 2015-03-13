<?php namespace App\Http\Controllers;

use Input;
use Request;
use Response;
use DB;
use Log;

/**
 * Class TodosController
 * @package App\Http\Controllers
 * @see https://github.com/kouphax/todomvc-server/blob/master/examples/silex-mongodb/src/app.php
 * @see https://github.com/kouphax/todomvc-server/wiki/App-Specification
 */
class TodosController extends Controller {

    /**
     * Create a new controller instance.
     * @return \App\Http\Controllers\TodosController
     */
	public function __construct()
	{
        //Event::forget('router.filter: csrf');

		$this->middleware('guest');
	}

	/**
	 * Display a listing of the resource.
	 * Verb GET
     * Path /todos
	 * @return Response
	 */
	public function index()
	{
        exit;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
     * Verb POST
     * Path /todos
	 * @return Response
	 */
	public function store()
	{
        $title = Input::get('title');

        $id = DB::table('todos')->insertGetId(
            array(
                'title'      => $title,
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            )
        );

        return Response::json(array(
            'error' => false,
            'id'    => $id,
            200
        ));

        exit;


		//
        /*
        $title = Request::get('title');
        return Response::json(array(
            'error' => false,
            'id'    => 2,
            'title' => $title,
            200
        ));
        */

        /*
        $url = new Url;
        $url->url = Request::get('url');
        $url->description = Request::get('description');
        $url->user_id = Auth::user()->id;


        $url->save();

        return Response::json(array(
            'error' => false,
            'urls' => $urls->toArray()),
            200
        );
        */





	}

	/**
	 * Display the specified resource.
	 * Verb GET
     * Path /todos/{$id}
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        var_dump($id);
        exit;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    /*
	public function edit($id)
	{
		//
	}
    */

	/**
	 * Update the specified resource in storage.
	 * Verb PUT/PATCH
     * Path /todos/{id}
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * Verb DELETE
     * Path /todos/{$id}
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}






}
