
@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mange User Message</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Message </li>
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
                <h3> User Message list </h3>

              </div><!-- /.card-header -->
              <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover table-responsive-sm">
                  <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Message</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($alldata as $key => $userMsg)
                    <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$userMsg->name}}</td> 
                    <td>{{$userMsg->email}}</td>
                    <td>{{$userMsg->contact_no}}</td>
                    <td>{{$userMsg->address}}</td>
                    <td>{{$userMsg->message}}</td>
                    <td>
                      <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('contacts.deleteuserMsg',$userMsg->id)}}"><i class="fa fa-trash"></i></a>

                    </td>
                  </tr>
                  @endforeach
                      </tbody>



                  <tfoot>
                  <tr>
                    <th>SL.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Message</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>

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
