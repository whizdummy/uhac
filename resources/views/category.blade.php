 @extends('welcome')
 @section('mainBody')
 <div ng-controller = "categoryCtrl as vm">
 <nav class="orange darken-2" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Admin View</a>
      <ul class="right hide-on-med-and-down">
        <li ><a href="{!! url('biller-maintenance') !!}">Biller</a></li>
        <li class="active"><a href="{!! url('category-maintenance') !!}">Category</a></li>
        <li><a href="#">Business Dependencies</a></li>

      </ul>

      <ul id="nav-mobile" class="side-nav">
          <li><a href="{!! url('biller-maintenance') !!}">Biller</a></li>
          <li><a href="#">Business Dependencies</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <div class="section no-pad-bot" id="index-banner">
    <div class="container white z-depth-1" style="border-radius: 10px;">
      <div class="row z-depth-2">
        <h1 class="orange white-text darken-1" style="border-top-left: 10px !important; border-top-right: 10px !important; margin-bottom: 0;">Category <span class="thin"> Maintenance</span></h1>

      </div>
      <div class="row right">
        <a class="btn-floating indigo darken-4 btn-large modal-trigger" href="#inputModal" style="margin-top: -70px !important; margin-right: 40px !important;"><i class="material-icons">add</i></a>
      </div>
      
      <div class="row">
          <div class="container">
              <table datatable="ng" dt-options="vm.dtOptions" dt-column-defs="vm.dtColumnDefs" class="row-border hover">
                  <thead>
                  <tr>
                      <th style="width: 70%;">Category Name</th>
                      <th  style="width: 30%;">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr ng-repeat="category in vm.categories">
                      <td>@{{ category.str_category }}</td>
                      <td>
                        <a ng-click="vm.updateCategory(category, $index)" class="btn indigo darken-4 btn-large modal-trigger col s4" style="margin-right: 5px;"><i class="material-icons">edit</i></a>
                        <a ng-click="vm.deleteCategory(category, $index)" class="btn red darken-4 btn-large modal-trigger col s4"><i class="material-icons">delete</i></a>
                      </td>
                  </tr>
                  </tbody>
              </table>
          </div>
      </div>
    </div>
  </div>

  <!-- Modal Structure -->
   <div id="inputModal" class="modal modal-fixed-footer" style="height: 40% !important; width: 50% !important; border-radius: 10px;">
   
     <form ng-submit="vm.saveCategory()" autocomplete="off">
     <div class="modal-content">
     <h3 class="indigo-text light center" >Add Category</h3>
       <div class="input-field col s12">
         <input ng-model="vm.category.str_category" id="first_name" type="text" class="validate" style="font-size: 21px;">
         <label for="first_name">Category Name</label>
       </div>
     </div>
     <div class="modal-footer">
       <button type="submit" name="action" class="modal-action waves-effect waves-green orange darken-2 btn">SAVE</button>
     </div>
   </form>
   </div>


</div>



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
@endsection