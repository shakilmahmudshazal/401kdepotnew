<form action="{{URL::to('/edit-quotation')}}/{{$request->id}}" method="post" id="myForm">
	@csrf
	<label>you need help with: </label>
                    <input type="text" name="subject" value="{{$request->subject}}" required>
                    <br>
                    <label>Details: </label>
                    <textarea rows="5" cols="50" name="details" required>{{$request->details}}</textarea>
                    <br>
                    <label>your Name: </label>
                    <input type="text" name="name" value="{{$request->name}}" required>
                    <br>
                    <label>your Email </label>
                    <input type="email" name="email" value="{{$request->email}}" required>
                    <br>
                    <label>your Phone: </label>
                    <input type="text" name="phone" value="{{$request->phone}}" required>
                    <br>
                    <label>your City: </label>
                    <input type="text" name="city" value="{{$request->city}}" required>
                    <br>
                    <label>your state: </label>
                    <input type="text" name="state" value="{{$request->state}}" required>
                    <br>
                    <label>your Zip Code: </label>
                    <input type="text" name="zipcode" value="{{$request->zipcode}}" required>
                    <br>
</form>
<script>
	$('.modal-title').html('Update Request');
	$(".btn-submit-action").on('click',function(){
		$("#myForm").submit();
	});
</script>