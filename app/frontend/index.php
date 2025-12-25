<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Restaurant Recommendation</title>
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            max-width: 450px;
            width: 100%;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: translateY(-5px);
        }

        h1 {
            font-size: 28px;
            color: #333333;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            text-align: left;
            font-weight: 500;
            color: #555555;
        }

        input {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #cccccc;
            font-size: 16px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #4CAF50;
            box-shadow: 0 0 8px rgba(76, 175, 80, 0.4);
        }

        button {
            padding: 12px;
            border-radius: 8px;
            border: none;
            background: #4CAF50;
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background: #45a049;
            transform: scale(1.05);
        }

        .result {
            margin-top: 25px;
            padding: 20px;
            border-radius: 10px;
            font-size: 18px;
            font-weight: 500;
            display: none;
        }

        .result.success {
            background-color: #e6fffa;
            color: #065f46;
            border: 1px solid #34d399;
        }

        .result.error {
            background-color: #fee2e2;
            color: #7f1d1d;
            border: 1px solid #f87171;
        }

        .result.warning {
            background-color: #fef3c7;
            color: #78350f;
            border: 1px solid #fbbf24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Find Your Restaurant</h1>
        <form id="recommendationForm" action="../backend/recommendation.php" method="POST">
            <label for="meal">Enter your favorite meal:</label>
            <input type="text" id="meal" name="meal" placeholder="e.g., Pizza, Sushi" required>
            <button type="submit">Get Recommendation</button>
        </form>
        <div class="result" id="result"></div>
    </div>

    <script>
        const form = document.getElementById('recommendationForm');
        const resultDiv = document.getElementById('result');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(form);

            const response = await fetch(form.action, {
                method: 'POST',
                body: formData
            });

            const text = await response.text();
            resultDiv.style.display = 'block';
            resultDiv.innerHTML = text;

            if(text.includes("No recommendations")) {
                resultDiv.className = 'result error';
            } else if(text.includes("Please enter")) {
                resultDiv.className = 'result warning';
            } else {
                resultDiv.className = 'result success';
            }
        });
    </script>
</body>
</html>