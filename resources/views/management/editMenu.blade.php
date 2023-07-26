@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      @include('management.inc.sidebar')
      <div class="col-md-8">
        <h3><i class="fas fa-hamburger"></i> Sửa Món Ăn </h3>
        <hr>
        @if($errors->any())
          <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
              </ul>
          </div>
        @endif
        <form action="/management/menu/{{$menu->id}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="menuName">Tên Món Ăn</label>
            <input type="text" name="name" value="{{$menu->name}}" class="form-control" placeholder="Item...">
          </div>
          <label for="menuPrice">Giá Tiền</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">VNĐ</span>
            </div>
            <input type="text" name="price" value="{{$menu->price}}" class="form-control" aria-label="">
          </div>
          <label for="MenuImage">Ảnh</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" name="image" class="custom-file-input" id="inputGroupFile01">
              <label class="custom-file-label" for="inputGroupFile01">Chọn Ảnh</label>            
            </div>
          </div>

          <div class="form-group">
            <label for="Description">Mô Tả</label>
            <input type="text" name="description" value="{{$menu->description}}" class="form-control" placeholder="Mô tả...">
          </div>

          <div class="form-group">
            <label for="Category">Phân Loại</label>
            <select class="form-control" name="category_id">
              @foreach ($categories as $category)
                <option value="{{$category->id}}" {{$menu->category_id === $category->id ? 'selected': ''}}>{{$category->name}}</option>

              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-warning">Edit</button>
        </form>
      </div>
    </div>
  </div>
@endsection