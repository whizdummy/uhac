<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Fin App - Administrator</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{!! asset('css/materialize.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{!! asset('css/style.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{!! asset('css/jquery.dataTables.min.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{!! asset('css/angular-datatables.css') !!}" type="text/css" rel="stylesheet" media="screen,projection"/>
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
  <!--  Scripts-->
  <script src="{!! asset('js/jquery-2.1.1.min.js') !!}"></script>
  <script src="{!! asset('js/angular.min.js') !!}"></script>
  <script src="{!! asset('js/materialize.js') !!}"></script>
  <script src="{!! asset('js/angular-resource.min.js') !!}"></script>
  <script src="{!! asset('js/jquery.dataTables.min.js') !!}"></script>
  <script src="{!! asset('js/angular-datatables.min.js') !!}"></script>

  
  <script src="{!! asset('js/init.js') !!}"></script>

  <script src="{!! asset('js/app/app.js') !!}"></script>
  <script src="{!! asset('js/app/controller/billerCtrl.ctr.js') !!}"></script>
  <script src="{!! asset('js/app/controller/businessDepCtrl.ctr.js') !!}"></script>
  <script src="{!! asset('js/app/controller/categoryCtrl.ctr.js') !!}"></script>

</body>
</html>
