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

        $list = (array)DB::table('todos')->select('id', 'text', 'complete')->get();

        $todos = array();

        foreach ($list as $k => $v) {
            $todos[$v->id] = array(
                'id'       => $v->id,
                'text'     => $v->text,
                'complete' => ($v->complete == 0)? false:true,
            );
        }

        //Log::write('info', print_r($list, true));

        return Response::json(array(
            'error' => false,
            'todos' => $todos,
            200
        ));

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
        $text = Input::get('text');

        $id = DB::table('todos')->insertGetId(
            array(
                'text'      => $text,
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
        $text = Input::get('text');

        DB::table('todos')
            ->where('id', $id)
            ->update(
                array(
                    'text' => $text
                )
            );

        return Response::json(array(
            'error' => false,
            200
        ));
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

        DB::table('todos')->where('id', $id)->delete();

        return Response::json(array(
            'error' => false,
            200
        ));

	}


	/**
	 * Update the specified resource in storage.
	 * Verb PUT/PATCH
     * Path /complete/{id}
	 * @param  int  $id
	 * @return Response
	 */
	public function complete($id)
	{
        $complete = Input::get('complete');

        Log::write('debug', gettype($complete));

        DB::table('todos')
            ->where('id', $id)
            ->update(
                array(
                    'complete' => ($complete == 'false')? 1:0,
                )
            );

        return Response::json(array(
            'error' => false,
            200
        ));
	}







}
