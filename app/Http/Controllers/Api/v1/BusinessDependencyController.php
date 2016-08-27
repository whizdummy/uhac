<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ApiModel\v1\BusinessDependency;

class BusinessDependencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
        	->json(
        		[
        			'businessDependencies'			=>	$this->queryBusinessDependency(null)
        		],
        		200
        	);
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
        try{

        	DB::beginTransaction();

        	foreach($request->businessDependencies as $businessDependency){

        		BusinessDependency::create([
        			'str_business_dependency_name'		=>	$businessDependency['str_business_dependency_name'],
        			'str_business_dependency_value'		=>	$businessDependency['str_business_dependency_value']
        		]);

        	}//end foreach

        	DB::commit();
        	return response()
        		->json(
        			[
        				'message'			=>	'Business dependencies are successfully updated.'
        			],
        			201
        		);

        }catch(Exception $e){
        	DB::rollBack();
        	return response()
        		->json(
        			[
        				'message'			=>	$e->getMessage()
        			],
        			500
        		);
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function queryBusinessDependency($id){

    	$businessDependencies 			=	BusinessDependency::select(
    		'int_business_dependency_id',
    		'str_business_dependency_name',
    		'str_business_dependency_value'
    	);

    	if ($id){
    		return $businessDependencies->where('int_business_dependency_id', '=', $id)
    			->first();
    	}

    	return $businessDependencies->get();

    }//end function
}
