@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1>Add New Product</h1>
                </div>
            </div>
            </div>
        </section>
  
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form action="{{ url('admin/product/add') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    {{-- <div class="form-group">
                                        <label>Category Name <span class="text-danger">*</span></label>
                                        <select name="category_name" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($getCategory as $value)
                                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}

                                    <div class="form-group">
                                        <label for="title">Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="title" value="{{ old('title') }}" name="title" placeholder="Enter Product Title" required>
                                    </div>
                                    
                                    {{-- <div class="form-group">
                                        <label for="slug">Slug <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="slug" value="{{ old('slug') }}" name="slug" placeholder="Enter Slug" required>
                                        <div class="text-danger">{{ $errors->first('slug') }}</div>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select id="status" class="form-control" name="status" required>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Active</option>
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_title">Meta Title <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="meta_tilte" value="{{ old('meta_title') }}" name="meta_title" placeholder="Enter Meta Title" required>
                                    </div>

                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea class="form-control" placeholder="Enter Meta Description" name="meta_description">
                                            {{ old('meta_description') }} 
                                        </textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="meta_keyword">Meta Keyword</label>
                                        <input type="text" class="form-control" id="meta_keyword" value="{{ old('meta_keyword') }}" name="meta_keyword" placeholder="Enter Meta Keyword">
                                    </div> --}}
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