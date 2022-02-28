<?php
session_start();
if (isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_name'] != "") {
} else {
    header('location:index.php');
}
include('vues/head_dash.php');
include('vues/dashboard/home.php');
include('vues/footer.php');
include('script/script_bootstrap.php');

?>