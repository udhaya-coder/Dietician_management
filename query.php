<?php
session_start();
include("dbconnect.php");
extract($_POST);

	$uid=$_SESSION['uid'];
	


	if(isset($_POST['btn']))
	{
	

		
	$qry=mysqli_query($conn,"insert into query values('','$uid','$nid','$problem','$dur','$weight','$bmi','')");
	
	if($qry)
	{
	
	echo "<script>alert('insert sucess')</script>";
	
	
	}
	
	else
	{
	
	
	echo "<script>alert('insert Failed ')</script>";
	
	}
	
	
	
	}




?>



	
<html>
<head>
  <title>Food Recomend</title>
  <meta name="description" content="website description" />
  <style type="text/css">
<!--
.style1 {color: #FF0000}
-->
  </style>
</head>
<body>
  <table width="100%" border="0">
    <tr>
      <th height="73" bgcolor="#00664d" scope="col"><h1>DIETICIAN MANAGEMENT SYSTEM</h1>
      </th>
    </tr>
  </table>
  <table width="100%" border="0">
    <tr>
      <th scope="col"><a href="uhome.php">User Home</a></th>
      <th scope="col"><a href="excersise.php">Excersise Details</a></th>
      <th scope="col"><a href="query.php">Ask Qurey</a></th>
      <th scope="col"><a href="answer.php">Answers</a></th>
      <th scope="col"><a href="index.php">LogOut</a></th>
    </tr>
  </table>
  

  <br />
  <br>
  <br />
  
  <p>&nbsp;</p>
   <div style="width:850px;margin-left:200px;margin:0 auto;">
 <img src="images\1.jpg"  style="width:850px;" height="400">
</div>
   







<form id="f1" name="f1" method="post" action="#">
  <table width="35%" height="312" border="0" align="center">

    <tr>
      <td height="47" colspan="2"  align="center" ><div class="style5"><h3>Enter Your Query</h></div></td>
    </tr>
   <tr>
     
      <td width="42%" height="44">Problem</td>
      <td width="58%"><textarea name="problem"></textarea>
      </td>
      
    </tr>
	
	
	
	
	  <tr>
     
      <td height="40">Select Nutrician</td>
      <td>
        <select name="nid" >
		<option value="">Select</option>
		<?php
		$qr=mysqli_query($conn,"select * from nutrician");
		while($rw=mysqli_fetch_array($qr))
		{
		
		?>
		<option value="<?php echo $rw['name'];?>"><?php echo $rw['name'];?></option>
		
		<?php
		
		}
		?>
		
		
		
		</select>
		
		
		
		
      </td>
     
    </tr>
	
	
	
  <tr>
     
      <td height="40">How Long</td>
      <td>
        <input name="dur" type="text" id="dur" />
      </td>
     
    </tr>

	<tr>
      <td height="40">Weight</td>
      <td>
        <input name="weight" type="text" id="weight" />
      </td>
     
    </tr>




	<tr>
      <td height="40">BMI</td>
      <td>
        <input name="bmi" type="text" id="bmi" />
      </td>
     
    </tr>


	<tr>
      <td height="45">&nbsp;</td>
      <td><input name="btn" type="submit" id="btn" value="Submit" />
      <input type="reset" name="Submit2" value="Reset" /></td>
    </tr>
  </table>
</form>


 <br />
  <br>
  <br />
  <br />
  <br>
  <br />
  <table width="100%" border="0">
    <tr>
      <th height="73" bgcolor="#00664d" scope="col"><p>copyrights@2024 Food Recomend System</p>
      </th>
    </tr>
</table>


</body>
</html>
