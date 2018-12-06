@extends ('admin-layouts.master')

@section('header')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

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
			<h3 class="page-header"> Delete Tour Leader</h3>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-6">
				<h4>Tour Leader</h4>
				<fieldset>

					
					
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label class="control-label" for="name">Name :</label>
						<input type="text" name="name" class="form-control" placeholder="Name..." value="{{ old('name', $tourleaders->name) }}" disabled>
						<p class="text-danger">{{ $errors->first('name') }}</p>
					</div>

					<div class="form-group {{ $errors->has('education') ? 'has-error' : '' }}">
						<label class="control-label" for="name">Education :</label>
						<input type="text" name="education" class="form-control" placeholder="Education..." value="{{ old('education', $tourleaders->education) }}" disabled>
						<p class="text-danger">{{ $errors->first('education') }}</p>
					</div>


					<div class="form-group">
						<label>Profile Image</label>
						<div class="form-group">

							<input type="file"  id="uploadFile" name="profile" disabled>
							<br>
							<br>

							<div id="image_preview">
								<img src="{{ asset($tourleaders->profilepath()) }}" width="100" height="auto">
							</div>

						</div>




					</div>


					<div class="form-group {{ $errors->has('short_description') ? 'has-error' : '' }}">
						<label class="control-label" for="short_description">Description
						</label> 
						<textarea id="summernote"  name="short_description" class="form-control" class="textarea" disabled> {{ old('short_description', $tourleaders->short_description) }}</textarea>

						<!--  <div id="btn"></div> -->
						<p class="text-danger">{{ $errors->first('short_description') }}</p>
					</div>

					<div class="form-group">

						<label>Specialist :</label>
						<select class="form-control" multiple="multiple" id="js-example-tags" name="special[]" disabled>
							
							@foreach($myArray as $leader)

							<option selected="selected" value="{{$leader}}" disabled>{{$leader}}</option>

							@endforeach




						</select>
					</div>

					<br><br>




					<div class="form-group">

						<form action="{{url('/tourleaders/destroy/'.$tourleaders->id) }}" method="POST" style="display: inline;" 
							id="delete-form">
							{{ csrf_field() }} 

							<button type="submit" class="btn btn-danger" id="delete-btn" >
								Remove

							</button>
						</form>

						<a href="{{url('/tourleaders') }}" class="btn btn-default">Cancel</a>     
					</div>


					
				</fieldset>
			</div>
		</div>






		@endsection ('content')

		@section('footer.script')

		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
		
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

