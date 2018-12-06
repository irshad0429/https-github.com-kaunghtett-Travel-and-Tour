@extends ('admin-layouts.master')

@section ('content')

<!-- Bootstrap Core CSS -->

<!-- DataTables CSS -->


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Package</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Packages Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <a href="{{ url('packages/create') }}" class="btn btn-primary pull-right" role="button">Add Packages</a>
                        <br>
                        <br>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Schedule</th>
                                <th>Gallery</th>
                                <th>Review</th>
                                <th>P_Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                         @foreach($packages as $package)

                         <tr>
                            <td>{{ $package->id }}</td>
                            <td>{{ $package->name }}</td>
                            
                            <td> <a href="{{ url('/schedules/'.$package->id)}}" class="btn btn-primary">Schedule</a></td>
                            <td><a href="{{ url('/gallery/'.$package->id)}}" class="btn btn-primary" >Gallery</a></td>
                            <td><a href="{{url('/admin/reviews')}}" class="btn btn-primary">Review</a></td>
                            <td><span class="badge" style="background-color:{{$package->p_status ==1 ? '#5cb85c' : '#c3c50a'}}">
                                    {{$package->p_status == 1 ? 'popular' : 'normal'}}
                                </span></td>


                            <td>
                                <a href="{{ url('/packages/'.$package->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                

                                <a href="{{ url('/packages/'.$package->id.'/show')}}" class="btn btn-success"><i class="fa fa-search"></i></a>


								


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