@extends ('admin-layouts.master')

@section ('content')

<!-- Bootstrap Core CSS -->

<!-- DataTables CSS -->


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Tour Leaders</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tour Leaders Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <a href="{{ url('tourleaders/create') }}" class="btn btn-primary pull-right" role="button">Add TourLeader</a>
                        <br>
                        <br>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Education</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach($tourleaders as $leader)


                            <tr>
                                <td>
                                    {{$leader->id}}

                                </td>

                                <td>

                                    {{$leader->name}}

                                </td>

                                <td>

                                    {{$leader->education}}

                                </td>

                                <td>
                                    <a href="{{ url('/tourleaders/'.$leader->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                                    <a href="{{ url('/tourleaders/show/'.$leader->id)}}" class="btn btn-danger">
                                       <i class="fa fa-trash"></i> 

                                   </a>







                                   {{--modal--}}

                                   <button type="button"  class="btn btn-info" data-toggle="modal" data-target="#{{$leader->id}}">
                                      <i class="fa fa-eye"></i>
                                  </button>

                                  <!-- Modal -->
                                  <div class="modal fade" id="{{$leader->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h3 class="modal-title" id="exampleModalLabel"><b><i>{{$leader->name}}</i></b></h3>
                                            <br>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                          <img src="{{ asset($leader->profilepath()) }}" alt="{{ $leader->profile }}" width="100%" height="100%">
                                      </div>
                                      <div class="modal-body" >



                                        <h3><u><b>Description</b></u></h3><br>
                                         <h4 id="summernote">{{$leader->short_description}}</h4>
                                         <hr> 
                                        

                                        


                                        <h3><u><b>Specialist</b></u></h3><br>

                                        <?php

                                        $arr = $leader->special;

                                        $test = explode(',',$arr);

                                        ?>   

                                            @foreach($test as $myarray)



                                            <li>  

                                                {{ $myarray }}

                                            </li>





                                            @endforeach








                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>





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

$('#summernote').summernote({
    toolbar: [
// [groupName, [list of button]]
['style', ['bold', 'italic', 'underline', 'clear']],  
['fontsize', ['fontsize']],
    ['color', ['color']],
],
height: 200,
minHeight: 100,
maxHeight: 400




});

</script>

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