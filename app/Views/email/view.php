<table>
    <thead>
        <tr>
            <th>Sender Email</th>
            <th>Receiver Email</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($email as $emails): ?>
        <tr>
            <td><?= $emails['sender_email'] ?></td>
            <td><?= $emails['receiver_email'] ?></td>
            <td><?= $emails['message'] ?></td>
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

</style>