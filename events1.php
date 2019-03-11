

<?php include'connection.php';

  

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>events</title>
	<link rel="stylesheet" href="btsr.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <style type="text/css">
    table,th,td{
      border:1px solid black;
      /*border-collapse: collapse;*/
      width: 70%;
    }
    th,td{
      padding: 5px;
    }
    }
    .button {
    background-color: #4CAF50; /* Green */
    border: none;

    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}

.button1:hover {
    background-color: #4CAF50;
    color: white;
}
.content: {
  margin: auto;
}

  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "input" ).checkboxradio();
  } );
  </script>
</head>
<body >
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">NGO</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">HOME</a>
    </li>
    <!-- <li class="nav-item"> -->
      <!-- <a class="nav-link" href="donation.php">DONATION</a> -->
    <!-- </li> -->
    <li class="nav-item">
      <a class="nav-link" href="events1.php">EVENTS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="donor_info1.php">DONOR INFO</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link" href="aboutus.php">ABOUT US</a>
    </li>

  </ul>
   <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link"  data-toggle="modal" data-target="#exampleModalLong" >request a event</a>
    </li>
  </ul>
 <!--  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" style="background-color: #0fae82">
 request an event
</button>    </li>
  </ul> -->
</nav>


<!--<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
   <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="" alt="Second slide" style="width: 100%" height="400">
    </div>
    <div class="carousel-item ">
      <img class="d-block img-fluid" src="" alt="First slide" style="width: 100%" height="400">
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="" alt="Second slide" style="width: 100%" height="400">
    </div>
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

-->
<div class="container" >
<h3>Select a date to search the events from below</h3>

<form action="events1.php" method="POST">
  Date
  <input type="date" name="date"  ><br><br>
  <label><h3>Select the branch</h3></label><br>
<!-- <input type="checkbox" name=choice[] value='v'>Vaniavad  &nbsp
<input type="checkbox" name=choice[] value='s'>Santram road  &nbsp
<input type="checkbox" name=choice[] value='m'>Mill road  &nbsp</br></br>
 -->

 <fieldset>
   
    <label for="checkbox-1">vaniavad</label>
    <input type="checkbox" name="choice[]" id="checkbox-1"  value='v' class="btn btn-primary btn-lg">&nbsp  &nbsp
    <label for="checkbox-2">santram road</label> 
    <input type="checkbox" name="choice[]" id="checkbox-2"  value='s' class="btn btn-primary btn-lg"> &nbsp  &nbsp
    <!-- <label for="checkbox-3">mill road</label> -->
    <!-- <input type="checkbox" name="choice[]" id="checkbox-3"  value='m'> -->
    
  </fieldset>
<input type="submit" name="submit" class="btn btn-dark" >
</form>
<br>
<br>

