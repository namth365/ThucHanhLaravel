@extends('welcome')
@section('title','Sản Phẩm')

@section('content')
<h1>Thêm mới Sản phẩm</h1>
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên Sản Phẩm</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                        placeholder="Tối đa 150 ký tự">
                    <span style="color:red;">@error("name"){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label>Giá Sản Phẩm</label>
                    <input type="text" class="form-control" name="price" value="{{ old('price') }}"
                        placeholder="Không được dưới 0 đồng">
                    <span style="color:red;">@error("price"){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Hình Ảnh Sản Phẩm</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="image" value="{{ old('image') }}">
                    <span style="color:red;">@error("image"){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Thể Loại Sản Phẩm</label>
                    <select name="category_id" class="form-select" id="inputGroupSelect02">
                        @foreach($category as $danhmuc)
                        <option value="{{$danhmuc->id}}">{{$danhmuc->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div> <button type="submit" class="btn btn-primary">Xác Nhận</button>
                    <a href="{{ route('products.index') }}" class="btn btn-danger">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection