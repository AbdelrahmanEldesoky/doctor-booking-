<!DOCTYPE html>
<html  class="light-layout">
<head>
    @include('user.include.head')
    @stack('css')
</head>
<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static menu-extended  " data-open="click"
      data-menu="vertical-menu-modern" data-col="">
<div class="page-loader d-none">
    <div class="loader"></div>
</div>
@include('user.include.header')
@include('user.include.sidebar')

@yield('content')

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2022<a class="ml-25" href="javascript:;">Ipersona</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span><span class="float-md-right d-none d-md-block">Picnave<i data-feather="heart"></i></span></p>
</footer>
<button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
@include('user.include.script')

<form id="delete-form" action="" method="POST"
      style="display: none;">
    @csrf
    @method('delete')
</form>
@stack('js')

<script>
</script>
</body>
</html>
