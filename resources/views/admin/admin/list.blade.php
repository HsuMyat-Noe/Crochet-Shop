@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-6">
                <h1>Admin List</h1>
                </div>
                <div class="col-6" style="text-align: right;">
                    <a href="{{ url('admin/admin/add') }}" class="btn" style="background-color:#9c6644; color:#fff; transition: 0.4s" onmouseover="this.style.backgroundColor='#d4a373';"
                    onmouseout="this.style.backgroundColor='#9c6644';">Add Admin</a>
                </div>
            </div>
            </div>
        </section>
  
        <section class="content">
            <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @include('admin.layout._message')
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Admin List</h3>
                    </div>
                    <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($getRecord as $value)
                        <tr>    
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->status == 0 ? 'Active' : 'Inactive'}}</td>
                            <td>
                                <a href="{{ url('admin/admin/edit/'.$value->id) }}" class="btn btn-success">Edit</a>
                                <a href="{{ url('admin/admin/delete/'.$value->id) }}" class="btn btn-danger">Delete</a>
                            </td>  
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div style="padding: 10px; float: right;">
                        {{ $getRecord->links() }}
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
    </div> 
@endsection