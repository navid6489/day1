<!DOCTYPE html>
<html>
<head>
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
        
        <li>
          @if(Session::get('id'))
          {{Session::forget('id');}}
          <a href="/"><span class="glyphicon glyphicon-log-in"></span>Logout</a>
         @endif
        </li>
      </ul>
    </div>
  </nav>
<h2>Welcome student</h2>



</body>
</html>
