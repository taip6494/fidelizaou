<?php
session_start();
if (isset($_SESSION['sess_user_id']) && $_SESSION['sess_user_Role'] && $_SESSION['sess_user_nom']!= "") {
} else {
    header('location:index.php');
}



include('vues/head_dash.php');
include('vues/dashboard/form_add_point.php');
include('vues/footer.php');
include('script/script_bootstrap.php');

?>