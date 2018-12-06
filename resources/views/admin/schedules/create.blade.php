@extends ('admin-layouts.master')

@section('header')
<style type="text/css">
.main-section{
	margin:0 auto;
	padding: 20px;
	margin-top: 100px;
	background-color: #fff;
	box-shadow: 0px 0px 20px #c1c1c1;
}
.fileinput-remove,
.fileinput-upload{
	display: none;
}
</style>

<style type="text/css">
input[type=file]{
	display: inline;
}
#image_preview{
	border: 1px solid #ccc;
	padding: 10px;
}
#image_preview img{
	width: 200px;
	padding: 5px;
}
</style>

@endsection('header')

@section ('content')

<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h3 class="page-header">Create A New Schedule</h3>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
<div class="col-lg-6">

<fieldset>

<form method="Post" action="{{ url('/schedules/'.$id)}}" name="post" enctype="multipart/form-data">
{{ csrf_field() }}


<input type="hidden" id="tour_packages_id" name="tour_packages_id" class="form-control" value="{{$id}}">

<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
<label class="control-label" for="name">Name :</label>
<input type="text" name="name" class="form-control" placeholder="Name..." value="{{ old('name') }}">
<p class="text-danger">{{ $errors->first('name') }}</p>
</div>

<div class="form-group">
<label>Upload Images</label>
<div class="form-group">
<input type="file"  id="uploadFile" name="image[]" multiple="multiple">
<br>
<br>

<div id="image_preview">

</div>

</div>




</div>
<br>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
<label class="control-label" for="description">Description
</label> 
<textarea id="summernote"  name="description" class="form-control" class="textarea"> {{ old('description') }}</textarea>
<br>
<!--  <div id="btn"></div> -->
<p class="text-danger">{{ $errors->first('description') }}</p>
</div>


<div class="form-group">
<button class="btn btn-success">Save</button>

<a href="{{url('/schedules/'.$id)}}" class="btn btn-primary">Back</a>
</div>



</form>
</fieldset>
</div>
</div>






@endsection ('content')

@section('footer.script')


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



@stop

