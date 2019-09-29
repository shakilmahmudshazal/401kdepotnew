@extends('layouts.master')
@section('content')

<form action="/editBackground" method="POST">
	@csrf
	<div class='form-group'>
		<label for="headline">Headline: </label>
		<input id="headline" type="text" name="headline" class="form-control" value="@if(!empty($background->headline)){{$background->headline}}@endif ">
		
	</div>
	<div class="form-group">
                    <label for="details">Body Details :</label>
                    <textarea name="details" id="details" cols="30" rows="6" class="form-control" >@if(!empty($background->details)){{$background->details}}@endif </textarea>
                </div>


     <div class='form-group'>
		<label for="slideOneHeadline">Slide One Headline: </label>
		<input id="slideOneHeadline" type="text" name="slideOneHeadline" class="form-control" value="@if(!empty($background->slideOneHeadline)){{$background->slideOneHeadline}}@endif ">
		
	</div>
	<div class="form-group">
                    <label for="slideOneDetails">Slide One Details :</label>
                    <textarea name="slideOneDetails" id="slideOneDetails" cols="30" rows="6" class="form-control" >@if(!empty($background->slideOneDetails)){{$background->slideOneDetails}}@endif </textarea>
                </div>

     <div class='form-group'>
		<label for="slideOneLinks">Slide One Link: </label>
		<input id="slideOneLinks" type="text" name="slideOneLinks" class="form-control" value="@if(!empty($background->slideOneLinks)){{$background->slideOneLinks}}@endif ">
		
	</div>

	
	
	<!-- //slide two -->

	<div class='form-group'>
		<label for="slideOneHeadline">Slide Two Headline: </label>
		<input id="slideTwoHeadline" type="text" name="slideTwoHeadline" class="form-control" value="@if(!empty($background->slideTwoHeadline)){{$background->slideTwoHeadline}}@endif ">
		
	</div>
	<div class="form-group">
                    <label for="slideTwoDetails">Slide Two Details :</label>
                    <textarea name="slideTwoDetails" id="slideTwoDetails" cols="30" rows="6" class="form-control" >@if(!empty($background->slideTwoDetails)){{$background->slideTwoDetails}}@endif </textarea>
                </div>

     <div class='form-group'>
		<label for="slideTwoLinks">Slide Two Link: </label>
		<input id="slideTwoLinks" type="text" name="slideTwoLinks" class="form-control" value="@if(!empty($background->slideTwoLinks)){{$background->slideTwoLinks}}@endif ">
		
	</div>

	<!-- //slide three -->
	<div class='form-group'>
		<label for="slideThreeHeadline">Slide Three Headline: </label>
		<input id="slideThreeHeadline" type="text" name="slideThreeHeadline" class="form-control" value="@if(!empty($background->slideThreeHeadline)){{$background->slideThreeHeadline}}@endif ">
		
	</div>
	<div class="form-group">
                    <label for="slideThreeDetails">Slide Three Details :</label>
                    <textarea name="slideThreeDetails" id="slideThreeDetails" cols="30" rows="6" class="form-control" >@if(!empty($background->slideThreeDetails)){{$background->slideThreeDetails}}@endif </textarea>
                </div>

     <div class='form-group'>
		<label for="slideThreeLinks">Slide Three Link: </label>
		<input id="slideThreeLinks" type="text" name="slideThreeLinks" class="form-control" value="@if(!empty($background->slideThreeLinks)){{$background->slideThreeLinks}}@endif ">
		
	</div>

	<!-- div one -->

	<div class='form-group'>
		<label for="divOneHeadline">Div One Headline: </label>
		<input id="divOneHeadline" type="text" name="divOneHeadline" class="form-control" value="@if(!empty($background->divOneHeadline)){{$background->divOneHeadline}}@endif ">
		
	</div>
	<div class="form-group">
                    <label for="divOneDetails">Div One Details :</label>
                    <textarea name="divOneDetails" id="divOneDetails" cols="30" rows="6" class="form-control" >@if(!empty($background->divOneDetails)){{$background->divOneDetails}}@endif </textarea>
                </div>
 <!-- div two -->
 <div class='form-group'>
		<label for="divTwoHeadline">Div Two Headline: </label>
		<input id="divTwoHeadline" type="text" name="divTwoHeadline" class="form-control" value="@if(!empty($background->divTwoHeadline)){{$background->divTwoHeadline}}@endif ">
		
	</div>
	<div class="form-group">
                    <label for="divTwoDetails">Div Two Details :</label>
                    <textarea name="divTwoDetails" id="divTwoDetails" cols="30" rows="6" class="form-control" >@if(!empty($background->divTwoDetails)){{$background->divTwoDetails}}@endif </textarea>
                </div>

<!-- div three -->
<div class='form-group'>
		<label for="divThreeHeadline">Div Three Headline: </label>
		<input id="divThreeHeadline" type="text" name="divThreeHeadline" class="form-control" value="@if(!empty($background->divThreeHeadline)){{$background->divThreeHeadline}}@endif ">
		
	</div>
	<div class="form-group">
                    <label for="divThreeDetails">Div Three Details :</label>
                    <textarea name="divThreeDetails" id="divThreeDetails" cols="30" rows="6" class="form-control" >@if(!empty($background->divThreeDetails)){{$background->divThreeDetails}}@endif </textarea>
                </div>
<!-- div four -->
<div class='form-group'>
		<label for="divFourHeadline">Div Four Headline: </label>
		<input id="divFourHeadline" type="text" name="divFourHeadline" class="form-control" value="@if(!empty($background->divFourHeadline)){{$background->divFourHeadline}}@endif ">
		
	</div>
	<div class="form-group">
                    <label for="divFourDetails">Div Four Details :</label>
                    <textarea name="divFourDetails" id="divFourDetails" cols="30" rows="6" class="form-control" >@if(!empty($background->divFourDetails)){{$background->divFourDetails}}@endif </textarea>
                </div>



	<div class="form-group">
		<input type="submit" name="submit" value="Save">
		
	</div>

	
	
	

</form>



@endsection