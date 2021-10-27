<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>

/*tab styling*/
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  
  border-top: none;
}
</style>
</head>
<body>

<h2>Welcome Admin</h2>

<div class="tab">
  <button class="tablinks" onclick="openRequests(event, 'Student')">Student</button>
  <button class="tablinks" onclick="openRequests(event, 'Teachers')">Teachers</button>
 
</div>

<div id="Student" class="tabcontent">
  <h3>Student</h3>
  <table class="table table-bordered table-responsive-lg">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>email</th>
        <th>address</th>
        <th>profilepicture</th>
        <th>currentschool</th>
  <th>previousschool</th>
  <th>parentsdetails</th>
  <th>assignedteacher</th>
  <th>Approved</th>
  <th style="column-span:2; ">Actions</th>
    </tr>
    @foreach ($studentrequests as $studentrequests2)
        <tr>
            <td>{{$studentrequests2->id}}</td>
            <td>{{$studentrequests2->name}}</td>
            <td>{{$studentrequests2->email}}</td>
            <td>{{$studentrequests2->address}}</td>
            <td>{{$studentrequests2->profilepicture}}</td>
     <td>{{$studentrequests2->currentschool}}</td>
            <td>{{$studentrequests2->previousschool}}</td>
            <td>{{$studentrequests2->parentsdetails}}</td>
            <td>{{$studentrequests2->assignedteacher}}</td>
            <td>{{$studentrequests2->approveflag}}</td>
            <td><a class='btn btn-primary' href="<?php echo url('/studedit')?>/{{$studentrequests2->id}}">Edit</a></td>
    <td><a type="button" class='btn btn-danger'  onclick="deletedata('{{$studentrequests2->id}}')" >delete</a></td>
    
            
        </tr>
    @endforeach
</table>
</div>

<div id="Teachers" class="tabcontent">
  <h3>Teachers</h3>
  <table class="table table-bordered table-responsive-lg">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>email</th>
        <th>address</th>
        <th>profilepicture</th>
        <th>currentschool</th>
  <th>previousschool</th>
  <th>experienceinyears</th>
  <th>expertiseinsubjects</th>
  <th>Approved</th>
  <th>Actions</th>
    </tr>
    @foreach ($teacherrequests as $teacherrequests2)
        <tr>
            <td>{{$teacherrequests2->id}}</td>
            <td>{{$teacherrequests2->name}}</td>
            <td>{{$teacherrequests2->email}}</td>
            <td>{{$teacherrequests2->address}}</td>
            <td>{{$teacherrequests2->profilepicture}}</td>
     <td>{{$teacherrequests2->currentschool}}</td>
            <td>{{$teacherrequests2->previousschool}}</td>
            <td>{{$teacherrequests2->experienceinyears}}</td>
      <td>{{$teacherrequests2->expertiseinsubjects}}</td>
            <td>{{$teacherrequests2->approveflag}}</td>
            <td><a class='btn btn-primary' href="<?php echo url('/teacheredit')?>/{{$teacherrequests2->id}}">Edit</a></td>
            <td><a type="button" class='btn btn-danger'  onclick="teacherdeletedata('{{$teacherrequests2->id}}')" >delete</a></td>
   
            
        </tr>
    @endforeach
</table> 
</div>



<script>
function openRequests(evt, recordtype) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(recordtype).style.display = "block";
  evt.currentTarget.className += " active";
}

function teacherdeletedata(id) {
  $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },

      type: "POST",
      url: "<?php echo url('/teacherdelete')?>/"+id,
      data: id,
         success: function(result){
        
                //console.log(result);
              if(result==1){
                  
                alert("teacher Deleted Successfully");
                window.location.reload(true);
                  }
                  else
                  {
                   
                    alert("teacher Deletion Failed");
                  }
     }
      
    })
}
</script>

</body>
</html>
