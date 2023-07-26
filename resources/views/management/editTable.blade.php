@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      @include('management.inc.sidebar')
      <div class="col-md-8">
        <h3> <i class="fas fa-chair"></i> Sửa Thông Tin Bàn </h3>
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
        <form action="/management/table/{{$table->id}}" method="POST">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label for="tableName">Tên Bàn</label>
            <input type="text" name="name" value="{{$table->name}}" class="form-control" placeholder="Table...">
          </div>
          <button type="submit" class="btn btn-warning">Lưu</button>
        </form>
      </div>
    </div>
  </div>
@endsection