@extends ('admin-layouts.master')

@section('header')



<style type="text/css">
input[type=file]{
	display: inline;
}
#image_preview{
	border: 1px solid #ccc;
	padding: 10px;
}
#image_preview img{
	width: 180px;
	padding: 5px;
}
</style>

@endsection('header')


@section ('content')

<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h3 class="page-header">New Blog</h3>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
<div class="col-lg-6">

<form method="Post" action="{{ url('/blogs') }}" name="post" enctype="multipart/form-data">
{{ csrf_field() }}


<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
<label class="control-label" for="title">Title:</label>
<input type="text" name="title" class="form-control"  placeholder="Post Title ..." value="{{ old('title') }}">
<p class="text-danger">{{ $errors->first('title') }}</p>
</div>

<div class="form-group {{ $errors->has('author') ? 'has-error' : '' }}">
<label class="control-label" for="author">Author</label>
<input type="text" name="author" class="form-control" placeholder="Post author ..." value="{{ old('author') }}">
<p class="text-danger">{{ $errors->first('author') }}</p>
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
<label class="control-label" for="description">Description
</label> 
<textarea id="summernote"  name="description" class="form-control" class="textarea"> {{ old('description') }}</textarea>
<br>
<!--  <div id="btn"></div> -->
<p class="text-danger">{{ $errors->first('description') }}</p>
</div>
<div class="form-group">
<label>Blog Image</label>
<div class="form-group">
<input type="file"  id="uploadFile" name="image">
<br>
<br>

<div id="image_preview">

</div>

</div>
<br>
<div class="checkbox">
<label>

<input type="checkbox" name="active" ?1:0 >status


</label>

</div>

</form>

<br>


<div class="form-group">
<button class="btn btn-success">Save</button>

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
maxHeight: 400,
fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150']





});

</script>


<script type="text/javascript">



$("#uploadFile").change(function(){
	
	$('#image_preview').html("");
	
	var total_file=document.getElementById("uploadFile").files.length;
	
	
	
	for(var i=0;i<total_file;i++)
	
	{
		
		$('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'>");
		
	}
	
	
	
});

</script>

@stop

