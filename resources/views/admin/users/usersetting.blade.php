@extends('admin-layouts.master')




@section ('content')

<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h3 class="page-header">User Setting</h3>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
<div class="col-lg-6">
<h3 style="color:grey;"> <i>Profile</i> </h3>
<hr>

<form method="Post" action="{{ url('/usersetting/update') }}" name="post" enctype="multipart/form-data">
{{ csrf_field() }}

<div class="form-group {{ $errors->has('Name') ? 'has-error' : '' }}">
<label class="control-label" for="title">Name:</label>
<input  id="name" type="text" name="name" class="form-control"  placeholder="Post Title ..." value="{{ old('name', $users->name) }}">

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
<hr>

<h3 style="color:grey;"> <i>Change Password</i> </h3>
<hr>

<div class="form-group {{ $errors->has('current-password') ? 'has-error' : '' }}">
<label for="current-password" class="control-label">Current Password</label>


<input id="current-password" type="password" class="form-control" name="current-password">

@if ($errors->has('current-password'))
<span class="invalid-feedback" role="alert">
<strong>{{ $errors->first('current-password') }}</strong>
</span>
@endif
</div>


<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
<label for="password" class="control-label">New Password</label>


<input id="password" type="password" class="form-control" name="password">

@if ($errors->has('password'))
<span class="invalid-feedback" role="alert">
<strong>{{ $errors->first('password') }}</strong>
</span>
@endif
</div>


<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
<label for="password-confirm" class="control-label">Retype Password</label>


<input id="password-confirm" type="password" class="form-control" name="password_confirmation">
</div>



<div class="form-group">
<button class="btn btn-success">Update</button>

<a href="/users" class="btn btn-primary">Back</a>
</div>
</div>
<!-- /.col-sm-4 -->
</div>
<!-- /.row -->
</form>
</div>
</div>

@endsection ('content')

@section ('footer.script')

<script>

$('#summernote').summernote({
    toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
        ]
    });
    
    
    
    </script>
    
    @stop
    
    
    