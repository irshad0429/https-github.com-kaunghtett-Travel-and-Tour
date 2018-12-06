@extends ('admin-layouts.master')

@section ('content')

<!-- Bootstrap Core CSS -->

<!-- DataTables CSS -->


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Schedule</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Schedules Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <a href="{{ url('schedules/'.$id.'/create') }}" class="btn btn-primary pull-right" role="button">Add Schedule</a>


                        <br>
                        <br>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                           @foreach($schedules as $schedule)

                           <tr>
                            <td>{{ $schedule->id }}</td>
                            <td>{{ $schedule->name }}</td>

                            <td>
                                <a href="{{url('/schedules/edit/'.$schedule->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                                <a href="{{url('/schedules/show/'.$schedule->id)}}" class="btn btn-success"><i class="fa fa-eye"></i></a>

                                <a href="{{url('/schedules/showdel/'.$schedule->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>


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