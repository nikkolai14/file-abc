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
                    </div>
                </div>
                <div class="col-lg-4">
                    <form action="functions/image-resize.php?id=<?php echo $_GET['id']; ?>" method="POST" id="image-resize-form">
                        <h2>Resize Settings</h2>

                        <div class="row my-4">
                            <div class="col">
                                <label for="image-resize-width" class="form-label">Width(px)</label>
                                <input type="text" class="form-control" id="image-resize-width" name="image-resize-width" required="true">
                            </div>
                            <div class="col">
                                <label for="image-resize-height" class="form-label">Height(px)</label>
                                <input type="text" class="form-control" id="image-resize-height" name="image-resize-height" required="true">
                            </div>
                        </div>

                        <h2>Export Settings</h2>

                        <div class="row mt-4">
                            <div class="col">
                                <label for="image-resize-save-as" class="form-label">Save Image As</label>
                                <select class="form-select" id="image-resize-save-as" name="image-resize-save-as">
                                    <option value="png">PNG</option>
                                    <option value="jpg">JPG</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-5">
                            <button type="submit" class="btn btn-success w-100 fs-2">Resize Image</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>