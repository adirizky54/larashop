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
                    <h4>{{ $mode == 'create' ? 'Add Product' : 'Edit Product' }}</h4>
                    <div class="card">
                        <form action="{{ $mode == 'create' ? route('products.store') : route('products.update', ['id' => $data['id']]) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ $mode == 'edit' ? method_field('PUT') : '' }}
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Product Name</label>
                                    <input type="text" class="form-control" placeholder="Product Name" name="name" value="{{ $data ? $data['name'] : old('name') }}" autofocus required>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Product Category</label>
                                    <select class="form-control" name="product_category_id" required>
                                        @foreach($category as $item)
                                        <option value="{{ $item['id'] }}" {{ ($mode == 'edit') ? (($data['product_category_id'] == $item['id']) ? 'selected' : '') : '' }}>{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Product Description</label>
                                    <textarea class="form-control" rows="3" name="description" placeholder="Product Description" required>{{ $data ? $data['description'] : old('description') }}</textarea>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label">Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp</span>
                                            </div>
                                            <input type="number" class="form-control" placeholder="100000" name="price" value="{{ $data ? $data['price'] : old('price') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label">Quantity</label>
                                        <input type="number" class="form-control" placeholder="Quantity" name="qty" value="{{ $data ? $data['qty'] : old('qty') }}" equired>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Product Image</label>
                                    <label class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <span class="custom-file-label"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('products.index') }}" class="btn btn-default">Back</a>&nbsp;
                                <button type="submit" class="btn btn-jwl">Submit</button>                
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection