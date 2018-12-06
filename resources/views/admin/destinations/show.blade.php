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
			<h3 class="page-header"> Destination</h3>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-6">
				
				<fieldset >

					<div class="form-group">
							<label for="locations_id"> Location</label>
							<select id="locations_id" name="locations_id" class="form-control"  >
								
								@foreach(App\Location::all() as $location) 
								<option value="{{$location->id}}" {{$location->id ==$destinations->locations_id ? 'selected' : ''}} disabled>

								{{$location->name}}
									


								</option>
								@endforeach
								
							
							</select>
						</div>


					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label for="name">Name:</label>
						<input class="form-control"  name="name" id="name" type="text" placeholder="Name" value="{{old('name', $destinations->name)}}" disabled>
					</div>
					<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
						<label class="control-label" for="description">Description
						</label> 
						<textarea id="summernote"  name="description" class="form-control" class="textarea" disabled> {{ old('description', $destinations->description) }}</textarea>
						<br>
						<!--  <div id="btn"></div> -->
						<p class="text-danger">{{ $errors->first('description') }}</p>
					</div>

						<div class="form-group">
							<label>Package Image</label>
							<div class="form-group">

								<input type="file"  id="uploadFile" name="image" disabled>
								<br>
								<br>

								<div id="image_preview">
									<img src="{{ asset($destinations->destinationspath()) }}" width="100" height="auto">
								</div>

							</div>

							<div class="checkbox" {{ $errors->has('p_status') ? 'has-error' : ''}}>
                            <label>
                               
                                    <input type="checkbox" name="p_status" value="1" @if(old('p_status' , $destinations->p_status)=="1") checked @endif disabled> P_Status
                                        
                                

                            </label>
                        </div>
											
							


						</div>

					<div class="form-group">

						<form action="{{url('admin/destinations/'.$destinations->id.'/destroy') }}" method="POST" style="display: inline;" 
							id="delete-form">
							{{ csrf_field() }} 

							<!-- <button type="submit" class="btn btn-danger" id="delete-btn" >
								Remove

							</button> -->
						</form>

						<a href="{{url('/admin/destinations') }}" class="btn btn-primary">Cancel</a>     
					</div>

				</fieldset>
			</form>


		</div>
	</div>
</div>
</div>
@endsection ('content')
@section('footer.script')
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


