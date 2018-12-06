@extends ('admin-layouts.master')

@section ('content')

<!-- Bootstrap Core CSS -->

<!-- DataTables CSS -->


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Location</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Location Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <a href="{{ url('locations/create') }}" class="btn btn-primary pull-right" role="button">Add Locations</a>

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
                         @foreach($location as $place)

                         <tr>
                            <th>{{ $place->id }}</th>
                            <th>{{ $place->name }}</th>
                          
                            <th>
                              
                                <a href="{{url('/locations/'.$place->id.'/edit')}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                               
                               
                            </th>

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