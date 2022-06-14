<div class="hero-static d-flex align-items-center">
  <div class="w-100">
    <div class="bg-body-light">
      <div class="content content-full">
        <div class="row g-0 justify-content-center">
          <div class="col-md-8 col-lg-6 col-xl-4 py-4 px-4 px-lg-5">
            <div class="text-center">
              <p class="mb-2">
                <img src="<?= APP_URI ?>public/assets/media/photos/csslogoazul.png" height="120">
              </p>
              <h1 class="h4 mb-1">
                Iniciar Sesi&oacute;n
              </h1>
              <p class="fw-medium text-muted mb-3">
                Sistema de Registro Estad&iacute;stico
                </h2>
            </div>
            <?php if(isset($error)){ ?>
            <div class="alert <?=$error['class'] ?> alert-dismissible" role="alert">
              <p class="mb-0">
                <?=$error['message'] ?>!
              </p>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i class="fa-solid fa-times"></i></button>
            </div>
            <?php } ?>
            <form class="js-validation-signin" action="<?=APP_URI?>home/autenticar" method="POST">
              <div class="py-3">
                <div class="mb-4">
                  <input type="text" class="form-control form-control-lg form-control-alt" id="login-username" name="login-username" placeholder="Correo Institucional">
                </div>
                <div class="mb-4">
                  <input type="password" class="form-control form-control-lg form-control-alt" id="login-password" name="login-password" placeholder="Contrase&ntilde;a">
                </div>

              </div>
              <div class="row justify-content-center">
                <div class="col-lg-6 col-xxl-5">
                  <button type="submit" class="btn w-100 btn-alt-primary">
                    <i class="fa fa-fw fa-sign-in-alt me-1 opacity-50"></i> Iniciar Sesi&oacute;n
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="fs-sm text-center text-muted py-3">
      <strong>Sistema de Registro Estadistico <br> Salud Ocupacional </strong> &copy; <span data-toggle="year-copy"><?php echo date('Y') ?></span>
    </div>
  </div>
</div>