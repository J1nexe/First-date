<?php
require_once 'db_config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Plans History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #ffd6e6;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #ff4d88;
            color: white;
        }
        
        tr:hover {
            background-color: #fff0f5;
        }
        
        h1 {
            color: #ff4d88;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Date Plans History 💝</h1>
    
    <table>
        <tr>
            <th>Date</th>
            <th>Activities</th>
            <th>Restaurant</th>
            <th>Created At</th>
        </tr>
        
        <?php
        try {
            $stmt = $pdo->query("SELECT * FROM date_plans ORDER BY created_at DESC");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $activities = implode(', ', json_decode($row['activities'], true));
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['selected_date']) . "</td>";
                echo "<td>" . htmlspecialchars($activities) . "</td>";
                echo "<td>" . htmlspecialchars($row['restaurant']) . "</td>";
                echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                echo "</tr>";
            }
        } catch(PDOException $e) {
            echo "<tr><td colspan='4'>Error retrieving date plans: " . $e->getMessage() . "</td></tr>";
        }
        ?>
    </table>
</body>
</html> 