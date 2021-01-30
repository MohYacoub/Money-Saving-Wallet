@extends('layouts.main_layout')

@section('title')
    Register
@endsection

@section('body')
    <body class="animsition"  >
    <div class="page-wrapper" >
        <div class="page-content--bge5" style="height: auto">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{ asset('dashboard_theme/images/icon/logo.png')}}" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="/Money-Wallet/Register" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-title">
                                    <h3 class="text-center title-2">Register Here</h3>
                                    <hr>
                                </div>
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="name"
                                           placeholder="Username" value="{{ old('name') }}">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email"
                                           placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <label>Phone Number </label>
                                <div class="row form-group">
                                    <div class="col-3">
                                        <input type="text" placeholder="country code" name="country_code"
                                               class="form-control" value="{{ old('country_code') }}">
                                    </div>
                                    <span>-</span>
                                    <div class="col-8">
                                        <input type="text" name="phone" placeholder="phone code" class="form-control" value="{{ old('phone') }}">
                                    </div>
                                    @error('country_code')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    @error('phone')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Birthdate</label>
                                    <input class="au-input au-input--full" type="date" name="birthdate"
                                           placeholder="birthdate" value="{{ old('birthdate') }}">
                                    @error('birthdate')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Uplode Image</label>
                                    <input type="file" id="file-input" name="image" class="form-control-file">
                                    @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Wallet Currency</label>
                                    <select name="wallet_currency" id="select" class="form-control" value="{{ old('wallet_currency') }}">
                                        @foreach($wallet_currencies as $wallet_currency)
                                        <option value="{{$wallet_currency->currency}}">{{$wallet_currency->currency}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>

                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="/Money-Wallet/login">Sign In</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </body>

@endsection
