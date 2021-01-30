<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $all_income = Transaction::where('category_type', '=', 'incomes')->get();
        $all_expenses = Transaction::where('category_type', '=', 'expenses')->get();

        return view('/admindashboard',compact('users','all_income','all_expenses'));
    }
    public function login()
    {
        return view('adminloginpage');
    }

    public function check(Request $request)
    {
        $email = $request->input('email');
        $admin = Admin::where('email','=', $email)->get()->first();
        if($admin){
            $passinp = $request->input('password');
            if(Hash::check($passinp, $admin->password)){
                $request->session()->put('admin',$admin->email);
                $request->session()->put('admin_email',$admin->email);
                return redirect('/admindashboard');
            }else{
                return redirect('/Money-Wallet/adminlogin');
            }
        }
        return redirect('/Money-Wallet/adminlogin');
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
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
