<form action="/email/create" method="post">
    <?= csrf_field() ?>
    <div class="form-group">
        <label for="sender_email">Sender Email</label>
        <input type="email" name="sender_email" value="<?= set_value('sender_email') ?>">
    </div>

    <div class="form-group">
        <label for="receiver_email">Receiver Email</label>
        <input type="email" name="receiver_email" value="<?= set_value('receiver_email') ?>">
    </div>

    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" cols="45" rows="4"><?= set_value('message') ?></textarea>
    </div>

    <div class="form-group">
        <input type="submit" name="submit" value="Send Email">
    </div>
</form>

<style>
    /* CSS styles */
    .form-group {
        margin-bottom: 15px;
        font-family: Arial, sans-serif;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group input[type="email"],
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #e0e0e0;
        border-radius: 4px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        color: #333333;
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
    }
</style>
