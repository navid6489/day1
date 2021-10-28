<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
      <ul class="nav navbar-nav">
        <li>
          @if(Session::get('id')=='1')
          <a href="/adminhome">Home</a>
          @elseif(Session::get('id')=='2')
          <a href="/studenthome">Home</a>
          @elseif(Session::get('id')=='3')
          <a href="/teacherhome">Home</a>
          @endif
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        
        <li> @if(Session::get('id'))
          {{Session::forget('id');}}
          <a href="/">
            <span class="glyphicon glyphicon-log-in"></span>Logout</a>
         @endif<span class="glyphicon glyphicon-log-in"></span>Logout</a>
         
        </li>
      </ul>
    </div>
  </nav>
<h2>Welcome Teacher</h2>



</body>
</html>
