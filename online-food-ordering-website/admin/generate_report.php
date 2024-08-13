<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>


<section class="report">
   

<div class="box">

<form method="POST" action="report.php">

    <label for="start_date">Start Date:</label>
    <input type="date" id="start_date" name="start_date" required><br><br>
    
    <label for="end_date">End Date:</label>
    <input type="date" id="end_date" name="end_date" required><br>
    
    <button type="submit" class="btn">Generate Report</button>
    

</form>
</section></div>


</body>
</html>
