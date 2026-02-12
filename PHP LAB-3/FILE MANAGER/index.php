<?php
$template = file_get_contents("file_manager.html");

$rows = "";
$files = scandir("uploads");

foreach ($files as $file) {
    if ($file != "." && $file != "..") {

        $path = "uploads/" . $file;

        $rows .= "<tr>";
        $rows .= "<td>$file</td>";
        $rows .= "<td>" . filesize($path) . "</td>";
        $rows .= "<td>" . date("d-m-Y H:i:s", fileatime($path)) . "</td>";
        $rows .= "<td>" . date("d-m-Y H:i:s", filemtime($path)) . "</td>";
        $rows .= "<td><a class='download' href='download.php?file=$file'>Download</a></td>";
        $rows .= "<td><a class='delete' href='delete.php?file=$file'>Delete</a></td>";
        $rows .= "</tr>";
    }
}


echo str_replace("{{ROWS}}", $rows, $template);
?>
