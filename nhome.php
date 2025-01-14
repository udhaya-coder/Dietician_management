<?php
session_start();
include("dbconnect.php");
extract($_POST);
$nid=$_SESSION['name'];

if(isset($_POST['btn']))
{

$qry=mysqli_query($conn,"update query set answer='$ans' where id='$id'");

echo "<script>alert('Submited Sucessfully')</script>";




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
      <th scope="col"><a href="nhome.php">Nutrician Home</a></th>
     <th scope="col"><a href="view.php">View Details</a></th>
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
   

 


<table width="95%" align="center">


		
	<tr>
		<td colspan="10" align="center"><strong>Queries Details</strong></td>
  </tr>


	<tr>
		<td colspan="10">&nbsp;</td>
  </tr>
	
		    <tr>
          <td width="3%">&nbsp;</td>
          <td width="9%"><div align="center" class="style6"><strong>Id</strong> </div></td>
		  <td width="15%"><div align="center" class="style6"><strong> User Name</strong> </div></td>
		   <td width="15%"><div align="center" class="style6"><strong>Gender</strong> </div></td>
		  <td width="13%"><div align="center" class="style6"><strong>Age</strong> </div></td>
		   <td width="15%"><div align="center" class="style6"><strong>Email</strong> </div></td>
		   <td width="11%"><div align="center" class="style6"><strong>Problem</strong> </div></td>
		    <td width="13%"><div align="center" class="style6"><strong>Duration</strong> </div></td>
			 <td width="13%"><div align="center" class="style6"><strong>Weight</strong> </div></td>
			  <td width="13%"><div align="center" class="style6"><strong>BMI</strong> </div></td>
			
        </tr>
		<tr>
		<td colspan="10">&nbsp;</td>
		</tr>
		<form action="" method="post">
		<?php
		$qry=mysqli_query($conn,"select * from query where nid='$nid' && answer=''");
		$i=1;
		while($row=mysqli_fetch_array($qry))
		{
		$uid=$row['uid'];
		
		$qry1=mysqli_query($conn,"select * from register where id='$uid'");
		$row1=mysqli_fetch_array($qry1);
		?>
        <tr>
		 <td width="3%">&nbsp;</td>
		    <td><div align="center"><?php echo $row['id'];?></div></td>
			<td><div align="center"><?php echo $row1['name'];?></div></td>
			<td><div align="center"><?php echo $row1['gender'];?></div></td>
			<td><div align="center"><?php echo $row1['age'];?></div></td>
			<td><div align="center"><?php echo $row1['email'];?></div></td>
			  <td><div align="center"><?php echo $row['problem'];?></div></td>
		   <td><div align="center"><?php echo $row['dur'];?></div></td>
			  <td><div align="center"><?php echo $row['weight'];?></div></td>
			 <td><div align="center"><?php echo $row['bmi'];?></div></td>
			 <input type="hidden" name="id" value="<?php echo $row['id'];?>">
			   <td><div align="center"><input type="text" name="ans"></div></td>
			    <td><div align="center"><input type="submit" name="btn"></div></td>
			 
  </tr>
</form>
		 <tr>
		  	 	<td>&nbsp;</td>
		   		<td>&nbsp;</td>
				<td>&nbsp;</td>
			 	<td>&nbsp;</td>
			 	<td>&nbsp;</td>
			 	<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
		
		</tr>
		
        <?php
		$i++;
		}
?>
				<tr>
		<td colspan="10" align="center">&nbsp;</td>
		</tr>
		
</table>



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
