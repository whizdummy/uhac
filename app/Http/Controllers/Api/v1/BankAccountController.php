<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ApiModel\v1\Account;
use App\ApiModel\v1\BankAccount;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return response()
            ->json(
                [
                    'bank_accounts'         =>  $this->queryBankAccount($id)
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
    public function destroy($id, $idBankAccount)
    {
        $bank_account               =   BankAccount::find($idBankAccount);

        $bank_account->delete();

        return response()
            ->json(
                [
                    'message'           =>  'Account number is successfully removed from the account.'
                ],
                201
            );
    }

    public function queryBankAccount($id){

        $bank_accounts          =   Account::select(
            'accounts.str_name',
            'bank_accounts.str_account_no',
            'bank_accounts.int_bank_account_id'
            )
            ->join('bank_accounts', 'accounts.int_account_id', '=', 'bank_accounts.int_account_id_fk')
            ->whereNull('bank_accounts.deleted_at');

        if ($id){

            return $bank_accounts->where('accounts.int_account_id', '=', $id)
                ->get();

        }//end if

        return $bank_accounts->get();

    }//end function
}
