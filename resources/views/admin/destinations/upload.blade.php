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
      display: inline-grid;
	  
    }
    #image_preview{
		column-count: 2;
      border: 1px solid #ccc;
      padding: 10px;
    }
    #image_preview img{
			
      width: 200px;
      padding: 5px;
    }
  </style>
  
@endsection('header')

@section('content')
<div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h3 class="page-header">Gallery</h3>
</div>
<!-- /.col-lg-12 -->
</div>
<div class="row">
<div class="col-lg-12">
<div class="col-lg-6">

<fieldset>
<form method="Post" action="{{ url('/admin/destinations-gallery/'.$id)}}" name="post" enctype="multipart/form-data">
						{{ csrf_field() }}

						<div class="form-group">
							<label>Upload Images</label>
							<div class="form-group">
								<input type="file"  id="uploadFile" name="image[]" multiple="multiple">
								<br>
								<br>

							<div id="image_preview" >
								<div id="col-md-12"></div>
							</div>
							
							</div>
						
					</div>

                    
					<div class="form-group">
						<button class="btn btn-success">Save</button>

						<a href="{{url('/admin/destinations-gallery/'.$id)}}" class="btn btn-primary">Back</a>
					</div>


</form>
</fieldset>
</div>
</div>
@endsection('content')
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

@stop
