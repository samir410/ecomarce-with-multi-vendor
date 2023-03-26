@extends('admin.admin_dashboard')
@section('title')
Add brand
@endsection
@section('content')


    <div class="page-content">
        
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tables</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">DataTable Example</h6>
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table mb-0 table-dark table-striped table-hover table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Brand name</th>
                                <th>Brand Image</th>
                                <th>Action</th>
                           
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($brand as $key => $item)	
                            <tr class="align-bottom">
                                <td>{{ $key }}</td>
                                <td>{{ $item->brand_name }}</td>
                                <td> <img src="{{ asset($item->brand_image) }}" style="width: 70px; height:40px;" >  </td>
                                <td>
                                    <a href="{{ route('edit.brand',$item->id) }}" class="btn btn-outline-primary glyphicon glyphicon-pencil">Edit</a>
                                    <a href="{{ route('delete.brand',$item->id) }}" class="btn btn-outline-danger" id="delete">Delete</a>
                                </td>
                               
                            </tr>
                        @endforeach
                    
                
                        </tbody>
                        <tfoot>
                            <tr>
                           
                                    <th>SL</th>
                                    <th>Brand name</th>
                                    <th>Brand Image</th>
                                    <th>Action</th>
                               
                         
                            </tr>
                            
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
 
    </div>

@endsection