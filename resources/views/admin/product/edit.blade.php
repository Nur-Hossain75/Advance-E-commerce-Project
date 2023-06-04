@extends('admin.master')

@section('title','Edit-Product')

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Product Form</h4>
                <hr/>
                <h4 class="text-center text-success">{{session('message')}}</h4>
                    <form class="form-horizontal p-t-20" method="POST" action="{{route('product.update',['id' => $product->id])}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Category Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id" id="categoryId">
                                    <option value="" disabled selected>-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">SUb Category Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="sub_category_id" id="subCategoryId">
                                    <option value="" disabled selected>-- Select Sub Category --</option>
                                    @foreach ($subcategories as $subCategory)
                                        <option value="{{$subCategory->id}}" {{$subCategory->id == $product->sub_category_id ? 'selected' : ''}}>{{$subCategory->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Brand Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="brand_id" id="">
                                    <option value="" disabled selected>-- Select Brand --</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{$brand->id}}" {{$brand->id == $product->brand_id ? 'selected' : ''}}>{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 control-label">Unit Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <select class="form-control" name="unit_id" id="">
                                    <option value="" disabled selected>-- Select Unit --</option>
                                    @foreach ($units as $unit)
                                        <option value="{{$unit->id}}" {{$unit->id == $product->unit_id ? 'selected' : ''}}>{{$unit->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">Product Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$product->name}}" name="name" id="exampleInputuname3" placeholder="Product Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname4" class="col-sm-3 control-label">Product Code <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$product->code}}" name="code" id="exampleInputuname4" placeholder="Product Code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname5" class="col-sm-3 control-label">Product Model</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$product->model}}" name="model" id="exampleInputuname5" placeholder="Product Model">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname6" class="col-sm-3 control-label">Product Stock Amount <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$product->stock_amount}}" name="stock_amount" id="exampleInputuname6" placeholder="Product Stock Amount">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputuname7" class="col-sm-3 control-label">Product Price<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number" class="form-control" value="{{$product->regular_price}}" name="regular_price" id="exampleInputuname7" placeholder="Regular Price">
                                    <input type="number" class="form-control" value="{{$product->selling_price}}" name="selling_price" id="exampleInputuname8" placeholder="Selling Price">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail9" class="col-sm-3 control-label">Product Short Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control" name="short_description" id="exampleInputEmail9" placeholder="Product Short Description">{{$product->short_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail10" class="col-sm-3 control-label">Product Long Description <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <textarea type="text" class="form-control summernote"  name="long_description" id="exampleInputEmail10" placeholder="Product Long Description">{{$product->long_description}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Feature Image<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" name="image" id="input-file-now" class="dropify"  accept="image/*">
                                <img src="{{asset($product->image)}}" alt="{{$product->name}}" height="50px" width="80px"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">Other Image<span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="file" name="other_image[]" multiple id="input-file-now" class="dropify" accept="image/*">
                                @foreach ($product->otherImages as $otherImage)
                                <img src="{{asset($otherImage->image)}}" alt="{{$otherImage->name}}" height="50px" width="80px"/>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" {{$product->status == 1 ? 'checked' : ''}} name="status" value="1" checked> Published</label>
                                <label><input type="radio" {{$product->status == 2 ? 'checked' : ''}} name="status" value="2"> Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create New Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection