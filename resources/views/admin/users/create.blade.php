@extends ('admin-layouts.master')

@section('header')

 <link href="{{ asset('admin/richtext.css') }}" rel="stylesheet">

@endsection('header')

@section ('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create A User</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-6">
                <h1>Users</h1>

                <form method="Post" action="{{ url('/users') }}" name="post" enctype="multipart/form-data">
                    {{ csrf_field() }}


                    <div class="form-group {{ $errors->has('Name') ? 'has-error' : '' }}">
                        <label class="control-label" for="title">Name:</label>
                        <input  id="name" type="text" name="name" class="form-control"  placeholder="Name  ..." value="{{ old('name') }}">

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label class="control-label" for="email">Email</label>
                        <input  id="email" type="email" name="email" class="form-control" placeholder="Email ..." value="{{ old('email') }}">


                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>


                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password" class="control-label">Password</label>

                        
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    

                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password-confirm" class="control-label">Confirm Passoword</label>

                        
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                  

                    
                    <div class="form-group">
                        <button class="btn btn-success">Register</button>

                        <a href="/blogs" class="btn btn-primary">Back</a>
                    </div>
                </div>
                <!-- /.col-sm-4 -->
            </div>
            <!-- /.row -->
        </form>
    </div>
</div>





@endsection ('content')

