@extends('admin.admin_dashboard')
@section('title')
All division
@endsection
@section('content')


    <div class="page-content">
        
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tables</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href=""><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Division List</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('add.division') }}" class="btn btn-outline-dark">Add Divition </a>
         
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
                                <th>Division name</th>
                                <th>Action</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($divisions as $key => $item)	
                            <tr class="align-bottom">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->division_name }}</td>
                                <td>
                                    <a href="{{ route('edit.division',$item->id) }}" class="btn btn-outline-primary glyphicon glyphicon-pencil">Edit</a>
                                    <a href="{{ route('delete.division',$item->id) }}" class="btn btn-danger" id="delete" >Delete</a>
                                </td>
                  
                            </tr>
                        @endforeach
                    
                
                        </tbody>
                        <tfoot>
                            <tr>
                           
                                <th>SL</th>
                                <th>Division name</th>
                                <th>Action</th>
                           
                               
                         
                            </tr>
                            
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
 
    </div>

@endsection