@extends('admin.admin_dashboard')
@section('title')
All Cupon
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
                        <li class="breadcrumb-item active" aria-current="page">Cupon List</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <a href="{{ route('add.cupon') }}" class="btn btn-outline-dark">Add Cupon </a>
         
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
                                <th>Coupon Name </th>
                                <th>Coupon Discount  </th>
                                <th>Coupon Validity  </th>
                                <th>Coupon Status  </th>
                                <th>Action</th> 
                           
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cupon as $key => $item)		
                            <tr>
                                <td> {{ $key }} </td>
                                <td> {{ $item->cupon_name }}</td>
                                <td> {{  $item->cupon_discount  }}  </td>
                                <td> {{ Carbon\Carbon::parse($item->cupon_validity)->format('D, d F Y') }}  </td>
                
                
                                <td> 
                                    @if($item->cupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                    <span class="badge rounded-pill bg-success">Valid</span>
                                    @else
                                    <span class="badge rounded-pill bg-danger">Invalid</span>
                                    @endif
                                    
                                </td>
                
                                <td>
                                <a href="{{ route('edit.cupon',$item->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('delete.cupon',$item->id) }}" class="btn btn-danger" id="delete" >Delete</a>
                                
                                </td> 
                            </tr>
                            @endforeach
                        <tfoot>
                            <tr>
                           
                                <th>Sl</th>
                                <th>Coupon Name </th>
                                <th>Coupon Discount  </th>
                                <th>Coupon Validity  </th>
                                <th>Coupon Status  </th>
                                <th>Action</th> 
                               
                         
                            </tr>
                            
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
 
    </div>

@endsection