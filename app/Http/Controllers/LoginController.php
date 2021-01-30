<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('loginpage');
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

    public function check(Request $request)
    {
        $email = $request->input('email');
        $user = User::where('email','=', $email)->get()->first();
        if($user){
            $passinp = $request->input('password');
            if(Hash::check($passinp, $user->password)){
                $request->session()->put('user',$user->id);
                $request->session()->put('user_name',$user->name);
                $request->session()->put('user_email',$user->email);
                return redirect('/userdshboard/summarypage');
            }else{
                return redirect('/Money-Wallet/login');
            }
        }
        return redirect('/Money-Wallet/login');
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

    public function logout(Request $request)
    {
        $request->session()->forget('sumdiff');
        $request->session()->forget('errormsg');
        $request->session()->forget('admin');
        $request->session()->forget('admin_email');
        $request->session()->forget('user');
        $request->session()->forget('user_name');
        $request->session()->forget('user_email');
        return redirect('/Money-Wallet/login');
    }
}
