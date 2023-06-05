@extends('admin.master')

@section('title','Manage-Unit')

@section('body')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Category Manage Table</h4>
                    <hr/>
                    <@if (session('message'))
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
                                    <th>Category Code</th>
                                    <th>Category Description</th>
                                    <th>Publication Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $units as $unit )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$unit->name}}</td>
                                    <td>{{$unit->code}}</td>
                                    <td>{{$unit->description}}</td>
                                    <td>{{$unit->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('unit.edit', $unit->id)}}" class="btn btn-success btn-sm">
                                            <i class="ti ti-palette"></i>
                                        </a>
                                        <a href="{{route('unit.delete', $unit->id)}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
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

