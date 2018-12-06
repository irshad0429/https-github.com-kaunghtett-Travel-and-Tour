@extends ('admin-layouts.master')

@section ('content')

<!-- Bootstrap Core CSS -->

<!-- DataTables CSS -->


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Category</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Categories Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <a href="{{ url('category/create') }}" class="btn btn-primary pull-right" role="button">Add Category</a>
                        <br>
                        <br>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                         @foreach($category as $cat)

                         <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->name }}</td>
                            <td><a<span class="badge" style="background-color:{{$cat->status ==1 ? '#5cb85c' : '#c3c50a'}}">
                                    {{$cat->status == 1 ? 'active' : 'offline'}}
                                </span></td>

                            <td>
                              
                                <a href="{{ url('/category/'.$cat->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                               
                               
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