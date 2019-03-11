

<?php include'connection.php';


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>donor info</title>
	<link rel="stylesheet" href="btsr.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <style type="text/css">
    table,th,td{
      border:1px solid black;
      border-collapse: collapse;
    } 
    th,td{
      padding: 5px;
    }
    }
  </style>
</head>
<body  >
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
      <a class="nav-link" href="donation1.php " target="_blank ">DONATION</a>
    </li>
  </ul>
</nav>
<div align="center">
  

<h3>Details of the Donors</h3><br>
  <h5>Select the following buttons for information of donors</h5><br>
  
  <form method="POST" action="donor_info1.php">
    <p> <input type="radio" name="radio" value="branch" class="btn btn-primary btn-lg"> &nbsp Select all the names of donors with branch</p><br>
    <p><input type="radio" name="radio" value="name" class="btn btn-primary btn-lg"> &nbspSelect all the names of donors</p><br>
    <p> <input type="radio" name="radio" value="amount" class="btn btn-primary btn-lg"> &nbspSee the total amount received in each branch</p><br>
    <h3>Select the Branch</h3>
   <p>
     <input type="checkbox" name="choice[]" value="s" class="btn btn-primary btn-lg">Santram road

     <input type="checkbox" name="choice[]" value="v" class="btn btn-primary btn-lg">Vaniavad

     <!-- <input type="checkbox" name="choice[]" value="m">Mill road -->
   </p>
   <br>
   <input type="submit" NAME="submit" class="btn btn-dark``"><br>

</form>
<br>
<br>

<?php
  /*$branch=htmlspecialchars($_POST['radio']);
  $name=htmlspecialchars($_POST['radio']);
  $amount=htmlspecialchars($_POST['radio']);*/
 

