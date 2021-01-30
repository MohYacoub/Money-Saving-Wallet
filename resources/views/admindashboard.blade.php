@extends('layouts.admin_layout')

@section('title')
    User Dashboard
@endsection

@section('body')


        <!-- MAIN CONTENT-->
        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <!-- DATA TABLE-->
                            <div class="table-responsive m-b-40">
                                <div class="card-header text-center bg-light"><strong>Users Table</strong></div>
                                <table class="table table-borderless table-data3">
                                    <thead class="bg-info">
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Birthdate</th>
                                        <th>Total incomes </th>
                                        <th>Total expenses </th>
                                        <th> Registered date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->birthdate}}</td>
                                            @php
                                            $sum=0;
                                            foreach ($all_income as $income){
                                            $id = $income->user_category->user_id;
                                            if($user->id == $id){
                                            $income_money = $income->amount;
                                            $sum = $sum + $income_money;
                                            }
                                                }
                                            echo "<td>{$sum}</td>"
                                            @endphp
                                            @php
                                                $sum2=0;
                                                foreach ($all_expenses as $expense){
                                                $id = $expense->user_category->user_id;
                                                if($user->id == $id){
                                                $income_money = $expense->amount;
                                                $sum2 = $sum2 + $income_money;
                                                }
                                                    }
                                                echo "<td>{$sum2}</td>"
                                            @endphp
                                            <td>{{$user->created_at}}</td>
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

                    <div class="col-md-12">
                        <div class="copyright">
                            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



@endsection
