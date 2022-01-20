@extends('welcome')
@section('title','Xem Chi Tiết Sản Phẩm')

@section('content')
<h1>Xem Chi Tiết {{$product->name}}</h1>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <tr>
                            <th scope="col">Tên sản phẩm</th>
                            <td>{{$product->name}}</td>
                        </tr>
                        <tr class="">
                            <th scope="col">Giá sản phẩm</th>
                            <td>{{ number_format ($product->price) }} đ</td>
                        </tr>
                        <tr class="">
                            <th scope="col">Hình ảnh sản phẩm</th>
                            <td><img src="{{ asset('/storage/app/public/images/' . $product->image) }}" alt=""
                                    style="width: 150px"></td>
                        </tr>
                        <tr class="">
                            <th scope="col">Thể Loại</th>
                            <td>{{$product->category->name}}</td>
                        </tr>
                    </table>
                </div>
                <div>
                    <a href="{{ route('products.index') }}" class="btn btn-warning">Quay Lại</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection