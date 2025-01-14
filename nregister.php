<?php
 	include("dbconnect.php");
	extract($_POST);
	session_start();

if(isset($_POST['btn']))
{
		$qry1=mysqli_query($conn,"select * from nutrician where uname='$uname'");
$count=mysqli_num_rows($qry1);
if($count>0){                                                                                           
echo "<script>alert('username already taken')</script>";
}else{
	$qry=mysqli_query($conn,"insert into nutrician values('','$name','$gender','$age','$email','$phone','$desig','$exp','$uname','$psw')");
	if($qry)
	{
	
	echo "<script>alert('inserted sucessfully')</script>";
	
	}

	}
	
}

?>


<html>
<head>
  <title>Food Recomed</title>
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
      <th scope="col"><a href="index.php">Home</a></th>
      <th scope="col"><a href="admin.php">Admin Login</a></th>
      <th scope="col"><a href="user.php">User Login</a></th>
      <th scope="col"><a href="nutrition.php">Nutrition </a></th>
      <th scope="col"><a href="#">About Us </a></th>
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
  <table width="35%" height="502" border="0" align="center">

    <tr>
          <td colspan="2"  align="center" ><div class="style5"><h3>Nutrician Registation</h3></div></td>
    </tr>
   <tr>
     
      <td width="35%" height="51">Nutician Name</td>
      <td width="65%"><input name="name" type="text" id="name" required/>
      </td>
      
    </tr>
	
    <tr>
     
      <td height="35">Gender</td>
      <td><input name="gender" type="radio" value="male"  required/>
        Male
          <input name="gender" type="radio" value="female" /> 
          Female</td>
     
    </tr>
	
  <tr>
     
      <td height="36">Age</td>
      <td>
        <input name="age" type="text" id="age"  required/>
      </td>
     
    </tr>
	 <tr>
     
      <td height="41">Email Id</td>
      <td><input name="email" type="text" id="email"   required/></td>
      
    </tr>
	  <tr>
      <td height="43">Phone Number </td>
      <td><input name="phone" type="text" id="phone"  required/></td>
      
    </tr>
	
	
	 </tr>
	  <tr>
      <td height="48">Designation</td>
      <td><input name="desig" type="text" id="desig"  required/></td>
      
    </tr>
	
	
	 </tr>
	  <tr>
      <td height="42">Experiance</td>
      <td><input name="exp" type="text" id="exp"  required/></td>
      
    </tr>
	

	
	 <tr>
      <td height="46">User Name</td>
      <td><input name="uname" type="text" id="uname"  required/></td>
    </tr>

    <tr>
     <td height="50">Password</td>
      <td><input name="psw" type="password" id="psw"  required/></td>
    </tr>
	<tr>
      <td>&nbsp;</td>
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
      <th height="73" bgcolor="#00664d" scope="col"><p>copyrights@2024DIETICIAN MANAGEMENT SYSTEM</p>
      </th>
    </tr>
</table>


</body>
</html>