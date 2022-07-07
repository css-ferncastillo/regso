<div class="content">
   <div class="block block-rounded bg-transparent bg-image" style="background-image: url('<?= APP_URI ?>public/assets/media/photos/actividad_ban.jpg');">
      <div class="block-content block-content-full bg-primary-dark-op">
         <div class="py-4">
            <h1 class="h3 text-center text-white-50 fw-bold mb-2">
               <?= $title_page ?>
            </h1>
         </div>
      </div>
   </div>
   <div class="block block-rounded block-mode-loading-oneui h-100 mb-2">
      <div class="block-header block-header-default">
         <h3 class="block-title">Atenciones</h3>
         <div class="block-options">
            <a href="<?= APP_URI ?>actividades/crear" type="button" class="btn-block-option text-primary">
               <i class="si si-plus"></i>
               Nuevo Registro
            </a>
         </div>
      </div>
      <div class="block-content block-content-full">
         <table id="tbl_hojas" class="table table-sm table-striped table-hover table-borderless table-vcenter fs-sm mb-2">
            <thead>
               <tr class="text-uppercase">
                  <th class="fw-bold  text-center">ID</th>
                  <th class="fw-bold  text-center">Unidad Ejecutora</th>
                  <th class="fw-bold  text-center">Servicio</th>
                  <th class="fw-bold  text-center">Fecha de Atenci&oacute;n</th>
                  <th class="fw-bold  text-center">Especialista</th>
                  <th class="fw-bold  text-center">Atenciones</th>
                  <th class="fw-bold  text-center">Acciones</th>
               </tr>
            </thead>
            <tbody>

            </tbody>
         </table>
      </div>
   </div>
</div>