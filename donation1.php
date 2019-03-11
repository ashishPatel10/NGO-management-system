
<?php include'connection.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>DONATION</title>
	<link rel="stylesheet" href="btsr.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	
	
</head>
<body  >
	
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">MAKE A DONATION</a>

  
<button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModalLong" >
  Donor list
</button>
</nav>


<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">DID</th>
      <th scope="col">NAME</th>
      <!-- <th scope="col">Last</th> -->
      <!-- <th scope="col">Handle</th> -->
    </tr>
  </thead>
  <tbody>
   <?php
$query1=mysqli_query($conn,"select d_id,name from donor ");
		while ($row=mysqli_fetch_array($query1)) {
			# code...
			$d=$row['d_id'];
			$di=$row['name'];
			 echo '<tr >
                          <td>'.$d."&nbsp".'</td> 
                          <td>'.$di."&nbsp".'</td>
                          </tr>';
			//echo $d;
		}

    ?>
   
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark " data-dismiss="modal">Close</button>
       <!--  <button type="button" class="btn btn-primary" >Refresh
       
    	
    </button> -->
      </div>
    </div>
  </div>
</div>



	<p align="center">
		&nbsp &nbsp &nbsp &nbsp &nbsp
	<table align="center">

		<tr>
			
			<td>
				
				<button type="button" class="btn  bg-dark" data-toggle="modal" data-target="#exampleModal" style="height: 200px; width: 500px; background-color:#0fae99">
					<h4>Existing Donor</h4>
  					
					</button>

		

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	  	<form method="post">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Donation</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <table>
				<!-- <tr>
					Name &nbsp &nbsp  &nbsp  &nbsp<input type="text" name="name" placeholder="FirstName" required><br><br>
				</tr> -->
				<tr>
					Donor ID <input type="text" name="did" placeholder="d001" required><br><br>
				</tr>
				<tr>
					Branch name
					<fieldset ><label for="checkbox-1">vaniavad</label>
					    <input type="checkbox" name="choice1" id="checkbox-1"  value='vaniavad'>
					    <label for="checkbox-2">santram road</label> 
					    <input type="checkbox" name="choice2" id="checkbox-2"  value='santram road'> 
				    </fieldset>
				    <br>
				</tr>
				<tr>
					 <p>date  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<input type="date" name="date" required> </p>
				</tr>
				<tr>
					Amount <input type="text" name="amount" required>
				</tr>
	    	</table>
	    	</form>


	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Donate</button>
	      </div>
	    </div>
	  </div>
</div>

