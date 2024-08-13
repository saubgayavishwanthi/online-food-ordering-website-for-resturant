<?php
// Connect to the database
include '../component/connect.php';
session_start();

// Define date range for weekly/monthly report
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
$end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';

if (empty($start_date) || empty($end_date)) {
    die("Start date and end date are required.");
}

// Query to get report data
$sql = "SELECT * FROM `orders` WHERE placed_on BETWEEN :start_date AND :end_date";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':start_date', $start_date);
$stmt->bindParam(':end_date', $end_date);
$stmt->execute();

// Query to calculate the total sum of all orders within the date range
$sum_sql = "SELECT SUM(total_price) AS total_sum FROM `orders` WHERE placed_on BETWEEN :start_date AND :end_date";
$sum_stmt = $conn->prepare($sum_sql);
$sum_stmt->bindParam(':start_date', $start_date);
$sum_stmt->bindParam(':end_date', $end_date);
$sum_stmt->execute();

// Fetch the total sum and handle null values
$total_sum = $sum_stmt->fetchColumn();
$total_sum = $total_sum !== null ? $total_sum : 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Report</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .report-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 1000px;
            text-align: center;
        }

        h1 {
            color: #2a9d8f;
            font-size: 32px;
            font-family: 'Georgia', serif;
            margin-bottom: 10px;
        }

        h2 {
            color: #264653;
            font-size: 24px;
            font-family: 'Verdana', sans-serif;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 16px;
            font-family: 'Tahoma', sans-serif;
            color: #333;
        }

        th, td {
            padding: 12px;
            border: 1px solid #e0e0e0;
        }

        th {
            background-color: #e9c46a;
            font-size: 18px;
            font-family: 'Courier New', Courier, monospace;
        }

        td {
            background-color: #f4a261;
            font-family: 'Arial', sans-serif;
            color: #ffffff;
        }

        tr:nth-child(even) td {
            background-color: #2a9d8f;
        }

        .print-btn {
            background-color: #e76f51;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            margin-top: 20px;
            font-size: 18px;
            font-family: 'Verdana', sans-serif;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .print-btn:hover {
            background-color: #d65f41;
        }
    </style>
</head>
<body>

    <div class="report-container">
        <h1>Order Report</h1>
        <h2>From: <?php echo htmlspecialchars($start_date); ?> To: <?php echo htmlspecialchars($end_date); ?></h2>
        <button class="print-btn" onclick="window.print()">Print Report</button>
        
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer Name</th>
                    <th>Order Date</th>
                    <th>Order Items</th>
                    <th>Total Amount (Rs.)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['placed_on']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['total_products']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['total_price']) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Display the total sum of all orders -->
        <h3>Total Sum of All Orders: Rs. <?php echo htmlspecialchars($total_sum); ?></h3>
    </div>

</body>
</html>
