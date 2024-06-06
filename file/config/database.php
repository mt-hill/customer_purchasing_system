<?php
  $server_name="localhost";
  $username="root";
  $password="usbw";
  $db_name="newdb";

  $conn = mysqli_connect($server_name, $username, $password, $db_name);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	};
  