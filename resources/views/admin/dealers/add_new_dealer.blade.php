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
              <a href="" class="btn btn-sm btn-neutral">Add New Dealer</a>
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
                        <form action="@if(isset($singledealer)) {{ route('maindealer.update', $singledealer->id)}} @else {{ route('maindealer.store')}} @endif" method="post" enctype="multipart/form-data">
     
                          @csrf
                          @if(isset($singledealer->id))
                          {{ method_field('PATCH')}}
                          @endif

                         
                         
                         
                          <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Company / Shop Name</h6></label>
                            <input type="text" name="dealer_name" placeholder="Enter company or shop name" 
                            value="@if(isset($singledealer->dealer_name)){{$singledealer->dealer_name}}  @endif">
                            @if($errors->has('dealer_name'))<p class="error text-danger inputerror">{{ $errors->first('dealer_name') }}</p>@endif
                          </div>
                          <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Location</h6></label>
                            <input type="text" name="dealer_location" placeholder="Enter location or address"
                            value="@if(isset($singledealer->dealer_location)){{$singledealer->dealer_location}} @endif">
                            
                            @if($errors->has('dealer_location'))<p class="error text-danger inputerror">{{ $errors->first('dealer_location') }}</p>@endif
                          </div>
                          <div class="row px-3">
                            <label class="mb-1"><h6 class="mb-0 text-sm">Profile</h6></label>
                            <input class="mb-4" type="file" name="dealer_profile" 
                            value="@if(isset($singledealer->dealer_profile)){{$singledealer->dealer_profile}} @endif">
                          </div>
                          @if(isset($singledealer))
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