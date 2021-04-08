@extends('admin.master')
<style>
<style>
header
{
	font-family: 'Lobster', cursive;
	text-align: center;
	font-size: 25px;	
}

#info
{
	font-size: 18px;
	color: #555;
	text-align: center;
	margin-bottom: 25px;
}

a{
	color: #074E8C;
}

.scrollbar
{
	margin-left:3px;
	float: left;
	height: 137px;
	width: 235;
	background: #F5F5F5;
	overflow-y: scroll;
	margin-bottom: 2px;
}

.force-overflow
{
	min-height: 450px;
}

#wrapper
{
	text-align: center;
	width: 500px;
	margin: auto;
}

#style-7::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
	border-radius: 10px;
}

#style-7::-webkit-scrollbar
{
	width: 10px;
	background-color: #F5F5F5;
}

#style-7::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	background-image: -webkit-gradient(linear,
									   left bottom,
									   left top,
									   color-stop(0.44, rgb(122,153,217)),
									   color-stop(0.72, rgb(73,125,189)),
									   color-stop(0.86, rgb(28,58,148)));
}


</style>
</style>
@section('bodyheader')
<div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            
          
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Business With {{  $items->dealers->dealer_name }}</h5>
                      <span class="h2 font-weight-bold mb-0">{{ seprateCommaValue($cal['total_amount']) }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Net Pay Amount</h5>
                      <span class="h2 font-weight-bold mb-0">{{ seprateCommaValue($cal['pay_amount']) }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Remaining Amount</h5>
                      <span class="h2 font-weight-bold mb-0">{{ seprateCommaValue($cal['remaining_amount']) }}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div id="wrapper">
    <div class="scrollbar" id="style-7">
      <div class="force-overflow">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Pay Amount</h5>
                      <span class="h6 font-weight-bold mb-0">
                      
                      @foreach($pay_amount_list as $paylist)
                      {{ date('M d-y',strtotime($paylist->created_at))}} &nbsp; <b>{{ seprateCommaValue($paylist->pay) }}</b>
                      <br>
                       @endforeach
                      
                      </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                   
                  </p>
                </div>
</div>
    </div>
</div>




              </div>
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
          <div class="card bg-default shadow">
            <div class="card-header bg-transparent border-0">
              <h3 class="text-white mb-0">Purchase From <strong>{{  $items->dealers->dealer_name }} </strong</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-dark table-flush">
                <thead class="thead-dark">
                
                </thead>
                <tbody class="list">
              
             <tr>
                <td width="100%">
                <p>Date : <b>{{ date('M d-y',strtotime($items->created_at))}}</b></p>
                <p>Created By : <b>{{ auth()->user()->name }}</b></p>
                <p>Shop / MainDealer : <b>{{ $items->dealers->dealer_name  }}</b></p>
                <p>Total Bill : <b>{{ seprateCommaValue($items->total) }}</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Pay : <b>{{ seprateCommaValue($items->pay)}}</b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   Remaining : <b>{{ seprateCommaValue($items->remaining )}}</b> </p>
                <p>Description : <b>{{ ($items->description) }}</b></p>
                </td>
</tr>
               
                
                
       
            </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="card">
            <!-- Card header -->
            <div class="card-header border-0">
              <h3 class="mb-0">Purchasing List From <strong>{{ $items->dealers->dealer_name}}</strong> </h3>
                        @if(Session::has('alert-success'))
                        <div class="alert alert-success alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Success!</strong> {{Session::get('alert-success')}}
                        </div>
                        @endif
                        @if(Session::has('alert-danger'))
                        <div class="alert alert-danger alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong>Warning!</strong> {{Session::get('alert-danger')}}
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
                        <a href="{{asset('storage/purchaseitems/'.$items->item_photo)}}" class="avatar avatar-sm rounded-circle " data-toggle="tooltip" data-original-title="" >
                          <img alt="Profile" class="img img-responsive" src="{{asset('storage/purchaseitems/'.$items->item_photo)}}" style="height:50px;width:50px;">
                        </a>
                       
                       
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">{{ seprateCommaValue($items->total)}}</span>
                       
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">{{ seprateCommaValue($items->pay) }}</span>
                       
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">{{ seprateCommaValue($items->remaining) }}</span>
                       
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
                          <a class="dropdown-item" href="{{route('purchasedetail', ['id'=> $items->id , 'dealer_id'=> $items->maindealer_id])}}">View Company Detail</a>

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