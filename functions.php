<?php
function clean_text($text) {
    $text = stripslashes($text);
    $text = strip_tags($text);
    $text = htmlentities($text); //prevent cross site scripting
    return $text;
}

function clean_sql($database_connection, $sql) {
    $sql = clean_text($sql);
    $sql = $database_connection->real_escape_string($sql);

    return $sql;
}
?>