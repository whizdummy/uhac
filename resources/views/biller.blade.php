 @extends('welcome')
 @section('mainBody')
 <div ng-controller = "billerCtrl as vm">
  <div class="section no-pad-bot" id="index-banner">
    <div class="container white z-depth-1" style="border-radius: 10px;">
      <div class="row z-depth-2">
        <h1 class="orange white-text darken-1" style="border-top-left: 10px !important; border-top-right: 10px !important; margin-bottom: 0;">Biller <span class="thin"> Maintenance</span></h1>

      </div>
      <div class="row right">
        <a class="btn-floating indigo darken-4 btn-large modal-trigger" href="#inputModal" style="margin-top: -70px !important; margin-right: 40px !important;"><i class="material-icons">add</i></a>
      </div>
      
      <div class="row">
          <div class="container">
              <table datatable="ng" dt-options="vm.dtOptions" dt-column-defs="vm.dtColumnDefs" class="row-border hover">
                  <thead>
                  <tr>
                      <th style="width: 70%;">Biller Name</th>
                      <th  style="width: 30%;">Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr ng-repeat="biller in vm.billers">
                      <td>@{{ biller.str_biller }}</td>
                      <td>
                        <a ng-click="vm.updateBiller(biller, $index)" class="btn indigo darken-4 btn-large modal-trigger col s4" style="margin-right: 5px;"><i class="material-icons">edit</i></a>
                        <a ng-click="vm.deleteBiller(biller, $index)" class="btn red darken-4 btn-large modal-trigger col s4"><i class="material-icons">delete</i></a>
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
   
     <div class="modal-content">
     <form ng-submit="vm.saveBiller()" autocomplete="off">
     <h3 class="indigo-text light center">Add Biller</h3>
       <div class="input-field col s12">
         <input ng-model='vm.biller.str_biller' id="first_name" type="text" class="validate" style="font-size: 21px;">
         <label for="first_name">Biller Name</label>
       </div>
     </div>
     <div class="modal-footer">
       <button name="action" type="submit" class="modal-action waves-effect waves-green orange darken-2 btn">SAVE</button>
     </div>
   </form>
   </div>


</div>
@endsection