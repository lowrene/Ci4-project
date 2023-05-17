<h2>Email List</h2>
<a href="<?php echo base_url('email/create'); ?>">Create New Email</a>

<?php if (!empty($emails)): ?>
    <table>
        <thead>
            <tr>
                <th>Sender Email</th>
                <th>Receiver Email</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($emails as $email): ?>
                <tr>
                    <td><?php echo $email['sender_email']; ?></td>
                    <td><?php echo $email['receiver_email']; ?></td>
                    <td><?php echo $email['message']; ?></td>
                    <td>
                        <a href="<?php echo base_url('email/edit/'.$email['id']); ?>">Edit</a>
                        <a href="<?php echo base_url('email/delete/'.$email['id']); ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No emails found.</p>
<?php endif; ?>