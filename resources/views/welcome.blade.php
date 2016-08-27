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
