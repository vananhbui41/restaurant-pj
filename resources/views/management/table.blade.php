@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row justify-content-center">
      @include('management.inc.sidebar')
      <div class="col-md-8">
        <h3><i class="fas fa-chair"></i> Bàn</h3>
        <a href="/management/table/create " class="btn btn-success btn-sm float-right"><i class="fas fa-plus"></i> Tạo Bàn Mới</a>
        <hr>
        @if(Session()->has('status'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">X</button>
            {{Session()->get('status')}}
          </div>
        @endif
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Tên Bàn</th>
              <th scope="col">Trạng Thái</th>
              <th scope="col">Sửa</th>
              <th scope="col">Xóa</th>
            </tr>
          </thead>
          <tbody>
            @foreach($tables as $table)
              <tr>
                <td>{{$table->id}}</td>
                <td>{{$table->name}}</td>
                <td>{{$table->status}}</td>
                <td>
                  <a href="/management/table/{{$table->id}}/edit" class="btn btn-warning">Sửa</a>
                </td>
                <td>
                  <form action="/management/table/{{$table->id}}" method="post">
                  @csrf 
                  @method('DELETE')
                  <input type="submit" value="Xóa" class="btn btn-danger">
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection