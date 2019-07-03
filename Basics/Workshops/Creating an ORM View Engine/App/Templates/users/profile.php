<?php /** @var \App\Data\UserDTO $data*/?>
<h1>YOUR PROFILE</h1>

<form method="post">
    <div>
        Username: <label>
            <input type="text" value="<?= $data->getUsername();?>" name="username">
        </label>
    </div>
    <div>
        Password: <label>
            <input type="text" required="required" name="password">
        </label>
    </div>
    <div>
        First Name: <label>
            <input type="text" value="<?= $data->getFirstName();?>" name="firstName">
        </label>
    </div>
    <div>
        Last Name: <label>
            <input type="text" value="<?= $data->getLastName();?>"name="lastName">
        </label>
    </div>
    <div>
        Birthday: <label>
            <input type="text" value="<?= $data->getBornOn();?>" name="bornOn">
        </label>
    </div>
    <div>
        <input type="submit" name="edit" value="Edit Profile">
    </div>
</form>

You can <a href="login.php">log out</a> or see <a href="all.php">all users</a>