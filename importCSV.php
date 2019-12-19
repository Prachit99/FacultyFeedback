<?php
session_start();
include ('../config/db_config.php');
if (isset($_POST["importStudent"])) {

	$fileName = $_FILES["file"]["tmp_name"];

	if ($_FILES["file"]["size"] > 0) {

		$fp = fopen($fileName, "r");

		while (($row = fgetcsv($fp, "500", ",")) != FALSE)
		{
			print_r($row);
			$sql = "INSERT INTO student VALUES('" . implode("','", $row) . "',0)";
			if (!$conn->query($sql))
			{
				echo '<br>Data No Insert<br>';
			}
		}
		fclose($fp);

	}
}

if (isset($_POST["importFaculty"])) {

	$fileName = $_FILES["file"]["tmp_name"];

	if ($_FILES["file"]["size"] > 0) {

		$fp = fopen($fileName, "r");

		while (($row = fgetcsv($fp, "500", ",")) != FALSE)
		{
			print_r($row);
			$sql = "INSERT INTO faculty VALUES('" . implode("','", $row) . "')";
			if (!$conn->query($sql))
			{
				echo '<br>Data No Insert<br>';
			}
		}
		fclose($fp);

	}
}
?>