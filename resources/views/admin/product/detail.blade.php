@extends('admin.master')

@section('title','Products-Details')

@section('body')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category Manage Table</h4>
                    <hr/>
                    <div class="table-responsive m-t-40">
                        <table class="table table-striped border">
                            
                            <tr>
                                <th>Product Id</th>
                                <td>{{$product->id}}</td>
                            </tr>
                            <tr>
                                <th>Product Name</th>
                                <td>{{$product->name}}</td>
                            </tr>
                            <tr>
                                <th>Product Code</th>
                                <td>{{$product->code}}</td>
                            </tr>
                            <tr>
                                <th>Product Model</th>
                                <td>{{$product->model}}</td>
                            </tr>
                            <tr>
                                <th>Product Category</th>
                                <td>{{$product->category->name}}</td>
                            </tr>

                            <tr>
                                <th>Product SUb Category</th>
                                <td>{{$product->subCategory->name}}</td>
                            </tr>

                            <tr>
                                <th>Product Brand</th>
                                <td>{{$product->brand->name}}</td>
                            </tr>

                            <tr>
                                <th>Product Unit</th>
                                <td>{{$product->unit->name}}</td>
                            </tr>

                            <tr>
                                <th>Product Stock Amount</th>
                                <td>{{$product->stock_amount}}</td>
                            </tr>

                            <tr>
                                <th>Product Regular Price</th>
                                <td>{{$product->regular_price}}</td>
                            </tr>

                            <tr>
                                <th>Product Selling Price</th>
                                <td>{{$product->selling_price}}</td>
                            </tr>

                            <tr>
                                <th>Product Feature Image</th>
                                <td><img src="{{asset($product->image)}}" alt="{{$product->name}}" height="50px" width="80px"></td>
                            </tr>

                            <tr>
                                <th>Product Other Image</th>
                                <td>
                                    @foreach ($product->otherImages as $otherImage)
                                    <img src="{{asset($otherImage->image)}}" alt="{{$otherImage->name}}" height="50px" width="80px">
                                    @endforeach
                                </td>
                            </tr>

                            <tr>
                                <th>Product Hit Count</th>
                                <td>{{$product->hit_count}}</td>
                            </tr>

                            <tr>
                                <th>Product Sales Count</th>
                                <td>{{$product->sales_count}}</td>
                            </tr>

                            <tr>
                                <th>Product Feature Status</th>
                                <td>{{$product->featured_status == 1 ? 'Featured' : 'Not Featured'}}</td>
                            </tr>

                            <tr>
                                <th>Publication Status</th>
                                <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

