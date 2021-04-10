@include('admin.adminlayouts.headlibrary')

<body>
  <!-- Sidenav -->
 @include('admin.adminlayouts.sidebar')
 <div class="main-content" id="panel">
@include('admin.adminlayouts.topnavbar')
@yield('bodyheader')

  @yield('bodycontent')
  </div>

  
@include('admin.adminlayouts.footerlibrary')
</body>
</html>