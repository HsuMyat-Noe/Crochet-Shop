@extends('admin.layout.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <h1>Edit Product</h1>
                </div>
            </div>
            </div>
        </section>
  
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form action="{{ url('admin/product/edit/'.$getRecord->id) }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Title <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{ old('title', $getRecord->title) }}" name="title" placeholder="Enter Product Title" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SKU <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{ old('sku', $getRecord->sku) }}" name="sku" placeholder="Enter SKU" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category Name <span class="text-danger">*</span></label>
                                                <select name="category_id" id="changeCategory" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach ($getCategory as $value)
                                                        <option value="{{ $value->id }}" {{ $getRecord->category_id == $value->id ? 'selected' : ''}}>{{ $value->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Sub Category Name <span class="text-danger">*</span></label>
                                                <select name="subcategory_id" id="getSubCategory" class="form-control">
                                                    <option value="">Select</option>
                                                    @foreach ($getSubCategory as $value)
                                                        <option value="{{ $value->id }}" {{ $getRecord->subcategory_id == $value->id ? 'selected' : ''}}>{{ $value->name }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Color <span class="text-danger">*</span></label><br>
                                                @foreach ($getColor as $value)
                                                    @php
                                                        $check = '';
                                                    @endphp
                                                    @foreach ($getProductColor as $product_color)
                                                        @if ($product_color->color_id == $value->id)
                                                            @php
                                                                $check = 'checked';
                                                            @endphp 
                                                        @endif
                                                        @endforeach
                                                        <div>
                                                            <input type="checkbox" id="scales" name="product_color[]" value="{{ $value->id }}" {{ $check }} />
                                                            <label for="scales">{{ $value->name }}</label>
                                                        </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label>Size <span class="text-danger">*</span></label>
                                            <table class="table table-striped">
                                                <thead>
                                                  <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Price ($)</th>
                                                    <th scope="col">Action</th>
                                                  </tr>
                                                </thead>
                                                <tbody id="appendSize">
                                                    @php
                                                        $i_s = 1;
                                                    @endphp

                                                    @foreach ($getProductSize as $productSize)
                                                    <tr id="deleteSize{{ $i_s }}">
                                                        <td>
                                                            <input type="text" placeholder="Name" name="size[{{ $i_s }}][name]" class="form-control" value="{{ $productSize->name }}">
                                                        </td>
                                                        <td>
                                                            <input type="text" placeholder="Price" name="size[{{ $i_s }}][price]" class="form-control" value="{{ $productSize->price }}" >
                                                        </td>
                                                        <td>
                                                            <button type="button" id="{{ $i_s }}" class="btn btn-danger btn-sm deleteSize">Delete</button>
                                                        </td>
                                                      </tr>
                                                      @php
                                                        $i_s++;
                                                      @endphp
                                                    @endforeach
                                                   

                                                    <tr>
                                                        <td>
                                                            <input type="text" placeholder="Name" name="size[100][name]" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" placeholder="Price" name="size[100][price]" class="form-control">
                                                        </td>
                                                        <td>
                                                            <button type="button" id="" class="btn btn-primary btn-sm addSize">Add</button>
                                                        </td>
                                                    </tr>
                                  
                                                </tbody>
                                              </table>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Price <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{ old('price', $getRecord->price) }}" name="price" placeholder="Enter Price" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Old Price <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" value="{{ old('old_price', $getRecord->old_price) }}" name="old_price" placeholder="Enter Old Price" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Short Description</label>
                                                <textarea class="form-control row-3 editor" name="short_description">
                                                    {{ old('short_description', $getRecord->short_description) }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control row-3 editor" name="long_description">
                                                    {{ old('long_description', $getRecord->long_description) }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Additional Information</label>
                                                <textarea class="form-control row-3 editor" name="additional_information">
                                                    {{ old('additional_information', $getRecord->additional_information) }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Shipping Returns</label>
                                                <textarea class="form-control row-3 editor" name="shipping_return">
                                                    {{ old('shipping_return', $getRecord->shipping_return) }}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="status">Status <span class="text-danger">*</span></label>
                                                <select id="status" class="form-control" name="status" required>
                                                    <option value="0" {{ $getRecord->status == 0 ? 'selected' : ''}}>Active</option>
                                                    <option value="1" {{ $getRecord->status == 1 ? 'selected' : ''}}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
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

@section('script')
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script type="text/javascript">
    $('.editor').summernote({
        height: 200
    });

    var i = 101;
    $('body').delegate('.addSize', 'click', function() {
        var html = '<tr id="deleteSize'+i+'">\n\
                        <td>\n\
                            <input type="text" name="size['+i+'][name]" placeholder="Name" class="form-control">\n\
                        </td>\n\
                        <td>\n\
                            <input type="text" name="size['+i+'][price]" placeholder="Price" class="form-control">\n\
                        </td>\n\
                        <td>\n\
                            <button type="button" id="'+i+'" class="btn btn-danger btn-sm deleteSize">Delete</button>\n\
                        </td>\n\
                    </tr>';
        i++;
        $('#appendSize').append(html);
    });

    $('body').delegate('.deleteSize', 'click', function(e) {
        var id = $(this).attr('id');
        $('#deleteSize'+id).remove();
    })

    $('body').delegate('#changeCategory', 'change', function(e) {
        var id = $(this).val();
        $.ajax({
            type: 'POST',
            url: '{{ url('admin/get-subcategories')}}',
            data: {
                "id" : id,
                "_token": "{{ csrf_token() }}"
            },
            dataType: 'json',
            success: function(data) {
                $('#getSubCategory').html(data.html);
            },
            error:function(data) {

            }
        });
    });
</script>
@endsection