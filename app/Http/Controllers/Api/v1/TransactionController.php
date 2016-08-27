<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ApiModel\v1\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id, $bankAccountId)
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
    public function store($id, $bankAccountId, Request $request)
    {
        $transaction            =   Transaction::create([
            'int_bank_account_id_fk'        =>  $bankAccountId
        ]);
        return response()
            ->json(
                [
                    'transaction'       =>  $transaction
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
    public function update($accountId, $bankAccountId, Request $request, $transactionId)
    {
        $transaction                =   Transaction::find($transactionId);

        if($request->transactionType < (int) 3) {
            // Transfer
        } else {
            return response()
            ->json(
                [
                    'message'       =>  'Invalid transaction type.'
                ],
                500
            );
        }

        $transaction->int_bank_account_id_fk        =   $request->int_bank_account_id;
        $transaction->int_transaction_type          =   $request->transactionType;
        $transaction->int_category_id_fk            =   $request->int_category_id;
        $transaction->deci_value                    =   $request->deci_value;
        $transaction->int_bill_id_fk                =   $request->int_bill_id;
        $transaction->int_transfer_account_id_fk    =   $request->int_transfer_account_id;
        $transaction->str_confirmation_no           =   $request->str_confirmation_no;
        $transaction->str_source_currency           =   $request->str_source_currency;
        $transaction->str_transfer_currency         =   $request->str_transfer_currency;
        $transaction->boolStatus                    =   $request->status == 'S'? 1: 0;

        $transaction->save();

        return response()
            ->json(
                [
                    'message'       =>  'Transaction added successfully'
                ],
                200
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
}
