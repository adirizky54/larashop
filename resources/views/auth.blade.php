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
                <div class="col-12 mb-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(\Session::has('alert'))
                        <div class="alert alert-danger">
                            <div>{{Session::get('alert')}}</div>
                        </div>
                    @endif
                    @if(\Session::has('alert-success'))
                        <div class="alert alert-success">
                            <div>{{Session::get('alert-success')}}</div>
                        </div>
                    @endif
                </div>
                <div class="col-md-6 mb-4 mb-md-0">
                    <h4 class="mb-4">Login</h4>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="form-label">Email *</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label d-flex justify-content-between align-items-end">
                                        <div>Password *</div>
                                        <a href="javascript:void(0)" class="d-block small text-jwl">Lost Your Password?</a>
                                    </label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="d-flex justify-content-between align-items-center m-0">
                                    <label class="custom-control custom-checkbox m-0">
                                        <input type="checkbox" class="custom-control-input">
                                        <span class="custom-control-label">Remember me</span>
                                    </label>
                                    <button type="submit" class="btn btn-jwl">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h4 class="mb-4">Register</h4>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('register') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="form-label">Nama *</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email *</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Password *</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="d-flex justify-content-end align-items-end m-0">
                                    <button type="submit" class="btn btn-jwl">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection