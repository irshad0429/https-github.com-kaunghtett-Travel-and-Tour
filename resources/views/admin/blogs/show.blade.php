@extends ('admin-layouts.master')


@section ('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Delete Blog</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6">
                

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
            <label class="control-label" for="title">Title:</label>
            <input type="text" name="title" class="form-control"  placeholder="Post Title ..." value="{{ old('title', $blogs->owner->title) }}" disabled>
            <p class="text-danger">{{ $errors->first('title') }}</p>
        </div>

            <div class="form-group {{ $errors->has('author') ? 'has-error' : '' }}">
                <label class="control-label" for="author">Author</label>
                <input type="text" name="author" class="form-control" placeholder="Post author ..." value="{{ old('author', $blogs->owner->author) }}" disabled>
                <p class="text-danger">{{ $errors->first('author') }}</p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label class="control-label" for="description">Description
                </label> 
                <textarea id="summernote"  name="description" class="form-control" class="textarea" disabled> {{ old('description', $blogs->description) }}</textarea>
                <br>
                <!--  <div id="btn"></div> -->
                <p class="text-danger">{{ $errors->first('description') }}</p>
            </div>
                <div class="form-group">
                    <label>Upload Image</label>
                    <img src="{{ asset($blogs->path()) }}" width="100" height="auto">
                    <div class="input-group">
                        <input type="file" id="image" name="image" disabled>
                    </form>
                </div>
            <br>
            <div class="checkbox">
                <label>
                    <span class="badge badge-light">
                        <input type="checkbox" name="active" ?1:0  value="{{old('active', $blogs->owner->active)}}" disabled>Active
                    </span>

                </label>
                
            </div>

                <br>


          <div class="form-group">
                
                    <form action="{{url('/blogs/destroy/'.$blogs->id) }}" method="POST" style="display: inline;" 
                        id="delete-form">
                        {{ csrf_field() }} 
                        
                        <button type="submit" class="btn btn-danger" id="delete-btn" >
                           Remove

                        </button>
                    </form>

                    <a href="{{url('/blogs') }}" class="btn btn-default">Cancel</a>     
                </div>
            
        
        <!-- /.col-sm-4 -->
    </div>
    <!-- /.row -->
</form>
</div>
</div>





@endsection ('content')

