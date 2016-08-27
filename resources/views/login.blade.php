 @extends('welcome')
 @section('mainBody')
 <div class="container" style="margin-top: 10% !important;">
        <h2 class="white-text center">Financial <span class="thin">Assistant</span> </h2>
        <div class="container">
            <form class="col s12">
                 <div class="container">
                   <div class="input-field col s6">
                     <input id="first_name" type="text" class="validate" style="color: white;">
                     <label for="first_name" class="white-text">Username</label>
                   </div>
                   <div class="input-field col s6">
                     <input id="last_name" type="password" class="validate" style="color: white;">
                     <label for="last_name" class="white-text">Password</label>
                   </div>

                   <div class="row">
                       <input type="submit" class="btn waves-effect waves-dark col s12 orange darken-4" name="Log In" value="Log In">
                   </div>
                   <div class="row center">
                       <a href="" class="light white-text">Forgot Password?</a>
                   </div>
                 </div>
            </form>        
        </div>
    </div>
@endsection