<?php 
	    	
	if(!empty($_POST['choice1']))
	{
		if($_POST['choice1'] == "vaniavad")
		{

		// echo $_POST['name'];
		// echo $_POST['did'];
		// echo $_POST['choice1'];
		// echo $_POST['date'];
		// echo $_POST['amount'];
		
		 $t=rand(200,300);;
		 
		$tid = "t". $t;
		//echo $tid;
		$trtype = "online";
		//echo $trtype;
		$query=mysqli_query($conn,"select amt from donor where d_id='".$_POST['did']."'");
		while ($row=mysqli_fetch_array($query)) {
			# code...
			$d=$row['amt'];
			$di=$d+$_POST['amount'];
			echo $di;
			//echo $d;
			 mysqli_query($conn,"update donor set amt='".$di."' where d_id='".$_POST['did']."'");
			 	mysqli_query($conn,"insert into payment(t_id,tr_type,date,amt,d_id,br_name) values('".mysqli_real_escape_string($conn,$tid)."','".mysqli_real_escape_string($conn,$trtype)."','".mysqli_real_escape_string($conn,$_POST['date'])."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".mysqli_real_escape_string($conn,$_POST['did'])."','".mysqli_real_escape_string($conn,$_POST['choice1'])."')");

		}
		  echo"<script type='text/javascript'>alert('your donation is been done');</script>";
		//$row = mysqli_fetch_array(mysqli_query($conn,$query));
		//$total = $row['Total'];

		//echo $total;
		//if(!empty($_POST['cost']))
		// {
		// 	if($_POST['cost']<$total)
		// 	{
		// 		echo"your event  can be done";

		// 	}
		// 	else
		// 	{
		// 		echo"your event  cannot be done";
		// 	}
		// }

		}
	}
	if(!empty($_POST['choice2']))
	{
		if($_POST['choice2'] == "santram road")
		{

		// echo $_POST['name'];
		// echo $_POST['did'];
		 //echo $_POST['choice2'];
		// echo $_POST['date'];
		// echo $_POST['amount'];
		 $t=rand(200,300);
		 
		$tid = "t". $t;
		//echo $tid;
		$trtype = "online";

		//echo $trtype;

		$query=mysqli_query($conn,"select amt from donor where d_id='".$_POST['did']."'");
		while ($row=mysqli_fetch_array($query)) {
			# code...
			$d=$row['amt'];
			$di=$d+$_POST['amount'];
			echo $di;
			//echo $d;
			  mysqli_query($conn,"update donor set amt='".$di."' where d_id='".$_POST['did']."'");
			 mysqli_query($conn,"insert into payment(t_id,tr_type,date,amt,d_id,br_name) values('".mysqli_real_escape_string($conn,$tid)."','".mysqli_real_escape_string($conn,$trtype)."','".mysqli_real_escape_string($conn,$_POST['date'])."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".mysqli_real_escape_string($conn,$_POST['did'])."','".mysqli_real_escape_string($conn,$_POST['choice2'])."')");

		}
		 echo"<script type='text/javascript'>alert('your donation is been done');</script>";
		 //mysqli_query($conn,"insert into donor(name,amt,d_id,t_id)  values('".mysqli_real_escape_string($conn,$_POST['name'])."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".mysqli_real_escape_string($conn,$_POST['did'])."','".mysqli_real_escape_string($conn,$tid)."')");
		//mysqli_query($conn,"insert into payment(t_id,tr_type,date,amt,d_id,br_name) values('".mysqli_real_escape_string($conn,$tid)."','".mysqli_real_escape_string($conn,$trtype)."','".mysqli_real_escape_string($conn,$_POST['date'])."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".mysqli_real_escape_string($conn,$_POST['did'])."','".mysqli_real_escape_string($conn,$_POST['choice2'])."')");

		
		//$row = mysqli_fetch_array(mysqli_query($conn,$query));
		//$total = $row['Total'];

		//echo $total;
		//if(!empty($_POST['cost']))
		// {
		// 	if($_POST['cost']<$total)
		// 	{
		// 		echo"your event  can be done";

		// 	}
		// 	else
		// 	{
		// 		echo"your event  cannot be done";
		// 	}
		// }

		}
	}



	    	 ?>
			</td>
			
				

			</tr>
			<tr>
			<td>
				
<br>
<br>
<button type="button" class="btn  bg-dark" data-toggle="modal" data-target="#exampleModal1" style="height: 200px; width: 500px; background-color:#0fae82">
  <h4>New Donor</h4>
</button>

		

  <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	  	<form method="post">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Donation</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <table>
				<tr>
					Name &nbsp &nbsp  &nbsp  &nbsp<input type="text" name="name" placeholder="FirstName"><br><br>
				</tr>
				
				<tr>
					Branch name
					<fieldset><label for="checkbox-1">vaniavad</label>
					    <input type="checkbox" name="choice3" id="checkbox-1"  value='vaniavad'>
					    <label for="checkbox-2">santram road</label> 
					    <input type="checkbox" name="choice4" id="checkbox-2"  value='santram road'> 
				    </fieldset>
				    <br>
				</tr>
				<tr>
					 <p>date  &nbsp  &nbsp  &nbsp  &nbsp &nbsp<input type="date" name="date"> </p>
				</tr>
				<tr>
					Amount <input type="text" name="amount">
				</tr>
	    	</table>
	    	</form>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn " data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Donate</button>
	      </div>
	    </div>
	  </div>
</div>


