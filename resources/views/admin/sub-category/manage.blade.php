@extends('admin.master')

@section('title','Manage-Sub-Category')

@section('body')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">SUb Category Manage Table</h4>
                    <hr/>
                    @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> {{session('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped border">
                            <thead>
                                <tr>
                                    <th>SL NO</th>
                                    <th>Category Name</th>
                                    <th>Sub Category Name</th>
                                    <th>Category Description</th>
                                    <th>Category Image</th>
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $subCategories as $subCategory )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$subCategory->category->name}}</td>
                                    <td>{{$subCategory->name}}</td>
                                    <td>{{$subCategory->description}}</td>
                                    <td><img src="{{asset($subCategory->image)}}" alt="{{$subCategory->name}}" height="50px" width="80px"></td>
                                    <td>{{$subCategory->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('subCategory.edit', $subCategory->id)}}" class="btn btn-success btn-sm">
                                            <i class="ti ti-palette"></i>
                                        </a>
                                        <a href="{{route('subCategory.delete', $subCategory->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
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

