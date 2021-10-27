<!DOCTYPE html>
<html>
<head>
  
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

<h2>Student SignUp Form</h2>

<form id="loginform"  method="post" enctype="multipart/form-data">
  @csrf

  <div class="container">
    <div class="row">
        <label for="name"><b>name</b></label>
        <input type="text" placeholder="Enter Username" id="name" name="name" required>
    </div>
  
    <div class="row">
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="password" required>
    </div>
    <div class="row">
        <label for="email"><b>email</b></label>
        <input type="email" placeholder="Enter email" name="email" id="email" required>
    </div>
   
    <div class="row">
        <label for="address">address:</label>
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
        <label for="parentsdetails"><b>parentsdetails</b></label>
    <textarea id="parentsdetails" name="parentsdetails" rows="4" cols="50"></textarea>
    </div>
   <div class="row">
    <label for="assignedteacher"><b>assignedteacher</b></label>
    <input type="text" placeholder="Enter assigned teacher" name="assignedteacher" id="assignedteacher" required>
   </div>
    
   
    <input type="hidden" id="roleflag" name="roleflag" value="2">
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
      url: "/studentstore",
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
