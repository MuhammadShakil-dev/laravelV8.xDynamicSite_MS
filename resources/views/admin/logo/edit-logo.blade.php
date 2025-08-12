
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
                 Update Logo
  <a class="btn btn-success float-right btn-sm" href="{{route('logos.view')}}"> <i class="fa fa-user"> Logo List</i> </a>

                </h3>

              </div><!-- /.card-header -->
              <div class="card-body">
               

               <form method="Post" action="{{route('logos.update',$edit_logo->id)}}" id="addUserForm" enctype="multipart/form-data">
                  @csrf

                <div class="form-row">

                 <div class="form-group col-md-4">
                <label for="image">Image</label>
         <input type="file" name="image" id="image" class="form-control" > 
                </div>
                
                <div class="form-group col-md-2">
            <img id="showImage" src="{{(!empty($edit_logo->image))?url('public/upload/logo_images/'.$edit_logo->image):url('public/upload/no_image.png')}}" style="width:150px; height:160px; border:1px solid 000;">
                </div>

               
              <div class="form-group col-md-6" style="padding-top: 30px;">
               
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




@endsection