<?php 
	    	
	if(!empty($_POST['choice3']))
	{
		if($_POST['choice3'] == "vaniavad")
		{

		// echo $_POST['name'];
		// echo $_POST['did'];
		// echo $_POST['choice1'];
		// echo $_POST['date'];
		// echo $_POST['amount'];
		$d=rand(150,200);
		 $t=rand(200,300);;
		 $did="d".$d;
		$tid = "t". $t;
		//echo $tid;
		$trtype = "online";
		//echo $did;
		//echo $tid;
		//echo $trtype;
		
		 mysqli_query($conn,"insert into donor(name,amt,d_id)  values('".mysqli_real_escape_string($conn,$_POST['name'])."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".mysqli_real_escape_string($conn,$did)."')");
	 mysqli_query($conn,"insert into payment(t_id,tr_type,date,amt,d_id,br_name) values('".mysqli_real_escape_string($conn,$tid)."','".mysqli_real_escape_string($conn,$trtype)."','".mysqli_real_escape_string($conn,$_POST['date'])."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".mysqli_real_escape_string($conn,$did)."','".mysqli_real_escape_string($conn,$_POST['choice3'])."')");
		//$row = mysqli_fetch_array(mysqli_query($conn,$query));
		//$total = $row['Total'];
 echo"<script type='text/javascript'>alert('your donation is been done and your id is  $did ');</script>";
		
		//echo $total;
		//if(!empty($_POST['cost']))
		// {
		// 	if($_POST['cost']<$total)
		// 	{
		// 		echo"your event  can be done";

		// 	}
		// 	else
		// 	{
		// 		echo"your event  cannot be done";
		// 	}
		// }

		}
	}
	if(!empty($_POST['choice4']))
	{
		if($_POST['choice4'] == "santram road")
		{

		// echo $_POST['name'];
		// echo $_POST['did'];
		// echo $_POST['choice2'];
		// echo $_POST['date'];
		// echo $_POST['amount'];
		 $t=rand(200,300);
		 $d=rand(150,200);
		$tid = "t". $t;
		$did="d".$d;
		//echo $tid;
		$trtype = "online";



		mysqli_query($conn,"insert into donor(name,amt,d_id)  values('".mysqli_real_escape_string($conn,$_POST['name'])."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".mysqli_real_escape_string($conn,$did)."')");
	 mysqli_query($conn,"insert into payment(t_id,tr_type,date,amt,d_id,br_name) values('".mysqli_real_escape_string($conn,$tid)."','".mysqli_real_escape_string($conn,$trtype)."','".mysqli_real_escape_string($conn,$_POST['date'])."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".mysqli_real_escape_string($conn,$did)."','".mysqli_real_escape_string($conn,$_POST['choice4'])."')");
		 echo"<script type='text/javascript'>alert('your donation is been done and your id is  $did ');</script>";
		//echo $trtype;
		
		// mysqli_query($conn,"insert into donor(name,amt,d_id,t_id)  values('".mysqli_real_escape_string($conn,$_POST['name'])."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".mysqli_real_escape_string($conn,$did)."','".mysqli_real_escape_string($conn,$tid)."')");
		//mysqli_query($conn,"insert into payment(t_id,tr_type,date,amt,d_id,br_name) values('".mysqli_real_escape_string($conn,$tid)."','".mysqli_real_escape_string($conn,$trtype)."','".mysqli_real_escape_string($conn,$_POST['date'])."','".mysqli_real_escape_string($conn,$_POST['amount'])."','".mysqli_real_escape_string($conn,$did)."','".mysqli_real_escape_string($conn,$_POST['choice4'])."')");
		//$row = mysqli_fetch_array(mysqli_query($conn,$query));
		//$total = $row['Total'];

		//echo $total;
		//if(!empty($_POST['cost']))
		// {
		// 	if($_POST['cost']<$total)
		// 	{
		// 		echo"your event  can be done";

		// 	}
		// 	else
		// 	{
		// 		echo"your event  cannot be done";
		// 	}
		// }

		}
	}



	    	 ?>
			</td>
		</tr>
		



</table>
</p>
</body>
</html>