
<!-- {{-- <!doctype html>
<html lang="en">
  <head>
    <title>Email</title>
  </head>
  <body>
        <h4>User name :</h4> <h3>{{ $name }}</h3>
        <h3>User Email :</h4> <h3>{{ $email }}</h3>
        <h4>User discussion :</h4> <h3>{{ $subject }}</h3>
        <h4>user Message :</h4> <h3>{{ $form_message }}</h3>    
  </body>
</html> --}}
 -->
<!doctype html>
<html lang="en">
  <head>
    <title>Email</title>
  </head>
  <body>

    <h2>Forget Password Email</h2>
       
      <h4>User Email :</h4> <h3>{{ $email }}</h3><br>
      <h3>Click this button to redirect Reset password page.</h3><br>
      <a href="{{ route('ResetPasswordGet', $tokens) }}" class="btn btn-primary"><button class="button">Reset Password</button></a> 
          
  </body>
</html>




{{-- <h1>Forget Password Email</h1>
   
You can reset password from bellow link:
<a href="{{ route('reset.password.get', $token) }}">Reset Password</a>  --}}

{{-- <!doctype html>
<html lang="en">
  <head>
    <title>Email</title>
  </head>
  <body>
        
        <h3>User Email :</h4> <h3>{{ $email }}</h3>
        <h4>User token :</h4> <h3>{{ $token }}</h3>
       
  </body>
</html> --}}