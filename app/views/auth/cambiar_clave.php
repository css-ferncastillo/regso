
<div class="content">
   <div class="block block-rounded">
      <div class="block-header block-header-default">
         <h3 class="block-title">Cambiar Contrase&ntilde;a <small><?= $data[0]['correo'] ?></small></h3>
      </div>
      <div class="block-content">
         <form action="<?= APP_URI ?>usuario/cambiar_clave/<?= $data[0]['id'] ?>" method="POST">
            <div class="row push">
               <div class="col-lg-4">

               </div>
               <div class="col-lg-8 col-xl-5">
                  <div class="mb-4">
                     <label class="form-label" for="clave">Contrase&ntilde;a Actual</label>
                     <input type="password" class="form-control" id="clave" name="clave">
                  </div>
                  <div class="row mb-4">
                     <div class="col-12">
                        <label class="form-label" for="clavea">Nueva Contrase&ntilde;a</label>
                        <input type="password" class="form-control" id="clavea" name="clavea">
                     </div>
                  </div>
                  <div class="row mb-4">
                     <div class="col-12">
                        <label class="form-label" for="claveb">Confirmar Nueva Contrase&ntilde;a</label>
                        <input type="password" class="form-control" id="claveb" name="claveb">
                     </div>
                  </div>
                  <div class="mb-4">
                     <button type="submit" class="btn btn-alt-primary">
                        Actualizar
                     </button>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>

</div>