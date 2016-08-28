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

        $expenseData = json_decode($request->expenseData);

        $transaction->int_bank_account_id_fk        =   (int) $expenseData->int_bank_account_id;
        $transaction->int_transaction_type          =   $request->transactionType;
        $transaction->int_category_id_fk            =   (int) $expenseData->int_category_id;
        $transaction->deci_value                    =   $expenseData->deci_value;
        $transaction->int_bill_id_fk                =   isset($expenseData->int_bill_id) ? $expenseData->int_bill_id : null;
        $transaction->int_transfer_account_id_fk    =   isset($expenseData->int_transfer_account_id) ? $expenseData->int_transfer_account_id : null;
        $transaction->str_confirmation_no           =   isset($expenseData->str_confirmation_no) ? $expenseData->str_confirmation_no : null;
        $transaction->str_source_currency           =   isset($expenseData->source_currency) ? $expenseData->source_currency : null;
        $transaction->str_transfer_currency         =   isset($expenseData->str_transfer_currency) ? $expenseData->str_transfer_currency : null;
        $transaction->boolStatus                    =   $expenseData->status == "S" ? 1: 0;

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

    public function getAccountTransactions($accountId)
    {
        return response()->json([
            'account_transaction_details'   => Transaction::join('bank_accounts', 'transactions.int_bank_account_id_fk', '=', 'bank_accounts.int_bank_account_id')
                ->join('accounts', 'bank_accounts.int_account_id_fk', '=', 'accounts.int_account_id')
                ->where('accounts.int_account_id', '=', $accountId)
                ->select(
                    'transactions.created_at',
                    'transactions.int_transaction_type',
                    'bank_accounts.str_account_no',
                    'transactions.deci_value',
                    'transactions.boolStatus'
                )
                ->groupBy('transactions.int_bank_account_id_fk')
                ->orderBy('transactions.created_at', 'desc')
                ->get()
        ]);
    }
}