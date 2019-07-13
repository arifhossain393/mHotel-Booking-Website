<?php
    include '../lib/Session.php';
    Session::checkSession();
    include '../config/config.php';
    include '../lib/Database.php';
    include '../helpers/Formate.php';

    $db = new Database();
?>

<?php 
	    if (!isset($_GET['foodId']) || $_GET['foodId'] == NULL) {
	        header("location:viewresturent.php");
	    }else {
	        $foodId = $_GET['foodId'];

	        $query = "SELECT * FROM tbl_resturent WHERE id = '$foodId'";
	        $getData = $db->select($query);
	        if ($getData) {
	        	while ($delimg = $getData->fetch_assoc()) {
	        	    $delink = $delimg['food_img'];
	        	    unlink($delink);
	        	}
	        }

	        $delquery = "DELETE FROM tbl_resturent WHERE id = '$foodId'";
	        $delfood = $db->delete($delquery);
	        if ($delfood) {
	        	echo "<script>alert('Data Delete Successfully');</script>";
	        	header('location:viewresturent.php');
	        }else {
	        	echo "<script>alert('Data Delete Not Successfully');</script>";
	        	header('location:viewresturent.php');
	        }

	    }

    ?>