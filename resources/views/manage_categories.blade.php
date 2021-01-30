@extends('layouts.users_layout')

@section('title')
    Manage Category
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
                            <div class="card-header">Manage Category</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Create Incomes/Expenses Category</h3>
                                </div>
                                <hr>
                                <form action="/userdshboard/managecategory" method="post"  >
                                    @csrf
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="select_category" class=" form-control-label">Select Category
                                                Type
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <select name="select_category" id="select" class="form-control" value="{{ old('select_category') }}">
                                            @foreach($category_types as $type)
                                                    <option value="{{$type->id}}">{{$type->type}}</option>
                                                @endforeach
                                            </select>
                                            @error('select_category')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group has-success">
                                        <label for="cc-name" class="control-label mb-1">Category Name</label>
                                        <input id="cc-name" name="name" type="text" class="form-control cc-name valid" value="{{ old('name') }}">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Create</span>
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
                                            <th>Name</th>
                                            <th>type</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user_categories as $categories)
                                            <tr>
                                                <td>{{$categories->id}}</td>
                                                <td>{{$categories->name}}</td>
                                                <td>{{$categories->category_type->type}}</td>
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
