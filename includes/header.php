<?php
include("includes/config.php");
include("includes/classes/User.php");
include("includes/classes/Artist.php");
include("includes/classes/Album.php");
include("includes/classes/Song.php");
include("includes/classes/Playlist.php");

//session_destroy(); LOGOUT

if (isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = new User($con, $_SESSION['userLoggedIn']);
	$username = $userLoggedIn->getUsername();
	echo "<script>userLoggedIn = '$username';</script>";
} else {
	header("Location: register.php");
}

?>

<html>

<head>
	<title>Welcome to Musicoholic!</title>
	<link rel="shortcut icon" href="img/title_icon.svg" type="image/x-icon">
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css?v=<?php echo time(); ?>">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/script.js"></script>
</head>

<body>

	<div id="mainContainer">

		<div id="topContainer">

			<?php include("includes/navBarContainer.php"); ?>

			<div id="mainViewContainer">

				<div id="mainContent">