<?php
 	include("dbconnect.php");
	extract($_POST);
	session_start();

if(isset($_POST['btn']))
{
$qry=mysqli_query($conn,"select * from register where uname='$uname' && psw='$password'");
$num=mysqli_num_rows($qry);
if($num==1)
{
$qry=mysqli_query($conn,"select * from register where uname='$uname' && psw='$password'");
$row=mysqli_fetch_assoc($qry);
$_SESSION['uid']=$row['id'];

echo "<script>alert('Welcome To User Login')</script>";
header("location:uhome.php");
}
else
{
echo "<script>alert('User Name Password Wrong.....')</script>";

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
   

<form id="form1" name="form1" method="post" action="">
	   <table width="52%" border="0" align="center">
         <tr>
           <td colspan="2" rowspan="1"><div align="center" class="style1"><strong><font size="+1">User Login</font> </div></td>
		 </tr>
			<tr>
		<td width="36%">&nbsp;</td>
		    <td width="36%">&nbsp;</td>
	  		</tr>
         </tr>
         <tr>
           <td height="31"align="center"><span class="style2"><strong>User Name </strong></span></td>
           <td><label>
             <input name="uname" type="text" id="uname" />
           </label></td>
         </tr>
         <tr>
           <td height="44" align="center"><span class="style2"><strong>Password</strong></span></td>
           <td><label>
             <input name="password" type="password" id="password" />
           </label></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td rowspan="2"><label>
             <input name="btn" type="submit" id="btn" value="Login" />
             <input type="reset" name="Submit2" value="Cancel" />
           </label></td>
         </tr>
		 
		   <tr>
         
           <td width="28%"><a href="register.php">New User Sign Up?</a>          </td>
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