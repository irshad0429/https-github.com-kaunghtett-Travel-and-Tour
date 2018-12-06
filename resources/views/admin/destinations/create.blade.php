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
<h3 class="page-header">Create Destination</h3>
</div>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
<div class="col-lg-12">
<div class="col-lg-6">

<form method="Post" action="{{ url('/admin/destinations') }}" name="post" enctype="multipart/form-data">
{{ csrf_field() }}
<fieldset >

<div class="form-group">
<label for="locations_id">* Location</label>
<select id="locations_id" name="locations_id" class="form-control">

@foreach(App\Location::all() as $location) 
<option value="{{$location->id}}">

{{$location->name}}

</option>
@endforeach


</select>
</div>



<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
<label for="name">Name:</label>
<input class="form-control"  name="name" id="name" type="text" placeholder="Name">
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
<label class="control-label" for="description">Description
</label> 
<textarea id="summernote"  name="description" class="form-control" class="textarea"> {{ old('description') }}</textarea>

<!--  <div id="btn"></div> -->
<p class="text-danger">{{ $errors->first('description') }}</p>
</div>

<div class="form-group">
<label>Destination Image</label>
<div class="form-group">
<input type="file"  id="uploadFile" name="image">
<br>
<br>

<div id="image_preview">

</div>

</div>

<div class="checkbox">
<label>
<input type="checkbox" name="p_status" ? 1=="active" : 0==null >P_Status

</label>

</div>




</div>


<button type="submit" class="btn btn-primary">Save</button>

<a href="/admin/destinations" class="btn btn-default">Back</a>
</fieldset>
</form>


</div>
</div>
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
<script>

@stop




