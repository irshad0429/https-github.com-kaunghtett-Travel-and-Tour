@extends ('admin-layouts.master')

@section ('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Category</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6">
                
                <form method="Post" action="{{ url('/category') }}" name="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <fieldset >
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input class="form-control"  name="name" id="name" type="text" placeholder="Name">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="status" ? 1=="active" : 0==null >status
                                 
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="/category" class="btn btn-default">Back</a>
                    </fieldset>
                </form>


            </div>
        </div>
    </div>
</div>
@endsection ('content')




