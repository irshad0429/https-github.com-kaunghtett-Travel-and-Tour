@extends ('admin-layouts.master')

@section ('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Edit Member Category</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6">
                
                <form method="Post" action="{{ url('/membercategory/'.$category->id) }}" name="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                    <fieldset >
                        <div class="form-group" {{ $errors->has('name') ? 'has-error' : '' }}>
                            <label for="name">Name:</label>
                            <input class="form-control"  name="name" id="name" type="text" placeholder="Name" value="{{ old('name', $category->name) }}">
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-6 control-label"></label>
                            <div class="col-md-8">
                                <input type="submit" class="btn btn-primary" value="Save Changes">
                                <span></span>
                                <a href="{{ url('/membercategory') }}" class="btn btn-default">Cancel</a>     
                            </div>
                        </div>
                    </fieldset>
                </form>


            </div>
        </div>
    </div>
</div>
@endsection ('content')
