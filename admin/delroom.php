<?php
    include '../lib/Session.php';
    Session::checkSession();
    include '../config/config.php';
    include '../lib/Database.php';
    include '../helpers/Formate.php';

    $db = new Database();
?>

<?php 
	    if (!isset($_GET['roomId']) || $_GET['roomId'] == NULL) {
	        header("location:viewroom.php");
	    }else {
	        $roomId = $_GET['roomId'];

	        $query = "SELECT * FROM tbl_room WHERE id = '$roomId'";
	        $getData = $db->select($query);
	        if ($getData) {
	        	while ($delimg = $getData->fetch_assoc()) {
	        	    $delink = $delimg['room_img'];
	        	    unlink($delink);
	        	}
	        }

	        $delquery = "DELETE FROM tbl_room WHERE id = '$roomId'";
	        $delpackage = $db->delete($delquery);
	        if ($delpackage) {
	        	echo "<script>alert('Data Delete Successfully');</script>";
	        	header('location:viewroom.php');
	        }else {
	        	echo "<script>alert('Data Delete Not Successfully');</script>";
	        	header('location:viewroom.php');
	        }

	    }

    ?>