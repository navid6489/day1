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
.row{
    margin-top: 15px;
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
<h2>Teacher Signup Form</h2>

<form id="loginform" method="post" enctype="multipart/form-data" >
  @csrf

  <div class="container">
   
    <div class="row">
        <label for="name"><b>name</b></label>
        <input type="text" placeholder="Enter Username" id="name" name="name" required>
    </div>
   
    <div class="row">
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>
    </div>
    <div class="row">
        <label for="email"><b>email</b></label>
        <input type="email" placeholder="Enter email" name="email" id="email" required>
    </div>
   
    <div class="row">
        <label for="address"><b>address:</b></label>
        <textarea id="address" name="address" rows="4" cols="50"></textarea>
    </div>
   
<div class="row">
    <label for="dp"><b>profile picture</b></label>
    <input type="file"  name="dp" id="dp" required>
</div>
  
    <div class="row">
        <label for="currentschool"><b>currentschool</b></label>
        <input type="text" placeholder="Enter current school" name="currentschool" id="currentschool" required>
    </div>
   
    <div class="row">
        <label for="previousschool"><b>previousschool</b></label>
        <input type="text" placeholder="Enter previous school" name="previousschool" id="previousschool" required>
    </div>
   
    <div class="row">
        <label for="experienceinyears"><b>experienceinyears</b></label>
        <input type="text" placeholder="Enter experience in years" name="experienceinyears" id="experienceinyears" required>
    </div>
   
    <div class="row">
        <label for="expertiseinsubjects"><b>expertiseinsubjects</b></label>
    <input type="text" placeholder="Enter expertise in subjects" name="expertiseinsubjects" id="expertiseinsubjects" required>
    </div>
    
    <div class="row">
        <input type="hidden" id="roleflag" name="roleflag" value="2">
    </div>
   
    <button type="submit">Sign UP</button>
   
  </div>

 
</form>

</body>
<script>
    	


        $("#loginform").submit(function (event) {
            var formData = new FormData(document.getElementById("loginform"));
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

      type: "POST",
      url: "/teacherstore",
      data: formData,
      
      
      
                    contentType: false,
                    processData: false,
         success: function(result){
        
                //console.log(result);
              if(result==1){
                  
                alert("signup Successfull");
                  }
                  else
                  {
                   
                    alert("signup Failed");
                  }
     }
      
    })

    event.preventDefault();
  });
    </script>
</html>
