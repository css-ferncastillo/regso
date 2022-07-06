<div class="hero">
  <div class="hero-inner text-center">
    <div class="bg-body-extra-light">
      <div class="content content-full overflow-hidden">
        <div class="py-4">
          <h1 class="display-1 fw-bolder text-modern">
            <?= $code ?>
          </h1>
          <h2 class="h4 fw-normal text-muted mb-5">
          <strong> <?= $mensaje ?></strong>
          </h2>
          <form action="be_pages_generic_search.html" method="POST">
            <div class="row justify-content-center mb-4">
              <div class="col-sm-6 col-xl-3">
                <div class="input-group input-group-lg">
                  <p class="mb-1 text-muted">
                    Ruta del error: <?php trim($ruta, '\n.') ?> <br>
                    Error encontrado en <?php echo $file, ' en la linea: ', $line ?>
                  </p>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="content content-full text-muted fs-sm fw-medium">
      <a class="link-fx" href="<?= APP_URI; ?>">Volver a página principal</a>
    </div>
  </div>
</div>