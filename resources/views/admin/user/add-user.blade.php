
@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mange User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User </li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <section class="col-md-12">
        <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3>
                 Add User
  <a class="btn btn-success float-right btn-sm" href="{{route('users.view')}}"> <i class="fa fa-list"> User List</i> </a>

                </h3>

             <!--    <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                    </li>
                  </ul>
                </div> -->

              </div><!-- /.card-header -->
              <div class="card-body">
               

               <form method="Post" action="{{route('users.store')}}" id="addUserForm">
                  @csrf

                <div class="form-row">

                <div class="form-group col-md-4">
                  <label for="usertype">User Role</label>
       <select class="form-control" id="usertype" name="usertype">
            <option value="">Select Role</option>
                <option value="Admin">Admin</option>
                <option value="User">User</option>
                 
                  </select>
                </div>
                

                <div class="form-group col-md-4">
                <label for="name">name</label>
         <input type="text" name="name" class="form-control"  placeholder="Enter name" >
         <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}} </font> 
                </div>

                <div class="form-group col-md-4">
                <label for="email">email</label>
         <input type="email" name="email" class="form-control"  placeholder="Enter email" > 
         <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}} </font> 

                </div>

                <div class="form-group col-md-4">
                <label for="password">Password</label>
         <input type="password" name="password" id="password" class="form-control"  placeholder="Enter password"> 
                </div>

                <div class="form-group col-md-4">
                <label for="password">Confirm Password</label>
         <input type="password" name="password2" class="form-control"  placeholder="Enter Confirm password"> 
                </div>


              <div class="form-group col-md-6">
               
         <input type="submit" value="submit" class="btn btn-primary float-right"> 
                </div>
                 </div>
               </form>






              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>  






 
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>


<!-- Page specific script -->
<script>
$(function () {

  // $.validator.setDefaults({
  //   submitHandler: function () {
  //     alert( "Form successful submitted!" );
  //   }
  // });

  $('#addUserForm').validate({
    rules: {

      usertype: {
        required: true,
      },

      name: {
        required: true,
      },

      email: {
        required: true,
        email: true,
      },

      password: {
        required: true,
        minlength: 5
      },

      password2: {
        required: true,
        equalTo: '#password'
      }
    },

    messages: {
      usertype: {
        required: "Please select User Role",
      },

      name: {
        required: "Please enter name",
         
      },

      email: {
        required: "Please enter a email address",
        email: "Please enter a <em>vaild </em> email address",
      },

      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long",
      },
      password2: {
        required: "Please provide a Confirm password",
        equalTo: "Confirm password does not match",
      },
      // terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>

@endsection
