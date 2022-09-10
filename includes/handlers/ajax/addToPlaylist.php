<?php
include("../../config.php");


// if (isset($_POST['playlistId']) && isset($_POST['songId'])) {
// 	$playlistId = $_POST['playlistId'];
// 	$songId = $_POST['songId'];
// 	$orderIdQuery = mysqli_query($con, "SELECT MAX(playlistOrder) + 1 as playlistOrder 
// 	FROM playlistsongs 
// 	WHERE playlistId='$playlistId'");

// 	$row = mysqli_fetch_array($orderIdQuery);
// 	$order = $row['playlistOrder'];
// 	if ($order == 'NULL') {
// 		$order = 1;
// 	}
// 	$query = mysqli_query($con, "INSERT INTO playlistsongs (songId , playlistId , playlistOrder)
// 	VALUES('$songId', '$playlistId', '$order')");
// } else {
// 	echo "PlaylistId or songId was not passed into addToPlaylist.php";
// }

if (isset($_POST['playlistId']) && isset($_POST['songId'])) {
	$playlistId = $_POST['playlistId'];
	$songId = $_POST['songId'];

	$alreadyExist = mysqli_query($con, "select id
	from playlistsongs
	where playlistId = '$playlistId' and songId = '$songId';");

	$alreadyExistRow = mysqli_fetch_array($alreadyExist);

	if (!($alreadyExistRow)) {
		$orderIdQuery = mysqli_query($con, "select ifnull(max(playlistOrder)+1 , 1) as playlistOrder
    from playlistsongs
	where playlistId = '$playlistId';");

		$row = mysqli_fetch_array($orderIdQuery);
		$order = $row['playlistOrder'];

		$query = mysqli_query($con, "Insert into playlistsongs(songId , playlistId , playlistOrder)
	values
	('$songId','$playlistId', '$order');");
	}
} else {
	echo "PlaylistId or songId was not passed into addToPlaylist.php";
}
