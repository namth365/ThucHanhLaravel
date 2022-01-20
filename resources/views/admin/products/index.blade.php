@extends('welcome')
@section('title','Sản Phẩm')

@section('content')
<div class='card'>
    <div class='card-header'>
        <h1 class="mt-12">Danh Sách Sản Phẩm Mới Nhất</h1>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <form method="get">
            <div class="row">
                <div class="col-lg-4">
                    <select class="form-control" name="search">
                        <option value="25000 ">0 đến 100.000</option>
                        <option value="200000">100.000 đến 200.000</option>
                        <option value="400000">200.000 đến 500.000</option>
                        <option value="350000">Trên 500.000</option>

                    </select>
                </div>
                <!-- <div class="col-lg-6">
                    <input class="form-control" type="text" placeholder="Tìm kiếm..." name="search" />
                </div> -->
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-secondary">Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>

    <div class='card-body'>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã Sản Phẩm</th>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Giá Sản Phẩm</th>
                            <th scope="col">Hình Ảnh</th>
                            <th scope="col">Thể Loại</th>
                            <th scope="col" style=" width: 100px;"></th>
                            <th scope="col" style=" width: 100px;">Chức Năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $product)
                        <tr>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format ($product->price) }} đ</td>
                            <td><img src="{{ asset('storage/app/public/images/'.$product->image) }}" alt=""
                                    style="width: 150px">
                            </td>
                            <td>{{ $product->category->name }}</td>
                            <td><a href="{{route('products.show',[$product->id])}}" class="btn btn-info"> Xem </a> </td>
                            <td>
                                <a href="{{route('products.edit',[$product->id])}}" class="btn btn-primary">Sửa</a>
                            </td>
                            <td>
                                <form action="{{route('products.destroy',[$product->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button
                                        onclick="return confirm('Bạn muốn xóa sản phẩm {{ $product->name }} không?');"
                                        class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <div class='float:right'>
                <ul class="pagination">
                    <span aria-hidden="true"> {{ $products->links() }}</span>
                </ul>
            </div>
        </nav>
    </div>
</div>
@endsection