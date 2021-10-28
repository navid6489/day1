<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
  
<div class="container">
  <h3>WELCOME TO DAY 1 TASK</h3>
  <p>LOGIN OR SIGNUP TO CONTINUE</p>
</div>

</body>
</html>
