<?
    session_start();

    if (!isset($_SESSION['views'])){
        $_SESSION['views'] = 0;
    }

    $_SESSION['views'] += 1;

    if($_SESSION['views'] <= 3) {
        $baner = "<img src='https://c8.alamy.com/comp/W3E09A/example-ribbon-example-isolated-sign-example-banner-W3E09A.jpg' width='700' height='300'>";
        print $baner;
    }

    print '</br> Your visits: ' . $_SESSION['views'] . ' times';
