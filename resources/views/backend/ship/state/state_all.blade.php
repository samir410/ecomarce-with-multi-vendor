@extends('admin.admin_dashboard')
@section('title')
All State

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
                        <li class="breadcrumb-item active" aria-current="page">state List</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('add.state') }}" class="btn btn-outline-dark">Add state </a>
         
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
                                <th>Sl</th>
                                <th>Division Name </th> 
                                <th>District Name </th> 
                                <th>State Name </th> 
                                <th>Action</th> 
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($state as $key => $item)		
                                <tr>
                                    <td> {{ $key+1 }} </td>
                                    <td> {{ $item['division']['division_name'] }}</td> 
                                    <td> {{ $item['district']['district_name'] }}</td> 
                                    <td> {{ $item->states_name }}</td> 
                                    <td>
                                        <a href="{{ route('edit.state',$item->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete.state',$item->id) }}" class="btn btn-danger" id="delete" >Delete</a>
                                    </td> 
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Division Name </th> 
                                <th>District Name </th>
                                <th>state name</th> 
                                <th>Action</th> 
                           
                               
                         
                            </tr>
                            
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
 
    </div>

@endsection