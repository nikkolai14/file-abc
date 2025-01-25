<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/configs/db.php');

function addConvertedFile($fileId, $filePath)
{
    global $configDbName;

    $db = new SQLite3($configDbName);

    $stmt = $db->prepare('INSERT INTO converts (file_id, file_path) VALUES (:fileId, :filePath)');
    $stmt->bindValue(':fileId', $fileId, SQLITE3_TEXT);
    $stmt->bindValue(':filePath', $filePath, SQLITE3_TEXT);
    $stmt->execute();

    $db->close();
}