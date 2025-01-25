<?php include_once('partials/header.php'); ?>

<?php if ($_GET['step'] === '1') : ?>
    <?php include('partials/image-editor-step-1.php'); ?>
<?php elseif ($_GET['step'] === '2') : ?>
    <?php if ($_GET['action'] === 'convert') : ?>
        <?php include('partials/image-editor-step-2-convert.php'); ?>
    <?php elseif ($_GET['action'] === 'resize') : ?>
        <?php include('partials/image-editor-step-2-resize.php'); ?>
    <?php elseif ($_GET['action'] === 'convert-ocr') : ?>
        <?php include('partials/image-editor-step-2-convert-ocr.php'); ?>
    <?php endif;?>
<?php endif;?>

<?php include_once('partials/footer.php'); ?>