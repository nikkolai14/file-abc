<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utilities/transform-result-to-array.php');

function getGuestFile($ipAddress, $fileName)
{
    global $configDbName;

    $sql = "
        SELECT * FROM files
        WHERE ip_address = :ipAddress And file_name = :fileName
    ";

    $db = new SQLite3($configDbName);

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':ipAddress', $ipAddress, SQLITE3_TEXT);
    $stmt->bindValue(':fileName', $fileName, SQLITE3_TEXT);
    $result = $stmt->execute();
    $data = transformResultToArray($result);

    $db->close();

    return $data;
}

function getGuestFileById($id)
{
    global $configDbName;

    $sql = "
        SELECT * FROM files
        WHERE id = :id
    ";

    $db = new SQLite3($configDbName);

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':id', $id, SQLITE3_TEXT);
    $result = $stmt->execute();
    $data = transformResultToArray($result);

    $db->close();

    return $data;
}

function getGuestFileTotal($ipAddress)
{
    global $configDbName;

    $sql = "
        SELECT count(id) AS total FROM files
        WHERE ip_address = :ipAddress
    ";

    $db = new SQLite3($configDbName);

    $stmt = $db->prepare($sql);
    $stmt->bindValue(':ipAddress', $ipAddress, SQLITE3_TEXT);
    $result = $stmt->execute();
    $data = transformResultToArray($result);

    $db->close();

    return $data;
}