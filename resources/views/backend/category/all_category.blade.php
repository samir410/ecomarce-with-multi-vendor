@extends('admin.admin_dashboard')
@section('title')
All category
@endsection
@section('content')


    <div class="page-content">
        
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tables</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Category List</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('add.category') }}" class="btn btn-outline-dark">Add Category </a>
         
            </div>
        </div>
        <!--end breadcrumb-->
 
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table mb-0 table-dark table-striped table-hover table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Category name</th>
                                <th>Category Image</th>
                                <th>Action</th>
                           
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $key => $item)	
                            <tr class="align-bottom">
                                <td>{{ $key }}</td>
                                <td>{{ $item->category_name }}</td>
                                <td> <img src="{{ asset($item->category_image) }}" style="width: 70px; height:40px;" >  </td>
                                <td>
                                    <a href="{{ route('edit.category',$item->id) }}" class="btn btn-outline-primary glyphicon glyphicon-pencil">Edit</a>
                                    <a href="{{ route('delete.category',$item->id) }}" class="btn btn-outline-danger" id="delete">Delete</a>
                                </td>
                               
                            </tr>
                        @endforeach
                    
                
                        </tbody>
                        <tfoot>
                            <tr>
                           
                                <th>SL</th>
                                <th>Category name</th>
                                <th>Category Image</th>
                                <th>Action</th>
                               
                         
                            </tr>
                            
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
 
    </div>

@endsection