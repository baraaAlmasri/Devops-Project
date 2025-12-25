<?php
include './db_config.php';

$meal = $_POST['meal'] ?? '';

echo "<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Restaurant Recommendation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            padding: 20px;
        }
        .message {
            max-width: 500px;
            margin: 60px auto;
            padding: 25px;
            border-radius: 8px;
            text-align: center;
            font-size: 18px;
        }
        .success {
            background: #e6fffa;
            color: #065f46;
            border: 1px solid #34d399;
        }
        .error {
            background: #fee2e2;
            color: #7f1d1d;
            border: 1px solid #f87171;
        }
        .warning {
            background: #fef3c7;
            color: #78350f;
            border: 1px solid #fbbf24;
        }
    </style>
</head>
<body>";
if (!empty($meal)) {

    $sql = "SELECT name, cuisine, rating 
            FROM restaurants 
            WHERE cuisine LIKE ? 
            ORDER BY rating DESC 
            LIMIT 1";

    $stmt = $conn->prepare($sql);
    $search = "%$meal%";
    $stmt->bind_param('s', $search);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<div class='message success'>
                🍽️ <strong>We recommend</strong><br><br>
                {$row['name']}<br>
                Cuisine: {$row['cuisine']}<br>
                Rating: ⭐ {$row['rating']}
              </div>";
    } else {
        echo "<div class='message error'>
                ❌ No recommendations found for <strong>$meal</strong>
              </div>";
    }

    $stmt->close();

} else {
    echo "<div class='message warning'>
            ⚠️ Please enter a meal to get a recommendation
          </div>";
}

$conn->close();

echo "</body></html>";
?>