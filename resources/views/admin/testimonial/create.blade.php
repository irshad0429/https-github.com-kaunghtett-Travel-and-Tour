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
			<h3 class="page-header">Create Testimonail</h3>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-6">
			
				<fieldset>

					
					<form method="Post" action="{{ url('/testimonial') }}" name="post" enctype="multipart/form-data">
						{{ csrf_field() }}

					

						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							<label class="control-label" for="name">Name :</label>
							<input type="text" name="name" class="form-control" placeholder="Name..." value="{{ old('name') }}">
							<p class="text-danger">{{ $errors->first('name') }}</p>
						</div>

						

						

						<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
							<label class="control-label" for="description">Description
							</label> 
							<textarea id="summernote"  name="description" class="form-control" class="textarea"> {{ old('description') }}</textarea>
							
							<!--  <div id="btn"></div> -->
							<p class="text-danger">{{ $errors->first('description') }}</p>
						</div>

                        
						<div class="form-group">
							<label>Profile Image</label>
							<div class="form-group">
								<input type="file"  id="uploadFile" name="image">
								<br>
								<br>

								<div id="image_preview">

								</div>

							</div>
							
							
						</div>

						
						<div class="checkbox">
						<label>
						<input type="checkbox" name="status" ? 1=="active" : 0==null >P_Status

						</label>

						</div>
						


						<div class="form-group">
							<button class="btn btn-success">Save</button>

							<a href="/testimonial" class="btn btn-primary">Back</a>
						</div>

					



					</form>
				</fieldset>
			</div>
		</div>






		@endsection ('content')

		@section('footer.script')

		
		<script>
			$("#js-example-tags").select2({
				tags: true,
				tokenSeparators: [',', ' ']

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

$('#summernote').summernote({
	toolbar: [
// [groupName, [list of button]]
['style', ['bold', 'italic', 'underline', 'clear']],
['fontsize', ['fontsize']],
    ['color', ['color']],  
],
height: 200,
minHeight: 100,
maxHeight: 400




});

</script>



@stop

