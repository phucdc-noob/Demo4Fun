<?php
// Rendering?
if (isset($_GET['level'])) {
	$level = (int)$_GET['level'];
	switch ($level) {
		case 1:
			$title = 'Upload your text file here';
			$html = '<p id="warning">Please upload .txt file only!</p>';
			$source = 'sources/FU1.php';
			break;
		case 2:
			$title = 'Upload your text file here';
			$html = '<p id="warning">Please upload .txt file only!</p>';
			$source = 'sources/FU2.php';
			break;
		case 3:
			$title = 'Upload your image file here';
			$html = '<p id="warning">Please upload .jpeg/.jpg/.png/.gif file only!</p>';
			$source = 'sources/FU3.php';
			break;
		case 4:
			$title = 'Upload your image file here';
			$html = '<p id="warning">Please upload .jpeg/.jpg/.png/.gif file only!</p>';
			$source = 'sources/FU4.php';
			break;
		default:
			break;
	}
}

//upfile filter?
if (isset($_POST['upload'])) {
	$target_path  = "./uploads/";
	$target_path .= basename($_FILES['upfile']['name']);
	switch ($level) {
		case 1:
			if (move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) {
				$html = '<p id="success">' . $target_path . ' succesfully uploaded!</p>';
			} else {
				$html = '<p id="warning">Your file was not uploaded.</p>';
			}
			break;
		case 2:
			$file = $_FILES['upfile']['type'];
			if (move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path) && $file == "text/plain") {
				$html = '<p id="success">' . $target_path . ' succesfully uploaded!</p>';
			} else {
				$html = '<p id="warning">Your file was not uploaded.</p>';
			}
			break;
		case 3:
			$extension = strtolower(substr($_FILES['upfile']['name'], strrpos($_FILES['upfile']['name'], '.') + 1));
			if (($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension = 'gif') && (getimagesize($_FILES['upfile']['tmp_name']))) {
				if (move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) {
					$html = '<p id="success">' . $target_path . ' succesfully uploaded!</p>';
				} else {
					$html = '<p id="warning">Your file was not uploaded.</p>';
				}
			} else {
				$html = '<p id="warning">Your file was not uploaded.</p>';
			}
			break;
		case 4:
			$extension = strtolower(substr($_FILES['upfile']['name'], strrpos($_FILES['upfile']['name'], '.') + 1));
			$mime = explode('/', mime_content_type($_FILES['upfile']['tmp_name']))[0];
			if (($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension = 'gif') && (getimagesize($_FILES['upfile']['tmp_name'])) && $mime == 'image') {
				if (move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) {
					$html = '<p id="success">' . $target_path . ' succesfully uploaded!</p>';
				} else {
					$html = '<p id="warning">Your file was not uploaded.</p>';
				}
			} else {
				$html = '<p id="warning">Your file was not uploaded.</p>';
			}
			break;
		default:
			break;
	}
}
?>

<html>

<head>
	<title><?php echo $title; ?></title>
	<style>
		h1 {
			font-family: sans-serif;
		}

		#success {
			font-family: sans-serif;
			color: green;
		}

		#warning {
			font-family: sans-serif;
			color: red;
		}
	</style>
</head>

<body style="font-family: Sans-serif;">
	<div style="text-align: center; border: 1px black solid; border-radius: 10px">
		<h1><?php echo $title; ?></h1>
		<br>
		<div>
			<form enctype="multipart/form-data" action="" method="POST">
				<input name="upfile" type="file" /><br>
				<input type="submit" name="upload" value="Upload">
			</form>
		</div>
		<?php echo $html; ?>
	</div>
	<div style="border: 1px black solid; border-radius: 10px; font-size: 20px; font-weight: bolder;">
		<p>Source code:</p><br>
		<?php highlight_file( $source ); ?>
	</div>
</body>

</html>