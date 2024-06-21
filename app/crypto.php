<?
    // Hash the text (md5)
  
  
    $bytes = file_get_contents("lock.png");

    $hash = md5($bytes);

    print(strlen($hash));
    print('</br>');
    print($hash);
?>