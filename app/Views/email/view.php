<nav>
  <ul>
    <li><a href="<?= base_url('/email/create') ?>">Create Email</a></li>
    <li><a href="<?= base_url('/email/view') ?>">View Emails</a></li>
  </ul>
</nav>
<table>
    <thead>
        <tr>
            <th>Sender Email</th>
            <th>Receiver Email</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($email as $emails): ?>
        <tr>
            <td><?= $emails['sender_email'] ?></td>
            <td><?= $emails['receiver_email'] ?></td>
            <td><?= $emails['message'] ?></td>
            <td>
                <a href="/email/edit/<?= $emails['id'] ?>" class="btn btn-primary">Edit</a>
                <a href="/email/delete/<?= $emails['id'] ?>" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
        font-family: Arial, sans-serif;
    }

    table th,
    table td {
        padding: 12px;
        border: 1px solid #e0e0e0;
    }

    table th {
        background-color: #f8f8f8;
        text-align: left;
        font-weight: bold;
        color: #333333;
    }

    table tbody tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    table tbody tr:hover {
        background-color: #e0e0e0;
    }

    table td {
        color: #555555;
    }

    table td:first-child {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    table td:last-child {
        max-width: 300px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    table td p {
        margin: 0;
    }

    h3 {
        margin-top: 0;
        margin-bottom: 8px;
        font-size: 16px;
        color: #333333;
    }

    .btn {
        display: inline-block;
        padding: 8px 12px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        cursor: pointer;
    }

    .btn-primary {
        background-color: #4CAF50;
    }

    .btn-danger {
        background-color: #E53935;
    }

    nav {
        background-color: #333;
        color: #fff;
        padding: 10px;
        font-family: Arial, sans-serif;
    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    nav ul li {
        display: inline-block;
        margin-right: 10px;
    }

    nav ul li a {
        color: #fff;
        text-decoration: none;
        padding: 5px;
    }

    nav ul li a:hover {
        background-color: #555;
    }
</style>
