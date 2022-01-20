@extends('welcome')
@section('title','Thể Loại')

@section('content')

<h1 class="mt-4">Thể Loại</h1>
<table class="table">

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <thead>
        <tr>
            <th scope="col">Mã Loại</th>
            <th scope="col">Tên</th>
            <th scope="col">Mô Tả</th>
            <th scope="col" style="width: 100px;">Chức Năng</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $key => $category)
        <tr>
            <td>{{ $category->code }}</td>
            <td>{{ $category->name }}</td>
            <td>{!!$category->description !!}</td>
            <td>
                <a href="{{route('categories.edit',[$category->id])}}" class="btn btn-primary ">Sửa</a>
            </td>
            <td>
                <form action="{{route('categories.destroy',[$category->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button onclick="return confirm('Xóa sản phẩm {{ $category->name }} không?');"
                        class="btn btn-danger">Xóa</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <span aria-hidden="true"> {{ $categories->links() }}</span>
    </ul>
</nav>

@endsection