@extends('layouts.app')

@section('content')

    <div class="page-title">
        <div class="container px-md-0 py-5 border-bottom">
            <div class="row">
                <div class="col-12 text-center">
                    <h3 class="font-weight-bold mb-0">My Account</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="user-login py-4">
        <div class="container px-md-0 py-3 py-md-5">
            <div class="row">
                <div class="col-lg-3">
                    @include('layouts.sidemenu')
                </div>
                <div class="col-lg-9">
                    <h4>Dashboard</h4>
                    <p>From your account dashboard. you can easily check & view your <a href="" class="text-jwl">recent orders</a>.</p>
                </div>
            </div>
        </div>
    </div>

@endsection