<?php 
  if(filter_has_var(INPUT_POST,'submit'))
  {
    $date = ($_POST['date']);
      if(!empty($_POST['date']))
      {
        if(!empty($_POST['choice']))
        {
          foreach ($_POST['choice'] as $choice ) 
          {
            if($choice=='v')
            {

              $query=mysqli_query($conn,"select * from events where br_name='vaniavad' and date(date)>'$date' order by date(date)");
              if(mysqli_num_rows($query)!=0)
              {
              echo '<table bgcolor=#B0E2FF  > ';
                          echo '<tr>';
                              echo '<th>'."TYPE"."&nbsp".'</th>';
                              echo '<th>'."VENUE"."&nbsp".'</th>';
                               echo '<th>'."DATE"."&nbsp".'</th>';
                                echo '<th>'."BRANCH"."&nbsp".'</th>';
                              echo '</tr>';
              }
              else

              {
                echo "NO DATA FOUND!!";
              }
              
            }
            if($choice=='s')
            {
              
              $query=mysqli_query($conn,"select * from events where br_name='santram road' and date(date)>'$date' order by date(date)");
              if(mysqli_num_rows($query)!=0)
              {
              echo '<table bgcolor=#B0E2FF>';
                          echo '<tr>';
                              echo '<th>'."TYPE"."&nbsp".'</th>';
                              echo '<th>'."VENUE"."&nbsp".'</th>';
                               echo '<th>'."DATE"."&nbsp".'</th>';
                                echo '<th>'."BRANCH"."&nbsp".'</th>';
                              echo '</tr>';
              }
              else

              {
                echo "NO DATA FOUND!!";
              }
            }
          while($row=mysqli_fetch_array($query))
          {
            
                         
               $type=$row['type'];
                $venue=$row['venue'];
                $date1=$row['date'];
                $br_name=$row['br_name'];
                //echo  '<tr>'
                //'<td>'. $type.'</td>'.'&nbsp'.'<td>'.$venue.'</td>'.'&nbsp'.'<td>'.$date1.'</td>'.'&nbsp'.'<td>'.$br_name.'</td>''</tr>';

                 echo "<tr>"
                          .'<td>'.$type."&nbsp".'</td>'. 
                          '<td>'.$venue."&nbsp".'</td>'. 
                          '<td>'.$date1."&nbsp".'</td>'. 
                          '<td>'.$br_name."&nbsp".'</td>'. 
                          //'<td>'.$amt."&nbsp".'</td>'.
                    '</tr>';
          }
          echo "<br>";
              echo "<br>";
            echo '</table>'; 
            }
           
          }
          
        }
      }
      else
      {
      	if(!empty($_POST['choice']))
      	{
      		echo "<h4>"."Events Conducted by branch are :"."</h4>";
      		foreach ($_POST['choice'] as $choice ) 
      		{
      			if($choice=='v')
      			{
      				$query=mysqli_query($conn,"select * from events where br_name='vaniavad'");
      				echo "<table bgcolor=#B0E2FF>";
              //date,venue,type,br_name
              echo "<h4>"."Events by vaniavad branch are:"."</h4>";
      				while ($row=mysqli_fetch_array($query)) 
      				{
                  $date=$row['date'];
                  $venue=$row['venue'];
                  $type=$row['type'];
                  $br_name=$row['br_name'];
                  echo "<tr>";
                  echo "<td>".$date."</td>"."<td>".$venue."</td>"."<td>".$type."</td>";
                  echo "</tr>";
      				} 
      				echo "</table>";
      			}
      			if($choice=='s')
      			{
              echo "<h4>"."Events by santram branch are:"."</h4>";
      				$query=mysqli_query($conn,"select * from events where br_name='santram road'");
      				echo "<table bgcolor=#0fae82>";
      				while ($row=mysqli_fetch_array($query)) 
      				{
                  $date=$row['date'];
                  $venue=$row['venue'];
                  $type=$row['type'];
                  $br_name=$row['br_name'];
                  echo "<tr>";
                  echo "<td>".$date."</td>"."<td>".$venue."</td>"."<td>".$type."</td>";
                  echo "</tr>";
      				} 
      				echo "</table>";
      			}
      			if($choice=='m')
      			{
      				$query=mysqli_query($conn,"select * from events where br_name='mill road'");
      				echo "<table bgcolor=#B0E2FF>";
      				while ($row=mysqli_fetch_array($query)) 
      				{
                  $date=$row['date'];
                  $venue=$row['venue'];
                  $type=$row['type'];
                  $br_name=$row['br_name'];
                  echo "<tr>";
                  echo "<td>".$date."</td>"."<td>".$venue."</td>"."<td>".$type."</td>"."<td>".$br_name."</td>";
                  echo "</tr>";
      				} 
      				echo "</table>";
      			}
      		}
      	}
      	// else
      	// {
      	// 	echo "Please Select Atleast one checkbox !!";
      	// }
      }

    
  
 ?>
 
 <!-- <h3>Select to Request an event </h3> -->
 


 

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">REQUEST EVENT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        
        <div class="modal-body">
   <tr> Date of EVENT <input type="date" name="date"></tr> 
   <p>
    

   </p>
   <tr> CITY OF EVENT :<input type="text" name="venue" placeholder="city" ></tr>
  <p>
    

  </p>
  <tr><h4>Select the TYPE of event</h4></tr>
  <p>
    

  </p>
   <tr>
      <input type="radio" name="radio" value="health camp">Health Camp
    <input type="radio" name="radio" value="social">Social
     <input type="radio" name="radio" value="seminar">Seminar
      <input type="radio" name="radio" value="awarness">Awarness
   </tr>
    <p>
    

   </p>
   <tr><h4>Select the branch of the ngo</h4></tr>

  <tr><input type="checkbox" name="preet" value="santram road">santram 
    <input type="checkbox" name="ash" value="vaniavad">vaniavad
    <!-- <input type="checkbox" name="shu" value="mill road">mill -->
  </tr>
   <p>
    

   </p>
 <tr> <h5>Budget  of your event</h5></tr>
  <tr><input type="text" name="cost"  placeholder="enter amt"></tr> 
  <p>
    

  </p>

<!-- <tr><button type"submit" name="submit" >submit</button></tr> -->




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type"submit" name="submit" class=" btn btn-primary">submit</button>
      </div>
    </div>
  </form>
  </div>
</div>
<br>
<?php

  include'connection.php';
  
  if(!empty($_POST['preet']))
  {
    if($_POST['preet'] == "santram road")
    {

    //echo "lodo";

    $query = "SELECT sum(amt) AS `Total` FROM `payment` WHERE br_name = 'santram road' ";
    $row = mysqli_fetch_array(mysqli_query($conn,$query));
    $total = $row['Total'];

   // echo $total;
    if(!empty($_POST['cost']))
    {
      if($_POST['cost']<$total)
      {

        mysqli_query ($conn,"insert into events(date,venue,type,br_name) values('".mysqli_real_escape_string($conn,$_POST['date'])."','".mysqli_real_escape_string($conn,$_POST['venue'])."','".mysqli_real_escape_string($conn,$_POST['radio'])."','".mysqli_real_escape_string($conn,$_POST['preet'])."')");
        echo "<script type='text/javascript'>alert('we have received your request for event');</script>";

     }
      else
      {
       echo"<script type='text/javascript'>alert('your event  cannot be done');</script>";
     }
    }

    }
  }
  if(!empty($_POST['ash']))
  {
    if($_POST['ash'] == "vaniavad")
    {

    //echo "lodo";

    $query1 = "SELECT sum(amt) AS `Total` FROM `payment` WHERE br_name = 'vaniavad' ";
    $row = mysqli_fetch_array(mysqli_query($conn,$query1));
    $total = $row['Total'];

   // echo $total;
    if(!empty($_POST['cost']))
    {
      if($_POST['cost']<$total)
     {
        

        // echo"your event  can be done";
         
       
        //echo $_POST['date'];
        //echo $_POST['venue'];
       // echo $_POST['radio'];
       // echo $_POST['ash'];

         mysqli_query ($conn,"insert into events(date,venue,type,br_name) values('".mysqli_real_escape_string($conn,$_POST['date'])."','".mysqli_real_escape_string($conn,$_POST['venue'])."','".mysqli_real_escape_string($conn,$_POST['radio'])."','".mysqli_real_escape_string($conn,$_POST['ash'])."')");
         echo "<script type='text/javascript'>alert(' we have received your request for event');</script>";

      }
      else
     {
        echo"<script type='text/javascript'>alert('your event  cannot be done');</script>";
      }
    }

    }
  }
  
  

?>
</div>
<p id="demo"></p>
</body>
</html>