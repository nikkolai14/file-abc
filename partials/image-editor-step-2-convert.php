<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/configs/file.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utilities/get-guest-file.php');

$file = getGuestFileById($_GET['id']);

if (empty($file)) {
    header('Location: /');
    exit;
}

$filePath = '/uploads/' . $file[0]['file_name'];
$fileType = pathinfo($file[0]['file_name'], PATHINFO_EXTENSION);

?>

<section class="bg-white">
    <div class="container py-5">
        <div class="image-editor-wrapper">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <img src="<?php echo $filePath; ?>" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $file[0]['file_name']; ?></h5>
                            <span class="badge text-bg-primary p-2 text-uppercase"><?php echo $fileType; ?></span>
                            <img src="assets/right-icon.svg" />
                            <span class="badge text-bg-success p-2 text-uppercase" id="image-convert-select-output-badge">png</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <form action="functions/image-convert.php?id=<?php echo $_GET['id']; ?>" method="POST" id="image-convert-form">
                        <label for="image-convert-select-ouput" class="form-label">Select an Output</label>
                        <select class="form-select" id="image-convert-select-ouput" name="image-convert-select-ouput">
                            <option value="png">PNG</option>
                            <option value="jpg">JPG</option>
                        </select>

                        <div class="mt-5">
                            <button type="submit" class="btn btn-success w-100 fs-2">Convert</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>