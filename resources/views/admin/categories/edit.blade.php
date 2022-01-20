@extends('welcome')
@section('title','Sửa')

@section('content')
<h1>Sửa thể loại {{$category->name}} </h1>
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('categories.update',[$category->id])}}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>Tên</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name}}">
                    <span style="color:red;">@error("name"){{ $message }} @enderror</span>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mô tả</label>
                    <input type="text" class="form-control" name="description" value="{{$category->description}}">
                    <span style="color:red;">@error("description"){{ $message }} @enderror</span>
                </div>
                <div> <button type="submit" class="btn btn-primary">Xác Nhận</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-danger">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection