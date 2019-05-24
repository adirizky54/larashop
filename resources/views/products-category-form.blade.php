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
                    <h4>{{ $mode == 'create' ? 'Add Category' : 'Edit Category' }}</h4>
                    <div class="card">
                        <form action="{{ $mode == 'create' ? route('products.category.store') : route('products.category.update', ['id' => $data['id']]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ $mode == 'edit' ? method_field('PUT') : '' }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" class="form-control" placeholder="Product Name" name="name" value="{{ $data ? $data['name'] : old('name') }}" autofocus required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('products.category.index') }}" class="btn btn-default">Back</a>&nbsp;
                                <button type="submit" class="btn btn-jwl">Submit</button>                
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection