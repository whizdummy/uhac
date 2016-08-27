<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ApiModel\v1\Account;

class BankAccountController extends Controller
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
    public function store($id, Request $request)
    {
        $bank_account           =   BankAccount::create([
            'int_account_id_fk'         =>  $id,
            'str_account_no'            =>  $request->str_account_no
        ]);

        return response()
            ->json(
                [
                    'bank_account'          =>  $bank_account
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

    public function queryBankAccount($id){

        $bank_accounts          =   Account::select(
            'account.str_name',
            'account.str_contact_no',
            'bank_account.str_account_no'
            )
            ->join('bank_accounts', 'account.int_account_id', '=', 'bank_accounts.int_account_id_fk');

        if ($id){

            return $bank_accounts->where('account.int_account_id', '=', $id)
                ->get();

        }//end if

        return $bank_accounts->get();

    }//end function
}
