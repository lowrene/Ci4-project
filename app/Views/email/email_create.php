<nav>
  <ul>
    <li><a href="<?= base_url('/email/create') ?>">Create Email</a></li>
    <li><a href="<?= base_url('/email/view') ?>">View Emails</a></li>
  </ul>
</nav>

<div class="container">
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
</div>

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

    .form-group input[type="email"],
    .form-group textarea {
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

