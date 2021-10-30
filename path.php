<?php 
    if ( isset($_GET[ 'file' ]) ) {
        $file = str_replace( '.', '', $_GET[ 'file' ] );
        echo '<pre>';
        include $file ; // include, require, include_one, require_one for FI :))
        echo '</pre>';
    }
?>

<html>
    <head>
        <title>Path Traversal</title>
    </head>
    <body>
        <div>
            <ul>
                <li><a href="?file=f1.txt">File 1</a></li>
            </ul>
        </div>
    </body>
</html>