/*$s=htmlspecialchars($_POST['s']);
$v=htmlspecialchars($_POST['v']);
$m=htmlspecialchars($_POST['m']);*/
if(filter_has_var(INPUT_POST, 'submit'))
{
  if(!empty($_POST['radio']) )
    {
      //echo "string";
       if($_POST['radio']=='branch')
         {
             if( !empty($_POST['choice']))
                {
                   echo '<table bgcolor=#B0E2FF>
                          <tr>
                              <th>DID'."&nbsp".'</th>
                              <th>Name'."&nbsp".'</th>
                              <th>Branch name'."&nbsp".'</th>
                          </tr>';
                  foreach($_POST['choice'] as $choice)
                  {

                    if($choice=="s")
                      {
                        //$query=mysqli_fetch($conn);
                        $query=mysqli_query($conn,"select d.name,p.br_name,d.d_id from donor d,payment p where p.d_id=d.d_id and p.br_name='santram road' ");
                        //$row=mysqli_fetch_array($query);
                       
                        while($row=mysqli_fetch_array($query))
                        {
                          $d_i=$row['d_id'];
                          $name=$row['name'];
                          $br_name=$row['br_name'];
                        
                         // echo '<tr> <td>DID</td>.<td>"Name"</td>.<td>"branch name"</td>."</br>"</tr>';
                          echo '<tr >
                          <td>'.$d_i."&nbsp".'</td> 
                          <td>'.$name."&nbsp".'</td>
                          <td>'.$br_name."&nbsp".'</td>
                          </tr>';
                          
                        }
                        
                    
                      }
                    if($choice=='v')
                    {
                       //echo "v";
                        $query=mysqli_query($conn,"select d.name,p.br_name,d.d_id from donor d,payment p where p.d_id=d.d_id and p.br_name='vaniavad' ");
                        //$row=mysqli_fetch_array($query);
                        
                          
                        while($row=mysqli_fetch_array($query))
                        {
                          $d_i=$row['d_id'];
                          $name=$row['name'];
                          $br_name=$row['br_name'];
                        
                         // echo '<tr> <td>DID</td>.<td>"Name"</td>.<td>"branch name"</td>."</br>"</tr>';
                          echo '<tr>
                          <td>'.$d_i."&nbsp".'</td> 
                          <td>'.$name."&nbsp".'</td>
                          <td>'.$br_name."&nbsp".'</td>
                          </tr>';
                         
                          
                        }
                     echo '</table>';
                        
                    }
                     // if($choice=='m')
                     // {
                     //  //echo "m";
                     //  $query=mysqli_query($conn,"select d.name,p.br_name,d.d_id from donor d,payment p where p.d_id=d.d_id and p.br_name='mill road' ");
                     //    //$row=mysqli_fetch_array($query);
                        
                     //    while($row=mysqli_fetch_array($query))
                     //    {
                     //      $d_i=$row['d_id'];
                     //      $name=$row['name'];
                     //      $br_name=$row['br_name'];
                        
                     //     // echo '<tr> <td>DID</td>.<td>"Name"</td>.<td>"branch name"</td>."</br>"</tr>';
                     //      echo '<tr>
                     //      <td>'.$d_i."&nbsp".'</td> 
                     //      <td>'.$name."&nbsp".'</td>
                     //      <td>'.$br_name."&nbsp".'</td>
                     //      </tr>';
                          
                     //    }
                        
                  }
                }
          }

      if($_POST['radio']=='name')
      {
           if( !empty($_POST['choice']))
            {
               // for($_POST['choice'])
                // {
                    $choice=$_POST['choice'];
                    
                     //  }

                   if($choice ){
                      //$query=mysqli_fetch($conn)
                     $query=mysqli_query($conn,"select d_id,name from donor ");
                       echo '<table bgcolor=#B0E2FF>
                          <tr>
                              <th>DID'."&nbsp".'</th>
                              <th>Name'."&nbsp".'</th>
                              </tr>';
                       while($row=mysqli_fetch_array($query))
                        {
                          $d_i=$row['d_id'];
                          $name=$row['name'];
                         // $br_name=$row['br_name'];
                        
                         // echo '<tr> <td>DID</td>.<td>"Name"</td>.<td>"branch name"</td>."</br>"</tr>';
                          echo '<tr>
                          <td>'.$d_i."&nbsp".'</td> 
                          <td>'.$name."&nbsp".'</td>
                         
                          </tr>';
                              }
                              echo '</table>';

                          //  }
                  

                 }
             }
      }
    



    if($_POST['radio']=='amount')
      {
        if( !empty($_POST['choice']))
          {
            foreach($_POST['choice'] as $choice)
            {
               echo '<table bgcolor=#B0E2FF>
                          <tr>
                              <th>Amount'."&nbsp".'</th>
                              <th>Name'."&nbsp".'</th>
                              </tr>';

                  if($choice=="s"){
                   // $query=mysqli_fetch($conn)
                    $query=mysqli_query($conn,"select sum(p.amt),p.br_name  from payment p,branch b where p.br_name=b.br_name and b.br_name='santram road' ");
                   
                     while($row=mysqli_fetch_array($query))
                        {
                          $sum=$row['sum(p.amt)'];
                          $br_name=$row['br_name'];
                          //$amt=$row['amt'];
                           echo "<tr>"
                           .'<td>'.$sum."&nbsp".'</td>'. 
                          '<td>'.$br_name."&nbsp".'</td>'. 
                          
                          //'<td>'.$amt."&nbsp".'</td>'.
                         
                          '</tr>'.'<br>';
                        }
                  }
                  if($choice=='v'){
                    //echo "v";
                    $query=mysqli_query($conn,"select sum(p.amt),p.br_name  from payment p,branch b where p.br_name=b.br_name and b.br_name='vaniavad' ");
                     while($row=mysqli_fetch_array($query))
                        {
                          $sum=$row['sum(p.amt)'];
                          $br_name=$row['br_name'];
                          //$amt=$row['amt'];
                           echo "<tr>"
                           .'<td>'.$sum."&nbsp".'</td>'. 
                          '<td>'.$br_name."&nbsp".'</td>'. 
                          
                          //'<td>'.$amt."&nbsp".'</td>'.
                         
                          '</tr>'.'<br>';
                        }
                  }
                  if($choice=='m'){
                   // echo "m";
                     $query=mysqli_query($conn,"select sum(p.amt),p.br_name  from payment p,branch b where p.br_name=b.br_name and b.br_name='mill road' ");
                     while($row=mysqli_fetch_array($query))
                        {
                          $sum=$row['sum(p.amt)'];
                          $br_name=$row['br_name'];
                          //$amt=$row['amt'];
                           echo "<tr>"
                           .'<td>'.$sum."&nbsp".'</td>'. 
                          '<td>'.$br_name."&nbsp".'</td>'. 
                          
                          //'<td>'.$amt."&nbsp".'</td>'.
                         
                          '</tr>'.'<br>';
                        }
                        echo '</table>';
                  }

            
          }
      }
        
    }
      
  }
}

?>
</div>
</body>
</html>