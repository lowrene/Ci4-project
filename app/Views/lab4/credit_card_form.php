<!DOCTYPE html>
<html>
<head>
    <title>Credit Card Form</title>
    <style>
        /* CSS styles */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container form {
            width: 400px;
            padding: 20px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            box-sizing: border-box; /* Added */
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 4px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333333;
            box-sizing: border-box; /* Added */
        }

        .form-group input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out;
        }

        .form-group input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="POST" action="<?= site_url('credit-card/store') ?>">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="card_number">Card Number:</label>
                <input type="text" id="card_number" name="card_number" pattern="[0-9]+" required>
            </div>
            <div class="form-group">
                <label for="month">Month:</label>
                <select id="month" name="month" required>
                    <option value="">-- Select Month --</option>
                    <?php for ($i = 1; $i <= 12; $i++) : ?>
                        <option value="<?= $i ?>"><?= date('F', mktime(0, 0, 0, $i, 1)) ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <select id="year" name="year" required>
                    <option value="">-- Select Year --</option>
                    <?php for ($i = 2023; $i <= 2063; $i++) : ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>
