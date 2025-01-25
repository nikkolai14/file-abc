<?php include_once('partials/header.php'); ?>

<main>
  <section class="bg-white">
    <div class="container py-5">
        <h1>Thank you for using our service!</h1>
        <p>You're file is now ready to be downloaded.</p>
        <a href="functions/download-file.php?id=<?php echo $_GET['id']; ?>" class="btn btn-success">Download</a>
        <a href="/" class="btn btn-primary">Upload More</a>
    </div>
  </section>
</main>

<?php include_once('partials/footer.php'); ?>