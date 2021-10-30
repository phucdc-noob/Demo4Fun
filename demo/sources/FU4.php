<?php
    if (isset($_POST['upload'])) {
        $target_path  = "./uploads/";
        $target_path .= basename($_FILES['upfile']['name']);
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
    }
?>