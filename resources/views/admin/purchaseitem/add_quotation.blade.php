@extends('admin.master')
@section('bodyheader')
<style>
.inputerror{
  margin-top: -5px;
  
}
</style>
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
              <h3 class="mb-0">Add New Dealer</h3>
            </div>
            <!-- Light table -->
        
            <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                        <div class="card2 card border-0 px-4 py-5">
                        
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
                        <form action="@if(isset($singlepurchaseitem)) {{ route('purchaseitem.update', $singlepurchaseitem->id ) }} @else {{ route('purchaseitem.store') }} @endif" method="post" enctype="multipart/form-data">

                          @csrf
                          @if(isset($singlepurchaseitem->id))
                          {{ method_field('PATCH')}}
                          @endif

                         
                         
                         
                        
                       
                          <div class="row">
                            <div class="col-lg-6">
                          <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Select Shop / Dealer</h6></label>
                            <select name="maindealer_id" class="form-control">
                              <option>Please Select Shop / Company</option>
                              @foreach($dealers as $dealer)
                              <option value="{{$dealer->id}}" @if(isset( $singlepurchaseitem->id)) {{ $singlepurchaseitem->id == $dealer->id ? 'selected' : ''}} @endif>{{$dealer->dealer_name}}</option>
                              @endforeach
                              @if($errors->has('dealer_name'))<p class="error text-danger inputerror">{{ $errors->first('dealer_name') }}</p>@endif

                            </select>

                          </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Bill Photo</h6></label>
                            <input class="mb-4" type="file" name="item_photo" 
                            >
                            @if($errors->has('item_photo'))<p class="error text-danger inputerror">{{ $errors->first('item_photo') }}</p>@endif

                          </div>
                        </div>
                      </div>
                        <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Item Description</h6></label>
                           <textarea name="description">@if(isset($singlepurchaseitem->description)){{$singlepurchaseitem->description}} @endif</textarea>
                          </div>

                       <div class="row">
                            <div class="col-lg-4">
                          <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Total Amount</h6></label>
                            <input class="mb-4" type="text" name="total" id="tt" 
                            value="@if(isset($singlepurchaseitem->total)){{$singlepurchaseitem->total}} @endif"
                            >
                            
                            @if($errors->has('total'))<p class="error text-danger inputerror">{{ $errors->first('total') }}</p>@endif

                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Pay Amount</h6></label>
                            <input class="mb-4" type="text" name="pay" id="pay"
                            value="@if(isset($singlepurchaseitem->pay)){{$singlepurchaseitem->pay}} @endif">
                            @if($errors->has('pay'))<p class="error text-danger inputerror">{{ $errors->first('pay') }}</p>@endif

                          </div>
                        </div>
                         <div class="col-lg-4">
                          <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Remaining</h6></label>
                            <input class="mb-4" type="text" name="remaining" id="remaining" readonly
                            value="@if(isset($singlepurchaseitem->remaining)){{$singlepurchaseitem->remaining}} @endif">
                          </div>
                        </div>
                      </div>
                          @if(isset($singlepurchaseitem))
                          <button type="submit" class="btn btn-outline-primary">Update</button>
                          @else
                          <button type="submit" class="btn btn-outline-primary">Submit</button>
                          @endif
                        </form>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script>
 $(document).ready(function(){
 $('#tt').change(function(){
 var total= $(this).val();
 myCalculation();
 });

 $('#pay').change(function(){
   var pay= $(this).val();
   myCalculation();
  //  var totalam= $('#tt').val();
  //  var result = totalam - pay ;
  //  console.log(result);

 });
 function myCalculation()
 {
   var totalam= $('#tt').val();
   var payam=$('#pay').val();
   var result= totalam - payam;
   $('#remaining').val(result);

 }
 
 })
 
</script>