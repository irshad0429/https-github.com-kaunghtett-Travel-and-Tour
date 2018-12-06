@extends('admin-layouts.master')

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
	
	column-count:2;
	padding: 20px;
}

#image_preview img{
	width: 150px;
	padding: 10px;
}
</style>

@endsection('header')

@section('content')
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h3 class="page-header">   Gallery</h3>
</div>
<!-- /.col-lg-12 -->
</div>
<div class="row">
<div class="col-lg-12">
<div class="col-lg-6">

<fieldset>

<a href="{{url('/gallery/'.$id.'/addnew')}}" class="btn btn-primary"> Add New</a>
<hr>
<div class="form-group">


<span><label ><b><i>Gallery Images</i></b></label></span>
<br><br>

<div id="image_preview" class="colum">


@foreach($gallery as $multimg)




<img src="{{ asset($multimg->gallerypath()) }}" width="100" height="auto" id="{{$multimg->id}}" class="img">
<a href="#" class="del" id="{{$multimg->id}}" ><i class="fa fa-trash" style="color:red;"></i></a>

@endforeach





</div>
<br>
<a href="/packages" class="btn btn-primary">Back</a>
</div>

</div>
<br>




</div>


</form>
</fieldset>
</div>
</div>
@endsection('content')
@section('footer.script')



<script>

$(document).ready(function(){
	
	// Delete
	$('.del').click(function(){
		var id = this.id;
		
		console.log(id);
		var split_id = id.split("_");
		
		// Selecting image source
		
		
		// AJAX request
		
		$.get("/deletegallery/"+id, function(data, status){
			
			location.reload();
			
		});
		
	});
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
