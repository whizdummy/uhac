<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ApiModel\v1\Goal;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       return response()->json([
            'account_goals' => Goal::where('int_account_id_fk', '=', $id)
                ->get()
        ]);
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
    public function store($id, Request $request)
    {
        $goal = Goal::create([
            'int_account_id_fk'     => $id,
            'int_category_id_fk'    => $request->int_category_id,
            'str_goal_name'         => $request->str_goal_name,
            'txt_remarks'           => $request->txt_remarks ? $request->txt_remarks : null,
            'deci_value'            => $request->deci_value,
            'date_due'              => $request->date_due
        ]);

        return response()
            ->json(
                [
                    'goal'          =>  $goal,
                    'message'       =>  'Goal is successfully created.'
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
        return response()
            ->json(
                [
                    'goals'        =>  Goal::where('int_account_id_fk', '=', $id)
                                        ->select(
                                            'int_goal_id',
                                            'str_goal_name',
                                            'deci_value',
                                            'date_due'
                                        )
                                        ->get()
                ],
                200
            );
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
        $goal   = Goal::find($id);

        $goal->str_goal_name    = $request->str_goal_name;
        $goal->txt_remarks      = $request->txt_remarks;
        $goal->deci_value       = $request->deci_value;
        $goal->date_due         = $request->date_due;

        $goal->save();

        return response()
            ->json(
                [
                    'goal'          =>  $goal
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
        $goal   = Goal::find($id);

        $goal->delete();

        return response()
            ->json(
                [
                    'message'           =>  "Goal is successfully deleted."
                ],
                201
            );
    }
}
