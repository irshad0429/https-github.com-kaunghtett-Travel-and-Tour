@extends ('admin-layouts.master')
@section('header')


<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

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
			<h3 class="page-header">Edit Destination</h3>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-6">
				
            <form method="Post" action="{{ url('/booking/'.$bookings->id.'/update') }}" name="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<fieldset >
						
						
						
<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
<label class="control-label" for="username">UserName:</label>
<input type="text" name="username" class="form-control"  placeholder="Username ..." value="{{ old('username', $bookings->username) }}">
<p class="text-danger">{{ $errors->first('username') }}</p>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
<label class="control-label" for="email">Email</label>
<input type="email" name="email" class="form-control" placeholder="Email ..." value="{{ old('email', $bookings->email) }}">
<p class="text-danger">{{ $errors->first('email') }}</p>
</div>

<div class="form-group {{ $errors->has('from') ? 'has-error' : '' }}">
<label class="control-label" for="email">Where are you come from?</label>
<input type="text" name="from" class="form-control" placeholder="from ..." value="{{ old('from', $bookings->from) }}">
<p class="text-danger">{{ $errors->first('from') }}</p>
</div>


<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
<label class="control-label" for="phone">Phone:</label>
<input type="text" name="phone" class="form-control"  placeholder="phone ..." value="{{ old('phone', $bookings->phone) }}">
<p class="text-danger">{{ $errors->first('phone') }}</p>
</div>



<div class="form-group {{ $errors->has('tour_packages_id') ? 'has-error' : '' }}">
<!-- <label class="control-label" for="tour_packages_id">tour_packages_id:</label> -->
<input type="hidden" name="tour_packages_id" class="form-control"  placeholder="tour_packages_id ..." value="{{ old('tour_packages_id', $bookings->tour_packages_id) }}">
<p class="text-danger">{{ $errors->first('tour_packages_id') }}</p>
</div>

<div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
<label class="control-label" for="quantity">quantity:</label>
<input type="number" name="quantity" class="form-control"  placeholder="quantity ..." value="{{ old('quantity', $bookings->quantity) }}">
<p class="text-danger">{{ $errors->first('quantity') }}</p>
</div>

<div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
<label class="control-label" for="status">Status:</label>
<select name="status" >
 <option value="confirmed" @if(old('status', $bookings->status)=="confirmed") selected @endif>Confirmed</option>
 <option value="deposit" @if(old('status', $bookings->status)=="deposit") selected @endif >Deposit</option>
 <option value="pending" @if(old('status', $bookings->status)=="pending") selected @endif >Pending</option>
 <option value="paid" @if(old('status', $bookings->status)=="paid") selected @endif>Paid</option>
 <option value="cancel" @if(old('status', $bookings->status)=="cancel") selected @endif>Cancel</option>
 </select>
<p class="text-danger">{{ $errors->first('status') }}</p>
</div> 

<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
<label class="control-label" for="address">Details
</label> 
<textarea  name="address" class="form-control" class="textarea" > {{ old('address', $bookings->address) }}</textarea>

<!--  <div id="btn"></div> -->
<p class="text-danger">{{ $errors->first('address') }}</p>
</div>

<div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
<label class="control-label" for="date">Date:</label>
<input type="text" name="date" id="bdate" class="form-control"  placeholder="date ..." value="{{old('date',date('d-m-Y', strtotime($bookings->date)))}}">
<p class="text-danger">{{ $errors->first('date') }}</p>
</div>

							
   
 <button type="submit" class="btn btn-primary">Save Changes</button>

<a href="/booking" class="btn btn-default">Back</a>
<br> <br>

		</div>
                         
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

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script>
$(document).ready(function () {
    
        bdate = $("#bdate")
        .datepicker({
            dateFormat:'dd-mm-yy',
        });
});
</script>

@stop




