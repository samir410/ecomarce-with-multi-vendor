@extends('admin.admin_dashboard')
@section('title')
Add category
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
                <a href="{{ route('add.subcategory') }}" class="btn btn-outline-dark">Add Sub-Category </a>
         
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
                                <th>Category id</th>
                                <th>Category name</th>
                                <th>SubCategory name</th>
                                <th>Action</th>
                           
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($subcategory as $key => $item)	
                        <tr>
                            <td> {{ $key+1 }} </td>
                            <td> {{ $item->category_id }}</td>
                            <td> {{ $item['category']['category_name'] }}</td>
                            <td> {{ $item->subcategory_name }}  </td>
            
                            <td>
                               <a href="{{ route('edit.subcategory',$item->id) }}" class="btn btn-info">Edit</a>
                               <a href="{{ route('delete.subcategory',$item->id) }}" class="btn btn-danger" id="delete" >Delete</a>
                            </td> 
                        </tr>
                        @endforeach
                    
                
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SL</th>
                                <th>Category id</th>
                                <th>Category name</th>
                                <th>SubCategory name</th>
                                <th>Action</th> 
                         
                            </tr>
                            
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
 
    </div>

@endsection