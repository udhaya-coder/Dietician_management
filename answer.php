<?php
session_start();
include("dbconnect.php");
extract($_POST);
$uid=$_SESSION['uid'];
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
   

 

<table width="95%" align="center">


		
	<tr>
		<td colspan="10" align="center"><strong>Answers For Your Quries</strong></td>
  </tr>


	<tr>
		<td colspan="10">&nbsp;</td>
  </tr>
	
		    <tr>
          <td width="3%">&nbsp;</td>
          <td width="9%"><div align="center" class="style6"><strong>Id</strong> </div></td>
		  <td width="15%"><div align="center" class="style6"><strong>Nutrician Name</strong> </div></td>
		  <td width="13%"><div align="center" class="style6"><strong>Problem</strong> </div></td>
		   <td width="15%"><div align="center" class="style6"><strong>Duration</strong> </div></td>
		   <td width="11%"><div align="center" class="style6"><strong>Weight</strong> </div></td>
		    <td width="13%"><div align="center" class="style6"><strong>BMI</strong> </div></td>
			 <td width="13%"><div align="center" class="style6"><strong>Solution</strong> </div></td>
			
        </tr>
		<tr>
		<td colspan="10">&nbsp;</td>
		</tr>
		<?php
		$qry=mysqli_query($conn,"select * from query where uid='$uid'");
		$i=1;
		while($row=mysqli_fetch_array($qry))
		{
		?>
        <tr>
		 <td width="3%">&nbsp;</td>
		    <td><div align="center"><?php echo $row['id'];?></div></td>
			  <td><div align="center"><?php echo $row['nid'];?></div></td>
		   <td><div align="center"><?php echo $row['problem'];?></div></td>
			  <td><div align="center"><?php echo $row['dur'];?></div></td>
			 <td><div align="center"><?php echo $row['weight'];?></div></td>
			   <td><div align="center"><?php echo $row['bmi'];?></div></td>
			    <td><div align="center"><?php echo $row['answer'];?></div></td>
			 
  </tr>

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
