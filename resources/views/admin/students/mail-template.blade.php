<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Contact Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 5px; padding: 5px;">

   <div class="content">
   	<h1 align="center">Your Username and password </h1>
		<div class="title m-b-md">
		 <table align="center" border="1" cellpadding="0" cellspacing="0" width="600">
		 	<tr class="mt-5" style="margin-top: 5px;">
		  		<td align="center"{{--  bgcolor="#70bbd9" --}} style="padding: 40px 0 30px 0;">
			  		<td bgcolor="#08a9af">User Name :- {{$data['username']}}<br>You can login using Emial Address ({{$data['email']}})</td><br><br>
			  		<td bgcolor="#08a9af">Password :- {{$data['password']}}</td><br><br>
			  		{{-- <td bgcolor="#08a9af">Message :- {{$data['message']}}</td> --}}
			  		
				</td>
			</tr>
		</table>
		<a href="{{$data['base_url']}}" style="background: #136D40;" class="btn btn-success">Login Here!</a>
	</div>
</div>
</body>
</html>