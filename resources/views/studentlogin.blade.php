<!DOCTYPE html>
<html>
<head>
  
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">DAY1 TASK</a>
      </div>
      
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
         <ul class="dropdown-menu">
            <li><a href="/studentsignup"><span class="glyphicon glyphicon-user"></span>student signup</a></li>
            <li><a href="/teachersignup"><span class="glyphicon glyphicon-user"></span>teacher signup</a></li>
          </ul>
        </li>
        <li><a class="dropdown-toggle" data-toggle="dropdown"  href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a>
         <ul class="dropdown-menu">
          <li><a href="/adminlogin"><span class="glyphicon glyphicon-log-in"></span>admin login</a></li>
            <li><a href="/studentlogin"><span class="glyphicon glyphicon-log-in"></span>student login</a></li>
            <li><a href="/teacherlogin"><span class="glyphicon glyphicon-log-in"></span>teacher login</a></li>
             
          </ul>
        </li>
      </ul>
    </div>
  </nav>
<h2>Student Login Form</h2>

<form id="loginform" action="javascript:void(0)" >
  @csrf

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" id="username" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>
    <input type="hidden" id="roleflag" name="roleflag" value="3">
    <button type="submit">Login</button>
   
  </div>

 
</form>

</body>
<script>
    	


        $("#loginform").submit(function (event) {
           
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      type: "POST",
      url: "/logincheck",
      data: $('#loginform').serialize(),
      dataType: "json",
         success: function(result){
        

              if(result.status=='success'){
                  
                window.location.href = '<?php echo url('/studenthome')?>';
                  }
                  else
                  {
                   
                    alert("Login Failed");
                  }
     }
      
    })

    event.preventDefault();
  });

    </script>
</html>
