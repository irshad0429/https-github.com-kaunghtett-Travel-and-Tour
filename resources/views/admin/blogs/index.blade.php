@extends ('admin-layouts.master')

@section ('content')

<!-- Bootstrap Core CSS -->

<!-- DataTables CSS -->


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Blog</h2>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Blogs Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <a href="{{ url('blogs/create') }}" class="btn btn-primary pull-right" role="button">Add New Blog</a>
                        <br>
                        <br>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Author</th>
                                <th>Active</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($blogs as $blog)


                            <tr>

                               <td>

                                   {{$blog->owner->id}}

                               </td>


                               <td>
                                {{$blog->owner->title}}
                            </td>

                            <td>
                                {{$blog->owner->slug}}
                            </td>
                            <td>
                                {{$blog->owner->author}}
                            </td>
                            <td>
                                <span class="badge" style="background-color:{{$blog->owner->active ==1 ? '#5cb85c' : '#777'}}">
                                    {{$blog->owner->active == 1 ? 'active' : 'inactive'}}
                                </span>
                            </td>

                            <td>

                                <a href="{{ url('/blogs/'.$blog->id.'/edit') }}" class="btn btn-primary"><i class="fa fa-edit"></i></a>

                                <a href="{{ url('/blogs/'.$blog->id.'/show') }}" class="btn btn-danger"> <i class="fa fa-trash-o"></i></a>

                                <button type="button"  class="btn btn-info" data-toggle="modal" data-target="#{{$blog->id}}">
                                  <i class="fa fa-eye"></i>
                              </button>

                              <!-- Modal -->
                              <div class="modal fade" id="{{$blog->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel"><b><i>{{$blog->owner->title}}</i></b></h3>
                                        <br>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                      <img src="{{ asset($blog->path()) }}" alt="{{ $blog->image }}" width="100%" height="100%">
                                  </div>
                                  <div class="modal-body">
                                    {{$blog->description}}
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
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
</script>
 

<!-- DataTables JavaScript -->
<!-- Custom Theme JavaScript -->
@stop