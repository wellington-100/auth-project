<?
    function register($username, $email, $password){

        if (search($username)) {
            print('Error: the username is taken');
        } else {
            $user = [
                $username,
                $email,
                password_hash($password, PASSWORD_DEFAULT),
                true,
                0.0
            ];

            $fp = fopen('./data/users.csv', 'a');
            fputcsv(
                $fp,
                $user
            );
            fclose($fp);
        }
    }
    function unregister($username){
        // HW*: remove the user by username
        // 1. read from users.csv
        // 2. open for writing temp.csv
        // 3. loop through the original + condition
        // 4. if the condition fails -> copy temp.csv, ignore the one to delete
        // 5. remove the users.csv file
        // 6. rename temp.csv -> users.csv

        $fp = fopen('./data/users.csv', 'r');
        $temp_fp = fopen('./data/temp.csv', 'w');

        while ($user = fgetcsv($fp)) {
            if ($user[0] !== $username) {
                fputcsv($temp_fp, $user);
            }
        }

        fclose($fp);
        fclose($temp_fp);

        unlink('./data/users.csv');
        rename('./data/temp.csv', './data/users.csv');
    }
    function authenticate($username, $password){
        // HW: compare hashes!!!
        $user = search($username);

        if (!$user || !password_verify($password, $user[2] ?? '')) {
            print ('Error: Invalid username or password');
            return false;
        } else {
            // print ("Succes autenticate!!!");
            return $user;
        }
    }

    function login($user){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        unset($user[2]);
        $_SESSION['user'] = $user;
    }

    function is_loged_in(){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        return isset($_SESSION['user']);
    }

    function logout(){
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        unset($_SESSION['user']);
    }
    function search($username){
        $fp = fopen('./data/users.csv', 'r');
        while (true) {
            $user = fgetcsv($fp);
            if ($user === false || $user[0] === $username) {
                break;
            }
        } 
        fclose($fp);
        return $user;
    }
