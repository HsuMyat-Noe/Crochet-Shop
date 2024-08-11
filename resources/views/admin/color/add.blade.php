@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1>Add New Color</h1>
                </div>
            </div>
            </div>
        </section>
  
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form action="{{ url('admin/color/add') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name" placeholder="Enter Color Name" required>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Code <span class="text-danger">*</span></label>
                                        <input type="color" class="form-control" value="{{ old('code') }}" name="code" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select id="status" class="form-control" name="status" required>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Active</option>
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                
                                <div class="card-footer">
                                    <button type="submit" class="btn" style="background-color: #9c6644;color:#fff; transition: 0.4s" onmouseover="this.style.backgroundColor='#d4a373'" onmouseout="this.style.backgroundColor='#9c6644'">Submit</button>
                                </div>
                            </form>
                        </div>
            
                    </div>
                </div>
            </div>
        </section>
    </div> 
@endsection