<h2>Edit Email</h2>
<?php echo validation_errors('<p class="error">', '</p>'); ?>
<?php echo form_open('email/edit/'.$email['id']); ?>
    <label for="sender_email">Sender Email:</label>
    <input type="email" name="sender_email" id="sender_email" required value="<?php echo $email['sender_email']; ?>">

    <label for="receiver_email">Receiver Email:</label>
    <input type="email" name="receiver_email" id="receiver_email" required value="<?php echo $email['receiver_email']; ?>">

    <label for="message">Message:</label>
    <textarea name="message" id="message" rows="5" required><?php echo $email['message']; ?></textarea>

    <input type="submit" value="Update">
<?php echo form_close(); ?>
