@extends('backend.layouts.master')
@section('title')
    Class - School Management System
@endsection
@section('content')
        <!-- Content Header (Page header) -->
       
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Class List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item active">Class List</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Class List</h3>
                  <a href="{{ route('class.add') }}" class="btn btn-sm btn-outline-success float-right"><i class="fa fa-plus-circle"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  @include('backend.sessionMsg')
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Name </th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($getRecord as $key=>$item)
                      <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{$item->name}}
                        </td>
                        <td>@if ($item->status == 1)
                            <span class="badge badge-success">Active</span>
                        @else
                          <span class="badge badge-danger">Inactive</span>
                        @endif</td>
                        <td>{{ $item->created_by_name }}</td>
                        <td> {{ $item->created_at->format('d, M Y') }}</td>
                        <td>
                          <a href="{{ route('class.edit', $item->id) }}" class="btn btn-sm btn-outline-info"><i class="fa-regular fa-pen-to-square"></i></a>
                          <a href="{{ route('class.delete', $item->id) }}" class="btn btn-sm btn-outline-danger"><i class="fa-regular fa-trash-can"></i></a>
                        </td>
                      </tr>
                      @endforeach
                      {{-- {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!} --}}

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                      <th>Name </th>
                      <th>Status</th>
                      <th>Created By</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
@endsection