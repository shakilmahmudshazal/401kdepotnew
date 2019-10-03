<!DOCTYPE html>
<html>
<head>
	<title>Submit Your Request</title>
	@include('layouts.links')

</head>
<body>
	@include('layouts.navbar')
	@include('layouts.popup')

	<br> <br>
	<br> <br>
	<br> <br>

	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-3">
                @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                <div id="request-proposal">
                    <h3>Here submit your Request .we will find a advisror for you</h3>
                    
                    <form action="/submitRequest" method="post">
                    @csrf
                       
                        <label>you need help with: </label>
                    <input class="form-control" type="text" name="subject" required>
                    <br>
                    <label>Details: </label>
                    <textarea class="form-control" rows="5" cols="50" name="details" required></textarea>
                    <br>
                    <label>your Name: </label>
                    <input class="form-control" type="text" name="name" required>
                    <br>
                    <label>your Email </label>
                    <input class="form-control" type="email" name="email" required>
                    <br>
                    <label>your Phone: </label>
                    <input class="form-control" type="text" name="phone" required>
                    <br>
                    <label>your City: </label>
                    <input class="form-control" type="text" name="city" required>
                    <br>
                    <label>your state: </label>
                    <input class="form-control" type="text" name="state" required>
                    <br>
                    <label>your Zip Code: </label>
                    <input class="form-control" type="text" name="zipcode" required>
                    <br>
                    
                        <input type="submit" class="btn btn-primary form-control" value="REQUEST PROPOSAL">
                    </form>
                </div>


            </div>
        </div>
    </div>

		</div>

	</div>

	@include('layouts.footer')


</body>
</html>