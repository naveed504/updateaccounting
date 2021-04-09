@extends('admin.master')
<style>

.hovereffect {
    width: 100%;
    height: 100%;
    float: left;
    overflow: hidden;
    position: relative;
    text-align: center;
    cursor: default;
}
.hovereffect .overlay {
    width: 100%;
    position: absolute;
    overflow: hidden;
    left: 0;
	top: auto;
	bottom: 0;
	padding: 1em;
	height: 4.75em;
	background: #79FAC4;
	color: #3c4a50;
	-webkit-transition: -webkit-transform 0.35s;
	transition: transform 0.35s;
	-webkit-transform: translate3d(0,100%,0);
	transform: translate3d(0,100%,0);
	visibility: hidden;

}

.hovereffect img {
    display: block;
    position: relative;
	-webkit-transition: -webkit-transform 0.35s;
	transition: transform 0.35s;
}

.hovereffect:hover img {
-webkit-transform: translate3d(0,-10%,0);
	transform: translate3d(0,-10%,0);
}

.hovereffect h2 {
    text-transform: uppercase;
    color: #fff;
    text-align: center;
    position: relative;
    font-size: 17px;
    padding: 10px;
    background: rgba(0, 0, 0, 0.6);
	float: left;
	margin: 0px;
	display: inline-block;
}

.hovereffect a.info {
    display: inline-block;
    text-decoration: none;
    padding: 7px 14px;
    text-transform: uppercase;
	color: #fff;
	border: 1px solid #fff;
	margin: 50px 0 0 0;
	background-color: transparent;
}
.hovereffect a.info:hover {
    box-shadow: 0 0 5px #fff;
}


.hovereffect p.icon-links a {
	float: right;
	color: #3c4a50;
	font-size: 1.4em;
}

.hovereffect:hover p.icon-links a:hover,
.hovereffect:hover p.icon-links a:focus {
	color: #252d31;
}

.hovereffect h2,
.hovereffect p.icon-links a {
	-webkit-transition: -webkit-transform 0.35s;
	transition: transform 0.35s;
	-webkit-transform: translate3d(0,200%,0);
	transform: translate3d(0,200%,0);
	visibility: visible;
}

.hovereffect p.icon-links a span:before {
	display: inline-block;
	padding: 8px 10px;
	speak: none;
	-webkit-font-smoothing: antialiased;
	-moz-osx-font-smoothing: grayscale;
}


.hovereffect:hover .overlay,
.hovereffect:hover h2,
.hovereffect:hover p.icon-links a {
	-webkit-transform: translate3d(0,0,0);
	transform: translate3d(0,0,0);
}

.hovereffect:hover h2 {
	-webkit-transition-delay: 0.05s;
	transition-delay: 0.05s;
}

.hovereffect:hover p.icon-links a:nth-child(3) {
	-webkit-transition-delay: 0.1s;
	transition-delay: 0.1s;
}

.hovereffect:hover p.icon-links a:nth-child(2) {
	-webkit-transition-delay: 0.15s;
	transition-delay: 0.15s;
}

.hovereffect:hover p.icon-links a:first-child {
	-webkit-transition-delay: 0.2s;
	transition-delay: 0.2s;
}
.classclr{
  height:20px !important;
  width:20px !important;
  margin-top:-40px;
  margin-left:15px;
  color:red;
}

</style>
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
              
              <div class="row">
              @php
              $userid = Auth::user()->id;
              @endphp
              @foreach($images as $image)

              <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    <div class="hovereffect">
        <img class="img-responsive" src="{{asset('admin/fav/'.$image->image)}}"  style="width:100% ;height:150px"  alt="">
         
              
               <div class="addfavclass">
                    <a href="javascript:void(0)" >
                    <img class="image classclr" src="{{asset('admin/heart.png')}}" onclick="addtofav({{ $image->id }} , {{ $userid }} )"   >
                    </a>
                    </div>
               
    </div>
</div>
              @endforeach
            
                       
            </div>
         
            <div class="card-footer py-4">
             
            </div>
          </div>
        </div>
      </div>
      <!-- Dark table -->
     
    </div>
 
<!-----------------------------------------------------!--->

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script>
  function addtofav(imgid, userid) {
    var token = document.querySelectorAll("input[name='_token']")[0].value
    $.ajax({
      type: 'post',
      data: {imgid:imgid , userid:userid , _token:token },
      datatype: 'application/json',
      url : '{{url("favimg")}}',
      success:function(data){
        console.log('ok');
        $('.addfavclass'+imgid).addClass('<div class="HeartAnimation animate" onclick="unfav('+userid+','+imgid+')"></div>')
    }
    })
  }
</script>
 
