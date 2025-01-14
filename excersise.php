<?php
session_start();
include("dbconnect.php");
extract($_POST);
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
		<td colspan="10" align="center"><strong>Excersise Details</strong></td>
  </tr>


	<tr>
		<td colspan="10">&nbsp;</td>
  </tr>
	
		    <tr>
          <td width="3%">&nbsp;</td>
          <td ><div align="center" class="style6"><strong>Id</strong> </div></td>
		  <td ><div align="center" class="style6"><strong>Excercise Name</strong> </div></td>
		  <td ><div align="center" class="style6"><strong>Excercise Video Link</strong> </div></td>
		 
		 		
        </tr>
		<tr>
		<td colspan="10">&nbsp;</td>
		</tr>
		<?php
		$qry=mysqli_query($conn,"select * from excersise");
		$i=1;
		while($row=mysqli_fetch_array($qry))
		{
		?>
        <tr>
		 <td width="3%">&nbsp;</td>
		    <td><div align="center"><?php echo $row['id'];?></div></td>
			  <td><div align="center"><?php echo $row['name'];?></div></td>
		   <td><div align="center"><a href="<?php echo $row['url'];?>" target="_blank" >Link</a></div></td>
			
			  
			 
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
