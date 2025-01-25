<?php include_once('partials/header.php'); ?>

<?php include_once('partials/top-nav.php'); ?>

<main>
  <section class="bg-light">
    <div class="container px-5">
      <div class="text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-7 col-md-9 mx-auto">
            <h1 class="fw-light">Easily Manage Files Online for Free</h1>
            <p class="lead text-muted">Quisque maximus nibh id auctor tincidunt. Nam pharetra velit ante.</p>
            <p>
              <a href="pricing.php" class="btn btn-primary my-2">Sign Up for Free</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white">
    <div class="container py-5">
      <form action="functions/upload-file.php"
        class="dropzone"
        id="upload-file-form">
        <div class="dz-message" data-dz-message>Click or Drop files here to upload</div>
      </form>
    </div>
  </section>

  <section class="bg-light">
    <div class="container px-5 py-5">
      <div class="row">
        <div class="col text-center">
          <h2 class="fs-4">Perfect quality</h2>
          <p>Maecenas pulvinar eu felis sed aliquet. Aenean at velit a sem cursus vestibulum</p>
        </div>
        <div class="col text-center">
          <h2 class="fs-4">Lightning Fast</h2>
          <p>Maecenas pulvinar eu felis sed aliquet. Aenean at velit a sem cursus vestibulum</p>
        </div>
        <div class="col text-center">
          <h2 class="fs-4">Easy To Use</h2>
          <p>Maecenas pulvinar eu felis sed aliquet. Aenean at velit a sem cursus vestibulum</p>
        </div>
      </div>

      <div class="row mt-5">
        <div class="col text-center">
          <h2 class="fs-4">Works Anywhere</h2>
          <p>Maecenas pulvinar eu felis sed aliquet. Aenean at velit a sem cursus vestibulum</p>
        </div>
        <div class="col text-center">
          <h2 class="fs-4">Privacy Guaranteed</h2>
          <p>Maecenas pulvinar eu felis sed aliquet. Aenean at velit a sem cursus vestibulum</p>
        </div>
        <div class="col text-center">
          <h2 class="fs-4">It's Free</h2>
          <p>Maecenas pulvinar eu felis sed aliquet. Aenean at velit a sem cursus vestibulum</p>
        </div>
      </div>
    </div>
  </section>
</main>

<?php include_once('partials/bottom-nav.php'); ?>
    
<?php include_once('partials/footer.php'); ?>