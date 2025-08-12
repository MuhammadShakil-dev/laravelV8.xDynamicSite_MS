
@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mange Logo</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Logo </li>
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
                 Add Logo
  <a class="btn btn-success float-right btn-sm" href="{{route('logos.view')}}"> <i class="fa fa-user"> Logo List</i> </a>

                </h3>

              </div><!-- /.card-header -->
              <div class="card-body">


               <form method="Post" action="{{route('logos.store')}}" id="addUserForm" enctype="multipart/form-data">
                  @csrf

                <div class="form-row"> 

                 <div class="form-group col-md-4">
                <label for="image">Image</label>
         <input type="file" name="image" id="image" class="form-control" >
                </div>

                <div class="form-group col-md-2">
            <img id="showImage" src="{{url('public/upload/no_image.png')}}" style="width:150px; height:160px; border:1px solid 000;">
                </div>


              <div class="form-group col-md-6" style="padding-top: 30px;">

         <input type="submit" value="Submit" class="btn btn-primary float-right">
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
