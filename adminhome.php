<?php
 	include("dbconnect.php");
	extract($_POST);
	session_start();

if(isset($_POST['btn']))
{
		
	$qry=mysqli_query($conn,"insert into food values('','$name','$colories','$vitamin','$des')");
	if($qry)
	{
	
	echo "<script>alert('inserted sucessfully')</script>";
	
	}
	else
	{
	
	
		echo "failed";
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
      
      <th scope="col"><a href="add.php">Add Excersise</a></th>
      <th scope="col"><a href="viewu.php">User Details</a></th>
      <th scope="col"><a href="viewn.php">Nutrician Details</a></th>
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
  <table width="35%" height="338" border="0" align="center">

    <tr>
      <td height="64" colspan="2"  align="center" ><div class="style5"><h3>Add Diet Food</h3></div></td>
    </tr>
   <tr>
     
      <td width="35%" height="55">Food Name</td>
      <td width="65%"><input name="name" type="text" id="name"/>
      </td>
      
    </tr>
	
    
  <tr>
     
      <td height="45">Calories</td>
      <td>
        <input name="colories" type="text" id="colories" />
      </td>
     
    </tr>
	 <tr>
     
      <td height="48">Vitamins</td>
      <td><input name="vitamin" type="text" id="vitamin"/></td>
      
    <tr>
      <td height="59">Description</td>
      <td><textarea name="des" id="des"></textarea></td>
    </tr>
	
	<tr>
      <td height="53">&nbsp;</td>
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
