@extends ('admin-layouts.master')

@section ('content')

<!-- Bootstrap Core CSS -->

<!-- DataTables CSS -->


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Bookings</h2>
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
                        <br>
                        <br>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Package Name</th>
                                <th>From</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                         @foreach($bookings as $booking)

                         <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->username}}</td>
                            <td>{{ $booking->booking->name}}</td>
                            <td>{{ $booking->from}}</td>
                            <td>{{ $booking->email}}</td>
                            <td>{{ $booking->phone}}</td>
                            <td>{{ $booking->quantity}}</td>
                            <td>{{(date('d-m-Y', strtotime($booking->date)))}}</td>
                            <td> <span class="badge"> {{$booking->status}} </span> </td>

                            <td>
                                    <a href="{{url('booking/edit/'.$booking->id)}}" class="btn btn-primary"> <i class="fa fa-edit"></i> </a>
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