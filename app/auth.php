<?
    function register($username, $email, $password){
        // 1. check if the username is available
        // HW2: try to use if/else in a different maner..
        if (!search($username)) {
            $user = [
                $username,
                $email,
                $password,
                true,
                0.0
            ];

            $fp = fopen('./data/users.csv', 'a');
            fputcsv(
                $fp,
                $user
            );
            fclose($fp);
        } else {
            print ('Error: the username is taken');
        }


        // if (search($username)) {
        //     print('Error: the username is taken');
        // } else {
        //     $user = [
        //         $username,
        //         $email,
        //         $password,
        //         true,
        //         0.0
        //     ];

        //     $fp = fopen('./data/users.csv', 'a');
        //     fputcsv(
        //         $fp,
        //         $user
        //     );
        //     fclose($fp);
        // }
    }
    function unregister($username){

    }
    function authenticate($username, $password){
        // HW: search the user by username and password
        $fp = fopen('./data/users.csv', 'r');
        while (true) {
            $user = fgetcsv($fp);
            if (!search($username) || $user[2] !== $password) {
                print('Error: Invalid username or password');
                break;
            } else if (search($username) && $user[2] === $password) {
                break;
            }
        } 
        fclose($fp);
        return $user;

    }
    function login($username){

    }
    function logout($username){

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
?>