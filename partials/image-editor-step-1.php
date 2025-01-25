<?php
    $startUrl = 'image-editor.php?id=' . $_GET['id'];
    $startUrl .= '&step=2';

    $convertAction = '&action=convert';
    $resizeAction = '&action=resize';
    $convertOcrAction = '&action=convert-ocr';
?>

<section class="bg-white">
    <div class="container py-5">
        <div class="image-editor-wrapper">
            <h2>What do you want to do with this image?</h2>

            <div class="row mt-5 justify-content-center align-items-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Convert to JPG/PNG</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec finibus, dui quis iaculis interdum, ex nunc sollicitudin enim, semper feugiat turpis justo ac lacus.</p>
                            <a href="<?php echo $startUrl . $convertAction; ?>" class="btn btn-primary w-100">Start</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Resize</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec finibus, dui quis iaculis interdum, ex nunc sollicitudin enim, semper feugiat turpis justo ac lacus.</p>
                            <a href="<?php echo $startUrl . $resizeAction; ?>" class="btn btn-primary w-100">Start</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Convert with OCR</h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec finibus, dui quis iaculis interdum, ex nunc sollicitudin enim, semper feugiat turpis justo ac lacus.</p>
                            <a href="<?php echo $startUrl . $convertOcrAction; ?>" class="btn btn-primary w-100">Start</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>