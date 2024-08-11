@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1>Edit Admin</h1>
                </div>
            </div>
            </div>
        </section>
  
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form action="{{ url('admin/admin/edit/'.$getRecord->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required value="{{ old('name', $getRecord->name) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required value="{{ old('email', $getRecord->email) }}">
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                        <p>Do you want to change password? So please enter.</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select id="status" class="form-control" name="status" required>
                                            <option value="0" {{ $getRecord->status == 0 ? 'selected' : ''}}>Active</option>
                                            <option value="1" {{ $getRecord->status == 1 ? 'selected' : ''}}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                
                                <div class="card-footer">
                                    <button type="submit" class="btn" style="background-color: #9c6644;color:#fff; transition: 0.4s" onmouseover="this.style.backgroundColor='#d4a373'" onmouseout="this.style.backgroundColor='#9c6644'">Update</button>
                                </div>
                            </form>
                        </div>
            
                    </div>
                </div>
            </div>
        </section>
    </div> 
@endsection