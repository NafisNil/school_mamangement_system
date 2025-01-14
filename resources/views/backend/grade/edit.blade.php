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
              <h1>Grade Edit</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                <li class="breadcrumb-item active">Grade Edit</li>
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
                  <h3 class="card-title">Edit Class </h3>
                  <a href="{{ route('class.add') }}" class="btn btn-sm btn-outline-success float-right"><i class="fa fa-plus-circle"></i></a>
                </div>
                <!-- /.card-header -->
                @include('backend.sessionMsg')
                <div class="card-body">
                    <form action="{{route('class.update', $getRecord->id)}}"  method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ old('name', $getRecord->name) }}" required>
                              </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Status </label>
                            <select name="status" id="" class="form-control">
                                <option value="1"  {{$getRecord->status == 1 ?  'selected' : '' }}>Active</option>
                                <option value="0"  {{$getRecord->status == 0 ?  'selected' : '' }}>Inactive</option>
                            </select>
                        
                          </div>
                         
        
                        </div>
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
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