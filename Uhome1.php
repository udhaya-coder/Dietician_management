<?php
session_start();
include("dbconnect.php");
extract($_POST);
?>

<html>
<head>
  <title>Food Recommend</title>
  <meta name="description" content="website description" />
  <style type="text/css">
  .style1 {color: #FF0000}
  </style>
</head>
<body>
  <table width="100%" border="0">
    <tr>
      <th height="73" bgcolor="#00664d" scope="col"><h1>DIETICIAN MANAGEMENT SYSTEM</h1></th>
    </tr>
  </table>
  <table width="100%" border="0">
    <tr>
      <th scope="col"><a href="uhome.php">User Home</a></th>
      <th scope="col"><a href="excersise.php">Exercise Details</a></th>
      <th scope="col"><a href="query.php">Ask Query</a></th>
      <th scope="col"><a href="answer.php">Answers</a></th>
      <th scope="col"><a href="index.php">LogOut</a></th>
    </tr>
  </table>

  <br /><br />

  <div style="width:850px;margin:0 auto;">
    <img src="images/1.jpg" style="width:850px;" height="400">
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

        // Determine BMI category and meal type based on Age & Gender
        if ($age < 18) {
            // Children & Teens BMI classification
            if ($bmi < 5) {
                $bmi_category = "Underweight";
                $meal_type = "High-protein";
            } elseif ($bmi >= 5 && $bmi < 85) {
                $bmi_category = "Healthy weight";
                $meal_type = "Balanced";
            } elseif ($bmi >= 85 && $bmi < 95) {
                $bmi_category = "Overweight";
                $meal_type = "Low-fat";
            } else {
                $bmi_category = "Obese";
                $meal_type = "Low-carb";
            }
        } elseif ($age >= 60) {
            // Senior Citizen BMI classification
            if ($bmi < 22) {
                $bmi_category = "Underweight";
                $meal_type = "High-protein";
            } elseif ($bmi >= 22 && $bmi < 27) {
                $bmi_category = "Normal weight";
                $meal_type = "Balanced";
            } else {
                $bmi_category = "Overweight";
                $meal_type = "Low-carb";
            }
        } else {
            // Adults BMI classification
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
        }

        // Adjust meal type based on Gender
        if ($gender == "male") {
            if ($bmi < 18.5) {
                $meal_type = "High-protein";
            } elseif ($bmi >= 25) {
                $meal_type = "High-fiber";
            }
        } elseif ($gender == "female") {
            if ($bmi < 18.5) {
                $meal_type = "Iron-rich";
            } elseif ($bmi >= 25) {
                $meal_type = "Low-sugar";
            }
        }

        // Fetch food recommendations
        $query = "SELECT DISTINCT f.food_name, f.serving_size, f.calories, f.category, 
                  f.protein_grams, f.carbs_grams, f.fat_grams, 
                  f.recommended_exercise, f.exercise_duration_minutes 
                  FROM food_recommendations f 
                  WHERE f.meal_type = '$meal_type' 
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

<h1 style="text-align: center;">BMI Calculator & Food Recommendations</h1>

<form method="POST" action="" style="max-width: 600px; margin: 0 auto;">
    <label>Weight (kg):</label>
    <input type="number" name="weight" required><br>

    <label>Height (cm):</label>
    <input type="number" name="height" required><br>

    <label>Age:</label>
    <input type="number" name="age" required><br>

    <label>Gender:</label>
    <select name="gender" required>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select><br>

    <label>Activity Level:</label>
    <select name="activity_level" required>
        <option value="sedentary">Sedentary</option>
        <option value="moderate">Moderate</option>
        <option value="active">Active</option>
    </select><br>

    <button type="submit">Calculate & Get Recommendations</button>
</form>

<?php if ($message): ?>
    <h2>Results</h2>
    <p><?php echo htmlspecialchars($message); ?></p>
<?php endif; ?>

<?php if (!empty($recommendations)): ?>
    <h2>Food & Exercise Recommendations</h2>
    <ul>
        <?php foreach ($recommendations as $rec): ?>
            <li><?php echo htmlspecialchars($rec['food_name']) . " - " . htmlspecialchars($rec['category']); ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<table width="100%" border="0">
    <tr>
      <th bgcolor="#00664d"><p>copyrights@2024 DIETICIAN MANAGEMENT SYSTEM</p></th>
    </tr>
</table>

</body>
</html>
