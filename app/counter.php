<?php

session_start();

if (!isset($_SESSION['views'])) {
    $_SESSION['views'] = 0;
}

$_SESSION['views'] += 1;

if ($_SESSION['views'] <= 3) {
    $baner = "<img src='https://c8.alamy.com/comp/W3E09A/example-ribbon-example-isolated-sign-example-banner-W3E09A.jpg' width='700' height='300'>";
    print $baner;
}

print '</br> Your visits: ' . $_SESSION['views'] . ' times';

// unset($_SESSION['views']);


// HW1: create counter.php
//  1.check first visit
//  2.set the $views
//  3.increase $views
//  4.print counter

// HW2: set a banner for first 3 visits
?>