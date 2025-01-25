<?php

header('Content-Type: application/json');

require_once($_SERVER['DOCUMENT_ROOT'] . '/configs/file.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utilities/add-guest-file.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utilities/get-guest-file.php');

global $uploadDir;

$guestUploadLimit = 3;

$ipAddress = $_SERVER['REMOTE_ADDR'];

$totalGuestUpload = getGuestFileTotal($ipAddress);
if ($totalGuestUpload[0]['total'] >= $guestUploadLimit) {
    echo json_encode([
        'success' => false,
        'message' => 'You have reached the maximum upload limit for the day.'
    ]);

    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $targetDirectory = $uploadDir;
    $fileType = strtolower(pathinfo(basename($_FILES['file']['name']), PATHINFO_EXTENSION));
    $filename = uniqid() . '.' . $fileType;

    $targetFile = $targetDirectory . $filename;

    $uploadOk = 1;

    $allowedTypes = ['jpg', 'png', 'jpeg', 'pdf'];
    if (!in_array($fileType, $allowedTypes)) {
        echo json_encode([
            'success' => false,
            'message' => 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed.'
        ]);

        exit;
    }

    if ($uploadOk == 0) {
        echo json_encode(['success' => false, 'message' => 'Sorry, your file was not uploaded.']);
    } else {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
            addGuestFile($ipAddress, $filename);
            $uploadedFile = getGuestFile($ipAddress, $filename);

            echo json_encode([
                'success' => true, 
                'message' => 'File uploaded successfully.',
                'file_id' => $uploadedFile[0]['id'],
            ]);
        } else {
            echo json_encode([
                'success' => false, 
                'message' => 'Sorry, there was an error uploading your file.'
            ]);
        }
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'No file was uploaded.'
    ]);
}