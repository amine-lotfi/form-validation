<?php
// funtions to clean and filtrate the entred data

function clean_data($data)
{
    $data = htmlspecialchars($data);
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);

    return $data;
}

function regex_check($expression, $data)
{
    if (preg_match($expression, $data)) {
        return true;
    } else {
        return false;
    }
}

function check_length($data)
{
    if (strlen($data) < 5) {
        return false;
    } else {
        return true;
    }
}
