@extends ('admin-layouts.master')

@section ('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Edit Location</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6">
                
                <form method="Post" action="{{ url('/locations/'.$location->id.'/update') }}" name="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                   
                    <fieldset >
                        <div class="form-group" {{ $errors->has('name') ? 'has-error' : '' }}>
                            <label for="name">Name:</label>
                            <input class="form-control"  name="name" id="name" type="text" placeholder="Name" value="{{ old('name', $location->name) }}">
                        </div>
                        


                        <div class="form-group">
                            
                                <input type="submit" class="btn btn-success" value="Save Changes">
                                
                                <a href="{{ url('/locations') }}" class="btn btn-default">Cancel</a>     
                            </div>
                        </div>
                    </fieldset>
                </form>


            </div>
        </div>
    </div>
</div>
@endsection ('content')


