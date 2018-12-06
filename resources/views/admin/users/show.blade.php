@extends ('admin-layouts.master')


@section ('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Remove A User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6">
                <h1>Users</h1>


                    <div class="form-group {{ $errors->has('Name') ? 'has-error' : '' }}">
                        <label class="control-label" for="title">Name:</label>
                        <input  id="name" type="text" name="name" class="form-control"  placeholder="Post Title ..." value="{{ old('name', $users->name) }}" disabled>

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label class="control-label" for="email">Email</label>
                        <input  id="email" type="email" name="email" class="form-control" placeholder="Post author ..." value="{{ old('email', $users->email) }}" disabled>


                    </div>

                   <div class="form-group">
                
                    <form action="{{url('/users/'.$users->id.'/destory') }}" method="POST" style="display: inline;" 
                        id="delete-form">
                        {{ csrf_field() }} 
                        
                        <button type="submit" class="btn btn-danger" id="delete-btn" >
                           Remove

                        </button>
                    </form>

                    <a href="{{url('/users') }}" class="btn btn-default">Cancel</a>     
                </div>

                </div>
                <!-- /.col-sm-4 -->
            </div>
            <!-- /.row -->
        </form>
    </div>
</div>





@endsection ('content')

