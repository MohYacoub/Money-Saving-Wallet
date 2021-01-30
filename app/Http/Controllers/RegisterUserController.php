<?php

namespace App\Http\Controllers;
use App\User;
use App\category_type;
use App\wallet_currency;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallet_currencies = wallet_currency::all();
        return view('registerpage',compact('wallet_currencies'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,$this->id,id',
            'country_code' => 'required|Digits:5',
            'phone' => 'required|unique:users,phone,$this->id,id|digits:9',
            'birthdate' => 'required',
            'password' => ['required','string','min:8','regex:/[A-Za-z]/',
                            'regex:/[0-9]/',
                            ],
            'image' => 'required | max:5120 |mimes:jpeg,jpg,png,gif'
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

        if ($request->file('image')) {
            $file = $request->file('image') ;
            $ext = $file->getClientOriginalExtension() ;
            $filename = time() . '.' . $ext ;
            $file->move('uploads/images', $filename);
        }

        $user = new User();
        $user->name =$request->input('name');
        $user->email =$request->input('email');
        $user->password =Hash::make($request->input('password'));
        $user->country_code =$request->input('country_code');
        $user->phone =$request->input('phone');
        $user->birthdate = $request->input('birthdate');
        $user->wallet_currency =$request->input('wallet_currency');
        $user->image =$filename;
        $user->save();
        return redirect('/Money-Wallet/Register');
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
