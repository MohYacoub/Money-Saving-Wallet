@extends('layouts.users_layout')

@section('title')
    Summary Page
@endsection

@section('body')


    <!-- MAIN CONTENT-->
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                <tr>
                                    <th>date</th>
                                    <th>Category type</th>
                                    <th>amount</th>
                                    <th>note</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                <tr>
                                    <td>{{$transaction->created_at}}</td>
                                    <td>{{$transaction->category_type}}</td>
                                    <td>{{$transaction->amount}}</td>
                                    <td>{{$transaction->note}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="au-card au-card--bg-blue au-card-top-countries m-b-30">
                            <div class="au-card-inner">
                                <div class="table-responsive">
                                    <table class="table table-top-countries">
                                        <tbody>
                                        <tr>
                                            <td>Total Incomes</td>
                                            <td class="text-right">{{$sum}}</td>
                                        </tr>
                                        <tr>
                                            <td>Total expenses</td>
                                            <td class="text-right">{{$sum2}}</td>
                                        </tr>
                                        <tr>
                                            <td>Balance</td>
                                            <td class="text-right">{{$balance}}</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <div class="au-card m-b-30">
                    <div class="au-card-inner"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                        <h3 class="title-2 m-b-40">Bar chart</h3>
                        <canvas id="barChart" height="395" width="592" class="chartjs-render-monitor" style="display: block; height: 316px; width: 474px;"></canvas>
                    </div>
                </div>
            </div>


@endsection
