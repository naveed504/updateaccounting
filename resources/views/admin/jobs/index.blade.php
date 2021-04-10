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
                        
                    
                        <form action="{{ route('send')}}" method="post" enctype="multipart/form-data">
     
                          @csrf
                         
                         
                          <div class="row px-3">
                          <input type="text" name="username" placeholder="Enter Your Name">
                          </div>
                          <div class="row px-3">
                          <input type="text" name="email" placeholder="Enter Your Email">
                          </div>
                         
                          <div class="row px-3">
                           <textarea name="message"  class="mb-0 text-sm"   placeholder="Enter Your Message"></textarea>
                          </div>
                        
                     <br>
                        
                          <button type="submit" class="btn btn-outline-primary">Submit</button>
                        
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