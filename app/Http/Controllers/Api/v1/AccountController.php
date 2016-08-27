<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ApiModel\v1\Account;
use App\ApiModel\v1\Session;

use Carbon\Carbon;
use DB;

class AccountController extends Controller
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
                    'accounts'          =>  $this->queryAccount(null)
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
            $account            =   Account::create([
                'str_name'          =>  $request->str_name,
                'date_birthday'     =>  $request->date_birthday,
                'int_gender'        =>  $request->int_gender,
                'int_civil_status'  =>  $request->int_civil_status,
                'str_username'      =>  $request->str_username,
                'str_password'      =>  bcrypt($request->str_password),
                'str_email'         =>  $request->str_email,
                'str_contact'       =>  $request->str_contact
            ]);

            $session            =   Session::create([
                'int_account_id_fk'     =>  $account->int_account_id,
                'dat_last'              =>  Carbon::now(),
                'str_serial'            =>  $request->str_serial,
                'str_phone_model'       =>  $request->str_phone_model,
                'str_phone_platform'    =>  $request->str_phone_platform,
                'str_version'           =>  $request->str_version
            ]);

            //send message for otp

            return response()
                ->json(
                    [
                        'account'           =>  $account
                    ],
                    201
                );
        }catch(Exception $e){

            DB::rollBack();
            return response()
                ->json(
                    [
                        'message'       =>  $e->getMessage()
                    ],
                    500
                );

        }//end try catch
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
                    'account'           =>  $this->queryAccount($id)
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
        $account                    =   Account::find($id);

        $account->str_name          =   $request->str_name;
        $account->date_birthday     =   $request->date_birthday;
        $account->int_gender        =   $request->int_gender;
        $account->int_civil_status  =   $request->int_civil_status;
        $account->str_email         =   $request->str_email;
        $account->str_password      =   bcrypt($request->str_password);
        $account->str_contact       =   $request->str_contact;

        $account->save();

        return response()
            ->json(
                [
                    'account'       =>  $account
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
        //
    }

    public function queryAccount($id){

        $accounts           =   Account::select()
            ->join('bank_accounts', 'accounts.int_account_id', '=', 'bank_accounts.int_bank_account_id');

        if ($id){
            return $accounts->where('accounts.int_account_id', '=', $id)
                ->get();
        }

        return $accounts->get();

    }//end function
    
}
