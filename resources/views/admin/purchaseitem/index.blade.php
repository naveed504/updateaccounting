@extends('admin.master')
@section('bodyheader')
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Main Dealers</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Purchase Item</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{route('purchaseitem.create')}}" class="btn btn-sm btn-neutral">Add Quotation</a>
              <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('bodycontent')

<div class="container-fluid mt--6">
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Dealers Info</h3>
                        @if(Session::has('alert-success'))
                        <div class="alert alert-success alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success!</strong> {{Session::get('alert-success')}}
                        </div>
                        @endif
                        @if(Session::has('alert-danger'))
                        <div class="alert alert-danger alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success!</strong> {{Session::get('alert-danger')}}
                        </div>
                        @endif
            </div>
            <!-- Light table -->
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col" class="sort" data-sort="name">Date</th>
                    <th scope="col" class="sort" data-sort="status">Company</th>
                    <th scope="col">Bill Photo</th>
                    <th scope="col" class="sort" data-sort="completion">Total</th>
                    <th scope="col" class="sort" data-sort="completion">Pay</th>
                    <th scope="col" class="sort" data-sort="completion">Remaining</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                @foreach($purchaseitems as $items)
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                       <span>{{ date('M d-y',strtotime($items->created_at))}}</span>
                        
                      </div>
                    </th>
                    <td>
                      <span class="badge badge-dot mr-4">
                      {{ $items->dealers->dealer_name  }}
                      </span>
                    </td>
                   
                    <td>
                      <div class="avatar-group">
                        <a href="{{asset('admin/purchaseitems/'.$items->item_photo)}}" class="avatar avatar-sm rounded-circle " data-toggle="tooltip" data-original-title="" >
                          <img alt="Profile" class="img img-responsive" src="{{asset('admin/purchaseitems/'.$items->item_photo)}}" style="height:50px;width:50px;">
                        </a>
                       
                       
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">{{ seprateCommaValue($items->total) }}</span>
                       
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">{{ seprateCommaValue($items->pay)}}</span>
                       
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">{{ seprateCommaValue($items->remaining )}}</span>
                       
                      </div>
                    </td>
                    <td class="text-left">
                      <div class="dropdown" >
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" >
                        <a class="dropdown-item" href="{{route('purchaseitem.edit' , $items->id)}}">Edit</a>
                          <form action="{{route('purchaseitem.destroy', $items->id)}}" method="post">
                          @csrf
                          {{ method_field('DELETE') }}
                          <button class="dropdown-item">Delete</button>
                          </form>
                          <a class="dropdown-item" href="{{route('purchasedetail',['id'=> $items->id ,'dealer_id'=> $items->dealers->id ])}}">View Company Detail</a>

                        </div>
                      </div>
                    </td>
                  </tr>
              @endforeach
                </tbody>
              </table>
            </div>
            <!-- Card footer -->
            <div class="card-footer py-4">
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <!-- Dark table -->
     
      <!-- Footer -->
     
    </div>

@endsection