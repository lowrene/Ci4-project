<!DOCTYPE html>
<html>
<head>
    <title>Table with Alternative Row Background Color</title>
    <style>
        .red-bg {
            background-color: red;
        }

        .yellow-bg {
            background-color: yellow;
        }

        .green-bg {
            background-color: green;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
                <tr class="<?= $row['color'] ?>-bg">
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['data'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
