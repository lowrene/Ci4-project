<!-- email_edit.php -->
<?php helper('form'); ?>

<h3>Edit Email</h3>


<?= form_open('/email/update/' . $email['id']) ?>
<?= csrf_field() ?>

<div class="form-group">
    <label for="sender_email">Sender Email</label>
    <input type="email" name="sender_email" value="<?= set_value('sender_email', $email['sender_email']) ?>">
    <?= isset($validation) ? '<p class="error">' . $validation->getError('sender_email') . '</p>' : '' ?>
</div>

<div class="form-group">
    <label for="receiver_email">Receiver Email</label>
    <input type="email" name="receiver_email" value="<?= set_value('receiver_email', $email['receiver_email']) ?>">
    <?= isset($validation) ? '<p class="error">' . $validation->getError('receiver_email') . '</p>' : '' ?>
</div>

<div class="form-group">
    <label for="message">Message</label>
    <textarea name="message" cols="45" rows="4"><?= set_value('message', $email['message']) ?></textarea>
    <?= isset($validation) ? '<p class="error">' . $validation->getError('message') . '</p>' : '' ?>
</div>

<div class="form-group">
    <input type="submit" name="submit" value="Update Email">
</div>

<?= form_close() ?>
