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
                  <li class="breadcrumb-item active" aria-current="page">Main Dealers</li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="{{route('maindealer.create')}}" class="btn btn-sm btn-neutral">Add New Dealer</a>
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
                    <th scope="col" class="sort" data-sort="name">#No</th>
                    <th scope="col" class="sort" data-sort="status">Company</th>
                    <th scope="col">Photo</th>
                    <th scope="col" class="sort" data-sort="completion">Location</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody class="list">
                @foreach($resultDealer as $dealer)
              @php 
              $dealer_id= $dealer->id
              @endphp
                  <tr>
                    <th scope="row">
                      <div class="media align-items-center">
                       <span>{{$loop->iteration}}</span>
                        
                      </div>
                    </th>
                    <td>
                      <span class="badge badge-dot mr-4">
                        <span class="status">{{$dealer->dealer_name}}</span>
                      </span>
                    </td>
                    <td>
                      <div class="avatar-group">
                        <a href="{{asset('admin/dealers/'.$dealer->dealer_profile)}}" class="avatar avatar-sm rounded-circle " data-toggle="tooltip" data-original-title="{{$dealer->dealer_name}}" >
                          <img alt="Profile" class="img img-responsive" src="{{asset('admin/dealers/'.$dealer->dealer_profile)}}" style="height:50px;width:50px;">
                        </a>
                       
                       
                      </div>
                    </td>
                    <td>
                      <div class="d-flex align-items-center">
                        <span class="completion mr-2">{{$dealer->dealer_location}}</span>
                       
                      </div>
                    </td>
                    <td class="text-left">
                      <div class="dropdown" >
                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" id="remaining_deopdown" >
                          <a class="dropdown-item" href="{{route('maindealer.edit' , $dealer->id)}}">Edit</a>
                          <form action="{{route('maindealer.destroy', $dealer->id)}}" method="post">
                          @csrf
                          {{ method_field('DELETE') }}
                          <button class="dropdown-item">Delete</button>
                          </form>
                           <a class="dropdown-item get_remaining" id="{{ $dealer->id }}" data-maindealer="{{ $dealer_id  }}" href="javascript:void(0)" value="{{ $dealer->id }}" >Pay Payment</a>
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
     
    </div>
<!-----------------------------------------------------!--->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="savebill" method="post" id="myForm">
   @csrf
      <div class="row">
      <input type="hidden" name="maindealer_id" id="maindealer_id">
                            <div class="col-lg-4">
                          <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Total Remaining Amount</h6></label>
                            <input class="mb-4" type="text" name="prevremaining" id="prevremaining" readonly 
                             
                            >
                            
                            

                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Pay Amount</h6></label>
                            <input class="mb-4" type="text" name="pay" id="pay"
                           >
                            @if($errors->has('pay'))<p class="error text-danger inputerror">{{ $errors->first('pay') }}</p>@endif

                          </div>
                        </div>
                         <div class="col-lg-4">
                          <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Remaining</h6></label>
                            <input class="mb-4" type="text" name="remaining" id="remaining" readonly
                           >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-12">
                      <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Description</h6></label>
                           
                           <textarea name="detail" id="detail" class="mb-0 text-sm" ></textarea>
                           
                          </div>
                      </div>
                      </div>
                      <br>
                      <button type="submit" class="btn btn-primary">Save Quotation</button>
                    </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script><script>
$(document).ready(function(){

$('.get_remaining').click(function(){
  var id= $(this).attr('id');
  var dealer_id= $(this).attr('data-maindealer');
 
  $.ajax({
    type: 'get',
    data: {id:id, dealer_id:dealer_id},
    datatype: 'application/json',
    url : "{{URL('dealer_account')}}",
    success:function(data){
      // console.log(data.maindealer[0]['maindealer_id']);
      // console.log(data.remaining_sum);
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Manage Dealer Account');
      $('input[name=prevremaining]').val(data.remaining_sum);
      $('input[name=maindealer_id]').val(data.maindealer[0]['maindealer_id']);
    }
  });
  $('#pay').change(function(){
 var payamount= $(this).val();
 myCalculation();
 });
function myCalculation()
 {
   var totalpm= $('#pay').val();

   var preremaining_amount=$('#prevremaining').val();
 
   var result=  preremaining_amount - totalpm;
   $('#remaining').val(result);

 }
});



 
})
</script>