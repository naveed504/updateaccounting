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
                       
            </div>
            <!-- Light table -->
            <div class="row" style="text-align: center;margin-top: 40px;">
            <div class="col-md-2 col-md-offset-3 text-right">
                <strong>Select Language: </strong>
            </div>
            <div class="col-md-4">
                <select class="form-control Langchange">
                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="urdu" {{ session()->get('locale') == 'urdu' ? 'selected' : '' }}>Urdu</option>                    
                </select>
            </div>
            <h1 style="margin-top: 80px;">{{ __('message.welcome') }}</h1>
        </div>            
            <!-- Card footer -->
            
          </div>
        </div>
      </div>
      <!-- Dark table -->
     
    </div>
<!-----------------------------------------------------!--->

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script><script>

$(document).ready(function(){

    var url = "{{ route('LangChange') }}";
    $(".Langchange").change(function(){
        window.location.href = url + "?lang="+ $(this).val();
    });  
 
})
</script>