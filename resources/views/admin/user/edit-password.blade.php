
@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mange Password</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Password </li>
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
                <h3> Edit Password </h3>

              </div><!-- /.card-header -->
              <div class="card-body">

               <form method="Post" action="{{route('profiles.password.update')}}" id="editPassword">
                  @csrf

                <div class="form-row">

                <div class="form-group col-md-4">
                <label for="current_password">Current Password</label>
      <input type="password" name="current_password" id="current_password" class="form-control"  placeholder="Enter Current password"> 
                </div>

                  <div class="form-group col-md-4">
                <label for="new_password">New Password</label>
      <input type="password" name="new_password" id="new_password" class="form-control"  placeholder="Enter New password"> 
                </div>

                <div class="form-group col-md-4">
                <label for="confirm_new_password">Confirm New Password</label>
         <input type="password" name="confirm_new_password" class="form-control"  placeholder="Enter Confirm New password"> 
                </div>


              <div class="form-group col-md-6">
               
         <input type="submit" value="Update" class="btn btn-primary float-right"> 
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

  $('#editPassword').validate({
    rules: {


      current_password: {
        required: true,
      },

      new_password: {
        required: true,
        minlength: 5
      },

      confirm_new_password: {
        required: true,  
        equalTo: '#new_password'
      }
    },

    messages: {

      current_password: {
        required: "Please Enter Current a Password",
      },

       new_password: {
        required: "Please Enter a New Password",
        minlength: "Your password must be at least 5 characters long",
      },
      confirm_new_password: {
        required: "Please Enter a Confirm password",
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
