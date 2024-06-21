<?php
session_start(); // Start the session at the beginning

    require_once 'auth.php';

    // 1.1 user enters data -> for
    // 1.2 get form data into variables
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        //2. authenticate
        $user = authenticate($username, $password);

        // 3. login user into the system
        if ($user) {
            login($user);
            print("Welcome, {$username}!" );
        } else {
                print("Wrong credentials!");
        }
    }

    if (isset($_GET['logout'])) {
        logout();
        header("Location: index.php");
        exit;
    }

    if (isset($_POST['unregister'])) {
        if (isset($_SESSION['user'])) {
            $username = $_SESSION['user'][0];
            unregister($username);
            logout();
            header("Location: index.php");
            exit;
        } else {
            print ("Error: No user is logged in.");
        }
    }
    // register('testuser1', 'user1@email.com', '123456');
    // unregister('testuser3')
    
?>
<?if (!is_loged_in()) {?>
<form action="index.php" method="POST">
    <input type="text" name="username" id=""><br>
    <input type="password" name="password" id=""><br>
    <button>ENTER</button>
</form>
<?} else {?>
    <h2>Hey user!</h2>
    <a href="index.php?logout">logout</a><br><br>
    <form action="index.php" method="POST">
        <input type="hidden" name="unregister" value="true">
        <button type="submit">Unregister</button>
    </form>

<? } ?>