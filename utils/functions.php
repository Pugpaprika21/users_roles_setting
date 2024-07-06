<?php

/**
 * @param mixed $data
 * @return void
 */
function dd(mixed $data, $debug = false)
{
    echo "<pre>";
    print_r($data);

    if ($debug) {
        exit;
    }
}
