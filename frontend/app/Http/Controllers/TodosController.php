<?php namespace App\Http\Controllers;

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
		var_dump('idex');
        exit;
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
    /*
	public function create()
	{
		//
	}
    */

	/**
	 * Store a newly created resource in storage.
     * Verb POST
     * Path /todos
	 * @return Response
	 */
	public function store()
	{
		//
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
