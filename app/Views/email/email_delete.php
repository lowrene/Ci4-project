<!-- email_delete.php -->

<h3>Delete Email</h3>

<p>Are you sure you want to delete the following email?</p>

<table>
    <tbody>
        <tr>
            <td><strong>Sender Email:</strong></td>
            <td><?= $email['sender_email'] ?></td>
        </tr>
        <tr>
            <td><strong>Receiver Email:</strong></td>
            <td><?= $email['receiver_email'] ?></td>
        </tr>
        <tr>
            <td><strong>Message:</strong></td>
            <td><?= $email['message'] ?></td>
        </tr>
    </tbody>
</table>

<?= form_open('/email/delete/' . $email['id']) ?>
    <input type="submit" name="submit" value="Confirm Delete">
<?= form_close() ?>
