<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utilities/transform-result-to-array.php');

function getConvertedFile($fileId)
{
    global $configDbName;

    $sql = "
        SELECT * FROM converts Where file_id = :fileId
    ";

    $db = new SQLite3($configDbName);

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':fileId', $fileId, SQLITE3_TEXT);
    $result = $stmt->execute();
    $data = transformResultToArray($result);

    $db->close();

    return $data;
}