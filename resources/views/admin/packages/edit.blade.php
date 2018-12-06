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
			<h3 class="page-header">Edit Tour Package</h3>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-6">
				
				<form method="Post" action="{{ url('/packages/'.$packages->id.'/update') }}" name="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<fieldset >
						
						<div class="form-group">
							<label for="tour_categories_id">Tour Category</label>
							<select id="tour_categories_id" name="tour_categories_id" class="form-control"  >
								
								@foreach(App\TourCategory::all() as $category) 
								<option value="{{$category->id}}" {{$category->id ==$packages->tour_categories_id ? 'selected' : ''}}>

								{{$category->name}}
									


								</option>
								@endforeach
								
							
							</select>
						</div>

						<div class="form-group">
							<label for="locations_id"> Location</label>
							<select id="locations_id" name="locations_id" class="form-control"  >
								
								@foreach(App\Location::all() as $location) 
								<option value="{{$location->id}}" {{$location->id ==$packages->locations_id ? 'selected' : ''}}>

								{{$location->name}}
									


								</option>
								@endforeach
								
							
							</select>
						</div>

						
						<div class="form-group">
						<label for="tour_leaders_id">*Tour leader</label>
						<select id="tour_leaders_id" name="tour_leaders_id" class="form-control">

						@foreach(App\Tourleader::all() as $leader) 
						<option value="{{$leader->id}}" {{$leader->id ==$packages->tour_leaders_id ? 'selected' : ''}}>

					{{$leader->name}}



					</option>
					@endforeach


					</select>
						</div>


						<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
							<label for="name">Name:</label>
							<input class="form-control"  name="name" id="name" type="text" placeholder="Name" value="{{old('name', $packages->name)}}">
						</div>
						<div class="form-group {{ $errors->has('short_description') ? 'has-error' : '' }}">
							<label class="control-label" for="short_description">Description
							</label> 
							<textarea   name="short_description" class="summernote" class="textarea"> {{ old('short_description', $packages->short_description) }}</textarea>
							
							<!--  <div id="btn"></div> -->
							<p class="text-danger">{{ $errors->first('short_description') }}</p>
						</div>

						<div class="form-group {{ $errors->has('service') ? 'has-error' : '' }}">
							<label class="control-label" for="service">Service
							</label> 
							<textarea   name="service" class="summernote" class="textarea"> {{ old('service', $packages->service) }}</textarea>
							
							<!--  <div id="btn"></div> -->
							<p class="text-danger">{{ $errors->first('service') }}</p>
						</div>



						<div class="form-group {{ $errors->has('duration') ? 'has-error' : '' }}">
						<label for="duration">Duration:</label>
						<input class="form-control"  name="duration" id="duration" type="text" placeholder="Duration" value="{{old('duration', $packages->duration)}}">
						</div>


							<div class="form-group">
							<label>Package Image</label>
							<div class="form-group">

								<input type="file"  id="uploadFile" name="image">
								<br> <br>
								

								<div id="image_preview">
									<img src="{{ asset($packages->packagepath()) }}" width="100" height="auto">
								</div>

							</div>

							<div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
							<label for="price">Price:</label>
							<input class="form-control"  name="price" id="price" type="text" placeholder="Price" value="{{ old('price', $packages->price)}}">
</div>

							<div class="form-group {{ $errors->has('lat') ? 'has-error' : '' }}">
							<label for="lat">Lat:</label>
							<input class="form-control"  name="lat" id="lat" type="text" placeholder="Lat" value="{{ old('lat', $packages->lat)}}">
						</div>

						<div class="form-group {{ $errors->has('long') ? 'has-error' : '' }}">
							<label for="long">Long:</label>
							<input class="form-control"  name="long" id="long" type="text" placeholder="Long" value="{{old('long', $packages->long)}}">
						</div>

							<div class="checkbox" {{ $errors->has('p_status') ? 'has-error' : ''}}>
                            <label>
                               
                                    <input type="checkbox" name="p_status" value="1" @if(old('p_status' , $packages->p_status)=="1") checked @endif > P_Status
                                        
                                

                            </label>
                        </div>
							


						</div>

						<button type="submit" class="btn btn-primary">Save Changes</button>

						<a href="/packages" class="btn btn-default">Back</a>
					</fieldset>
				</form>


			</div>
		</div>
	</div>
</div>
@endsection ('content')

@section('footer.script')

<script>

$('.summernote').summernote({
	toolbar: [
// [groupName, [list of button]]
['style', ['bold', 'italic', 'underline', 'clear']], 
['fontsize', ['fontsize']],
	['color', ['color']], 
	['para', ['ul', 'ol', 'paragraph']],
],
height: 200,
minHeight: 100,
maxHeight: 400,
fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150']



});

</script>


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




