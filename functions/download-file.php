<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/utilities/get-converted-file.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/configs/file.php');

global $downloadsDir;

$convertedFile = getConvertedFile($_GET['id']);

if (empty($convertedFile)) {
    header('Location: /');
    exit;
}

$downloadedFilePath = $downloadsDir . $convertedFile[0]['file_path'];

if (file_exists($downloadedFilePath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/force-download');
    header("Content-Disposition: attachment; filename=\"" . basename($downloadedFilePath) . "\";");
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($downloadedFilePath));
    ob_clean();
    flush();
    readfile($downloadedFilePath);
} else {
    header('Location: /');
    exit;
}