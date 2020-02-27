<?php
	if(!isset($_SESSION['admin'])){
		
		echo '
		<script type="text/javascript">
	alert("you are not allow to access this page");
	window.location = "login.php";
</script>

		';
	}

?>

