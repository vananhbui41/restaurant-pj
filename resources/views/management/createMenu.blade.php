@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      @include('management.inc.sidebar')
      <div class="col-md-8">
        <h3><i class="fas fa-hamburger"></i> Tạo Món Ăn Mới</h3>
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
        <form action="/management/menu" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="menuName">Tên Món</label>
            <input type="text" name="name" class="form-control" placeholder="Item...">
          </div>
          <label for="menuPrice">Giá tiền</label>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">VNĐ</span>
            </div>
            <input type="text" name="price" class="form-control" aria-label="">
            <div class="input-group-append">
            </div>
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
            <input type="text" name="description" class="form-control" placeholder="VD: Thành Phần...">
          </div>

          <div class="form-group">
            <label for="Category">Phân Loại</label>
            <select class="form-control" name="category_id">
              <option value="0" selected>Chọn Một Phân Loại</option>
              @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>

              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
      </div>
    </div>
  </div>
@endsection