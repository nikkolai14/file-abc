<?php

function transformResultToArray($result) {
    $data = [];
    $tmp = [];
    while ($row = $result->fetchArray()) {
        foreach($row as $key => $val) {
            $tmp[$key] = $val;
        }

        $data[] = $row;
        $tmp = [];
    }

    return $data;
}