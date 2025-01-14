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
   

 



<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "diet_rec");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize variables
$bmi = 0;
$bmi_category = '';
$message = '';
$recommendations = [];

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = floatval($_POST['weight']);
    $height = floatval($_POST['height']) / 100; // Convert cm to meters
    $age = intval($_POST['age']);
    $activity_level = $_POST['activity_level'];
    $gender = $_POST['gender'];

    // Calculate BMI
    if ($height > 0 && $weight > 0) {
        $bmi = $weight / ($height * $height);
        
        // Determine BMI category
        if ($bmi < 18.5) {
            $bmi_category = "Underweight";
            $meal_type = "High-carb";
        } elseif ($bmi >= 18.5 && $bmi < 25) {
            $bmi_category = "Normal weight";
            $meal_type = "Balanced";
        } elseif ($bmi >= 25 && $bmi < 30) {
            $bmi_category = "Overweight";
            $meal_type = "Low-fat";
        } else {
            $bmi_category = "Obese";
            $meal_type = "Low-carb";
        }

        // Determine exercise intensity based on activity level
        $intensity = "Low";
        if ($activity_level == "moderate") {
            $intensity = "Moderate";
        } elseif ($activity_level == "active") {
            $intensity = "High";
        }

        // Fetch food recommendations based on BMI category and activity level
        $query = "SELECT DISTINCT f.food_name, f.serving_size, f.calories, f.category, 
                  f.protein_grams, f.carbs_grams, f.fat_grams, 
                  f.recommended_exercise, f.exercise_duration_minutes 
                  FROM food_recommendations f 
                  WHERE f.meal_type = '$meal_type' 
                  AND f.exercise_intensity = '$intensity' 
                  ORDER BY RAND() 
                  LIMIT 5";
        
        $result = mysqli_query($conn, $query);
        
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $recommendations[] = $row;
            }
        }

        $message = "Your BMI is " . number_format($bmi, 1) . " - " . $bmi_category;
    }
}
?>


<h1 style="text-align: center; font-size: 32px; color: #333300;">BMI Calculator & Food Recommendations</h1>

<form method="POST" action="" style="max-width: 600px; margin: 0 auto;">
    <div class="form-group" style="margin-bottom: 15px;">
        <label for="weight" style="display: block; margin-bottom: 5px;">Weight (kg):</label>
        <input type="number" id="weight" name="weight" step="0.1" required style="padding: 8px; width: 200px;">
    </div>
    
    <div class="form-group" style="margin-bottom: 15px;">
        <label for="height" style="display: block; margin-bottom: 5px;">Height (cm):</label>
        <input type="number" id="height" name="height" required style="padding: 8px; width: 200px;">
    </div>
    
    <div class="form-group" style="margin-bottom: 15px;">
        <label for="age" style="display: block; margin-bottom: 5px;">Age:</label>
        <input type="number" id="age" name="age" required style="padding: 8px; width: 200px;">
    </div>
    
    <div class="form-group" style="margin-bottom: 15px;">
        <label for="gender" style="display: block; margin-bottom: 5px;">Gender:</label>
        <select id="gender" name="gender" required style="padding: 8px; width: 200px;">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select>
    </div>
    
    <div class="form-group" style="margin-bottom: 15px;">
        <label for="activity_level" style="display: block; margin-bottom: 5px;">Activity Level:</label>
        <select id="activity_level" name="activity_level" required style="padding: 8px; width: 200px;">
            <option value="sedentary">Sedentary (little or no exercise)</option>
            <option value="moderate">Moderate (exercise 3-5 times/week)</option>
            <option value="active">Active (exercise 6-7 times/week)</option>
        </select>
    </div>
    
    <button type="submit" style="padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">Calculate & Get Recommendations</button>
</form>

<?php if ($message): ?>
    <div class="result" style="margin: 20px 0; padding: 15px; background-color: #f0f0f0; border-radius: 5px;">
        <h2 style="font-size: 24px;">Results</h2>
        <p style="font-size: 16px;"><?php echo htmlspecialchars($message); ?></p>
    </div>
<?php endif; ?>

<?php if (!empty($recommendations)): ?>
    <div class="recommendations" style="margin-top: 20px;">
        <h2 style="font-size: 24px;">Food & Exercise Recommendations</h2>
        <table style="width: 100%; border-collapse: collapse; margin-top: 15px;">
            <thead>
                <tr>
				    <th style="padding: 10px; border: 1px solid #ddd; text-align: left; background-color: #f5f5f5;">Category</th>
                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left; background-color: #f5f5f5;">Food Item</th>
                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left; background-color: #f5f5f5;">Serving Size</th>
                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left; background-color: #f5f5f5;">Calories</th>
                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left; background-color: #f5f5f5;">Protein (g)</th>
                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left; background-color: #f5f5f5;">Carbs (g)</th>
                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left; background-color: #f5f5f5;">Fat (g)</th>
                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left; background-color: #f5f5f5;">Recommended Exercise</th>
                    <th style="padding: 10px; border: 1px solid #ddd; text-align: left; background-color: #f5f5f5;">Duration (mins)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($recommendations as $rec): ?>
                    <tr>
					    <td style="padding: 10px; border: 1px solid #ddd;"><?php echo htmlspecialchars($rec['category']); ?></td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><?php echo htmlspecialchars($rec['food_name']); ?></td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><?php echo htmlspecialchars($rec['serving_size']); ?></td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><?php echo htmlspecialchars($rec['calories']); ?></td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><?php echo htmlspecialchars($rec['protein_grams']); ?></td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><?php echo htmlspecialchars($rec['carbs_grams']); ?></td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><?php echo htmlspecialchars($rec['fat_grams']); ?></td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><?php echo htmlspecialchars($rec['recommended_exercise']); ?></td>
                        <td style="padding: 10px; border: 1px solid #ddd;"><?php echo htmlspecialchars($rec['exercise_duration_minutes']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endif; ?>

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
