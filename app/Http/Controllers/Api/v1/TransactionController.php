<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use ApiModel\v1\Transaction;

class TransactionController extends Controller
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
        // 
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
        if($request->transactionType === (int) 1) {
            // Transfer
        } else if($request->transactionType === (int) 2) {
            // Expense
            if($request->isBank) {
                // Bank
            } else {
                // Manual input
                $this->createTransactionManual($request);
            }
        } else if($request->transactionType === (int) 3) {
            // Income or Savings
            $this->createTransactionManual($request);
        } else {
            return response()
            ->json(
                [
                    'message'       =>  'Invalid transaction type'
                ],
                500
            );
        }

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

    public function createTransactionManual(Request $request)
    {
        Transaction::update([
            'int_bank_account_id_fk'    => $request->int_bank_account_id,
            'int_transaction_type'      => $request->transactionType,
            'int_category_id_fk'        => $request->int_category_id,
            'deci_value'                => $request->deci_value
        ]);
    }
}
