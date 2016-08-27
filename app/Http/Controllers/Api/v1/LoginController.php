<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use ApiModel\v1\Session;

use Carbon\Carbon;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $session    = Session::where('str_serial', '=', $request->str_serial)
            ->first();

        if($session) {
            return response()
            ->json(
                [
                    'message'           =>  "Account is already in use"
                ],
                500
            );
        } else {
            Session::create([
                'int_account_id_fk'     => $request->int_account_id,
                'dat_last'              => Carbon::now(),
                'str_phone_model'       => $request->str_phone_model,
                'str_phone_platform'    => $request->str_phone_platform,
                'str_version'           => $request->str_version,
                'str_serial'            => $request->str_serial
            ]);

            return response()
            ->json(
                [
                    'message'           =>  "Login successfully"
                ],
                200
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
}
