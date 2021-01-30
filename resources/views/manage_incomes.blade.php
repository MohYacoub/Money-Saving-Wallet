@extends('layouts.users_layout')

@section('title')
    Manage Incomes
@endsection

@section('body')


    <!-- MAIN CONTENT-->
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-lg-12 ">
                        <div class="card">
                            <div class="card-header">Manage Incomes</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Add Incomes transactions</h3>
                                </div>
                                <hr>
                                <form action="/userdshboard/manageincomes" method="post"  >
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select_category" class=" form-control-label">Select Category
                                                Type
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="select_category" id="select" class="form-control" value="{{ old('select_category') }}">
                                                @foreach($incomes as $income)
                                                    <option value="{{$income->id}}">{{$income->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('select_category')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Amount</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="amount"  class="form-control"
                                                   value="{{ old('amount') }}" >
                                            @error('amount')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="textarea-input" class=" form-control-label">Note</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <textarea name="note" id="textarea-input" rows="9" class="form-control">{{
                                            old('note') }}</textarea>
                                            @error('note')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Add</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <div class="card-header text-center bg-light"><strong>Category Table</strong></div>
                                    <table class="table table-borderless table-data3">
                                        <thead class="bg-info">
                                        <tr>
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>amount</th>
                                            <th>note</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($all_income as $income)
                                            <tr>
                                                <td>{{$income->id}}</td>
                                                <td>{{$income->user_category->name}}</td>
                                                <td>{{$income->amount}}</td>
                                                <td>{{$income->note}}</td>
                                                <td><a class="text-primary" href="#"><span class="btn
                                                btn-primary">edit</span></a></td>
                                                <td class="text-primary"><a class="text-danger" href="#"><span
                                                            class="btn btn-danger">delete</span></a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2021 INGOT Brokers. All rights reserved. <p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



@endsection
