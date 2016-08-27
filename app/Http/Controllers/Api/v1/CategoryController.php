<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ApiModel\v1\Category;

class CategoryController extends Controller
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
                    'categories'        =>  $this->queryCategory(null)
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
        $category           =   Category::create([
            'str_category'          =>  $request->str_category
        ]);

        return response()
            ->json(
                [
                    'category'          =>  $category,
                    'message'           =>  'Category is successfully created.'
                ],
                201
            );
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
        return response()
            ->json(
                [
                    'category'          =>  $this->queryCategory($id)
                ],
                200
            );
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
        $category           =   Category::find($id);

        $category->str_category         =   $request->str_category;

        $category->save();

        return response()
            ->json(
                [
                    'category'          =>  $category,
                    'message'           =>  'Category is successfully updated.'
                ],
                201
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category           =   Category::find($id);

        $category->delete();

        return response()
            ->json(
                [
                    'message'           =>  'Category is successfully deleted.'
                ],
                201
            );
    }

    public function queryCategory($id){

        $categories             =   Category::select(
            'str_category',
            'int_category_id'
            );

        if ($id){
            return $categories->where('int_category_id', '=', $id)
                ->first();
        }

        return $categories->get();

    }//end function
}
