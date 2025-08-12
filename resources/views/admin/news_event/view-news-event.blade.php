
@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Mange News and Events</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">News and Events </li>
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
                  News and Events list
  <a class="btn btn-success float-right btn-sm" href="{{route('news_events.add')}}"> <i class="fa fa-plus-circle"> Add News and Events</i> </a>

                </h3>

              </div><!-- /.card-header -->
              <div class="card-body">
               

                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SL.</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Short Title</th>
                    <th>Long Title</th>
                    <th>Action</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($alldata as $key => $newsEvent)  
                    <tr>
                    <td>{{$key+1}}</td> 
  <td>{{date('d-m-y',strtotime($newsEvent->date))}}</td>

                    <td><img src="{{(!empty($newsEvent->image))?url('public/upload/newsEvent_images/'.$newsEvent->image):url('public/upload/no_image.png')}}" width="120px" height="130px"></td>
                    <td>{{$newsEvent->short_title}}</td>
                    <td>{{$newsEvent->long_title}}</td>
                    <td>
                      <a title="Edit" class="btn btn-sm btn-primary" href="{{route('news_events.edit',$newsEvent->id)}}"><i class="fa fa-edit"></i></a>
                      <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('news_events.delete',$newsEvent->id)}}"><i class="fa fa-trash"></i></a>

                    </td>
                  </tr>
                  @endforeach
                      </tbody>



                  <tfoot>
                  <tr>
                    <th>SL.</th>
                    <th>Date</th>
                    <th>Image</th>
                    <th>Short Title</th>
                    <th>Long Title</th>
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
