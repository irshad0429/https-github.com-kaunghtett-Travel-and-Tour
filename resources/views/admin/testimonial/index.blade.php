@extends ('admin-layouts.master')

@section ('content')


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Testimonials</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Testimonials Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <a href="{{ url('/testimonial/create') }}" class="btn btn-primary pull-right" role="button">Add Testimonial</a>
                        <br>
                        <br>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        
                        @foreach($testimonials as $test)
                        <tr>
                        <td>{{$test->id}}</td>
                        <td>{{$test->name}}</td>
                        <td>{{$test->description}}</td>
                        <td><span class="badge" style="background-color:{{$test->status ==1 ? '#5cb85c' : '#c3c50a'}}">
 {{$test->status == 1 ? 'popular' : 'normal'}}</span> 
                       </td>

                        <td>
                        
                       <a href="{{url('/testimonial/edit/'.$test->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="{{url('/testimonial/show/'.$test->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                        </td>

                        </tr>

                        @endforeach



                    </tbody>
                </table>
                <!-- /.table-responsive -->

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
@endsection ('content')

@section('footer.script')

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
<!-- DataTables JavaScript -->
<!-- Custom Theme JavaScript -->
@stop