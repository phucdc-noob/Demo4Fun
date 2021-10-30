<?php
    if (isset($_POST['upload'])) {
        $file = $_FILES['upfile']['type'];
        if (move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path) && $file == "text/plain") {
            $html = '<p id="success">' . $target_path . ' succesfully uploaded!</p>';
        } else {
            $html = '<p id="warning">Your file was not uploaded.</p>';
        }
    }
?>