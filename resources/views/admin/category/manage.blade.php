@extends('admin.master')

@section('title','Manage-Category')

@section('body')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category Manage Table</h4>
                    <hr/>
                    <h4 class="text-center text-success">{{session('message')}}</h4>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Category Name</th>
                                    <th>Category Description</th>
                                    <th>Category Image</th>
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $categorise as $category )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td><img src="{{asset($category->image)}}" alt="{{$category->name}}" height="50px" width="80px"></td>
                                    <td>{{$category->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('category.edit', $category->id)}}" class="btn btn-success btn-sm">
                                            <i class="ti ti-palette"></i>
                                        </a>
                                        <a href="{{route('category.delete', $category->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                            <i class="ti ti-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

