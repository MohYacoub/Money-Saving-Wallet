<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\user_category;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = user_category::where('user_id','=',session('user'))->where('category_type_id','=','1')->get();
        $all_income = Transaction::where([['user_id','=',session('user') ],['category_type', '=', 'incomes']])->get();
        return view('/manage_incomes',compact('incomes','all_income'));
    }

    public function indexexpenses()
    {

        $expenses = user_category::where('user_id','=',session('user'))->where('category_type_id','=','2')->get();
        $all_expenses = Transaction::where([['user_id','=',session('user') ],['category_type', '=', 'expenses']])
            ->get();
        return view('/manage_expenses',compact('expenses','all_expenses'));
    }
    public function indexsummry()
    {
        $sum = 0;
        $all_income = Transaction::where('category_type', '=', 'incomes')->get();
        foreach ($all_income as $income){
            $id = $income->user_category->user_id;
            if((session('user')) == $id){
                $income_money = $income->amount;
                $sum = $sum + $income_money;
            }
        }

        $sum2 = 0;
        $all_expenses = Transaction::where('category_type', '=', 'expenses')->get();
        foreach ($all_expenses as $expense){
            $id = $expense->user_category->user_id;
            if((session('user')) == $id){
                $income_money = $expense->amount;
                $sum2 = $sum2 + $income_money;
            }
        }
        $balance = $sum - $sum2;
        $transactions = Transaction::where('user_id','=',session('user'))->get();
        return view('/summarypage',compact('transactions','sum','sum2','balance'));
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

    public function validation($request)
    {
        $request->validate([
            'amount' => 'required | integer',
        ]);
    }
    public function validationexpenses($request)
    {
        $request->validate([
            'amount' => 'required | integer',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validation($request);

        $incomes_trans = new Transaction();
        $incomes_trans->category_type ="incomes";
        $incomes_trans->user_id = session('user');
        $incomes_trans->user_category_id =$request->input('select_category');
        $incomes_trans->amount = $request->input('amount');
        $incomes_trans->note =$request->input('note');
        $incomes_trans->save();
        return redirect('/userdshboard/manageincomes');
    }

    public function storeexpenses(Request $request)
    {
        $sum = 0;
        $all_income = Transaction::where('category_type', '=', 'incomes')->get();
        foreach ($all_income as $income){
            $id = $income->user_category->user_id;
            if((session('user')) == $id){
                $income_money = $income->amount;
                $sum = $sum + $income_money;
            }
        }

        $sum2 = 0;
        $all_expenses = Transaction::where('category_type', '=', 'expenses')->get();
        foreach ($all_expenses as $expense){
            $id = $expense->user_category->user_id;
            if((session('user')) == $id){
                $income_money = $expense->amount;
                $sum2 = $sum2 + $income_money;
            }
        }
        $inputnum = $request->input('amount');
        $sumcheck = $sum2 + $inputnum;
        if($sumcheck > $sum){
            $sumdiff = $sum2 - $sum;
            $request->session()->put('errormsg', 'you final amount is above incomes ');
            $request->session()->put('sumdiff', $sumdiff);
           return redirect('/userdshboard/manageexpenses');
        }

        $this->validationexpenses($request);

        $incomes_trans = new Transaction();
        $incomes_trans->category_type ="expenses";
        $incomes_trans->user_id = session('user');
        $incomes_trans->user_category_id =$request->input('select_category');
        $incomes_trans->amount = $request->input('amount');
        $incomes_trans->note =$request->input('note');
        $incomes_trans->save();
        return redirect('/userdshboard/manageexpenses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
