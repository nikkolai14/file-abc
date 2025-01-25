<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');

function addGuestFile($ipAddress, $fileName)
{
    global $configDbName;

    $db = new SQLite3($configDbName);

    $stmt = $db->prepare('INSERT INTO files (ip_address, file_name) VALUES (:ipAddress, :fileName)');
    $stmt->bindValue(':ipAddress', $ipAddress, SQLITE3_TEXT);
    $stmt->bindValue(':fileName', $fileName, SQLITE3_TEXT);
    $stmt->execute();

    $db->close();
}