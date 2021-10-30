<?php
    if (isset($_POST['upload'])) {
        $target_path  = "./uploads/";
        $target_path .= basename($_FILES['upfile']['name']);
        if (move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) {
            $html = '<p id="success">' . $target_path . ' succesfully uploaded!</p>';
        } else {
            $html = '<p id="warning">Your file was not uploaded.</p>';
        }
    }
?>