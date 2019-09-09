<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 <h1>Mail Confirmation</h1>
 <a href="">hi there</a>
 Your registered email-id is {{$user['email']}} , Please click on the below link to verify your email account
 <a href="{{url('user/verify',$user->verifyUser->token)}}">Verify Email</a>
</body>
</html>