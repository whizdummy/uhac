<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Fin App - Administrator</title>

  <!-- CSS  -->
  @include('styles')
</head>
<body class="orange darken-2" ng-app = "app">
  <!-- Nagivation Bar START -->
  <nav class="orange darken-2" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Admin View</a>
      <ul class="right hide-on-med-and-down">
        <li class="{!! Request::url() === url('biller-maintenance') ? 'active' : '' !!}"><a href="{!! url('biller-maintenance') !!}">Biller</a></li>
        <li class="{!! Request::url() === url('category-maintenance') ? 'active' : '' !!}"><a href="{!! url('category-maintenance') !!}">Category</a></li>
        <li><a href="#">Business Dependencies</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="{!! url('biller-maintenance') !!}">Biller</a></li>
        <li><a href="#">Business Dependencies</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <!-- Navigation Bar END -->

  @yield('mainBody')
  
  <footer class="page-footer orange">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        Made by <a class="orange-text text-lighten-3" href="http://materializecss.com">Materialize</a>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  @include('scripts')

</body>
</html>
