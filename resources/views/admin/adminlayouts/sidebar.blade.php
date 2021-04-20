<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{url('assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="examples/dashboard.html">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="examples/icons.html">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Icons</span>
              </a>
            </li>
      
            <li class="nav-item">
              <a class="nav-link" href="examples/profile.html">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('maindealer.index')}}">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">{{__()</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('purchaseitem.index')}}">
              <i class="ni ni-basket"></i>
                <span class="nav-link-text">Purchase Item</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="adminlogin">
                <i class="ni ni-key-25 text-info"></i>
                <span class="nav-link-text">Login</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create_jobs">
                <i class="ni ni-circle-08 text-pink"></i>
                <span class="nav-link-text">Jobs</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="img-fav-view">
                <i class="ni ni-planet text-orange"></i>
                <span class="nav-link-text">Image Favourites</span>
              </a>
            </li>

            <div class="dropdown" >
    <div class=" dropdown-toggle" data-toggle="dropdown">
    <i class="ni ni-collection text-info" style="margin-left:25px;"></i>  
    </div>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Urdu</a>
      <a class="dropdown-item" href="#">Turkish</a>
      <a class="dropdown-item" href="#">English</a>
     
     
  </div>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentation</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
           
            
            <li class="nav-item">
            <a class="nav-link" href="eventpost">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Event Listener</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                <i class="ni ni-ui-04"></i>
                <span class="nav-link-text">Components</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Plugins</span>
              </a>
            </li>
           
          </ul>
        </div>
      </div>
    </div>
  </nav>