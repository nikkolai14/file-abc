<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/functions/image-ocr.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utilities/get-converted-file.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/configs/file.php');

global $downloadsDir;

$convertedSuccess = convertImgtoText($_GET['id']);

if (! $convertedSuccess) {
    header('Location: /');
    exit;
}

$convertedFile = getConvertedFile($_GET['id']);

if (empty($convertedFile)) {
    header('Location: /');
    exit;
}

$downloadedFilePath = $downloadsDir . $convertedFile[0]['file_path'];

$fileContent = '';
if (file_exists($downloadedFilePath)) {
    $fileContent = file_get_contents($downloadedFilePath);
} else {
    header('Location: /');
    exit;
}

?>

<section class="bg-white">
    <div class="container py-5">
        <div class="image-editor-wrapper">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <?php echo nl2br(htmlspecialchars($fileContent)); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <a href="functions/download-file.php?id=<?php echo $_GET['id']; ?>" class="btn btn-success w-100 fs-2">Download</a>
                </div>
            </div>
        </div>
    </div>
</div>