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
         <table id="tbl-actividades" class="table table-sm table-striped table-hover table-borderless table-vcenter fs-sm mb-2">
            <thead>
               <tr class="text-uppercase">
                  <th class="fw-bold  text-center">ID</th>
                  <th class="fw-bold  text-center">Unidad Ejecutora</th>
                  <th class="fw-bold  text-center">Servicio</th>
                  <th class="fw-bold  text-center">Fecha de Atenci&oacute;n</th>
                  <th class="fw-bold  text-center">Especialista</th>
                  <th class="fw-bold  text-center">Empresa</th>
                  <th class="fw-bold  text-center">Acciones</th>
               </tr>
            </thead>
            <tbody>
               <?php
               $actividad = $data['actividad'];
               if($actividad){
               for ($a = 0; $a < count($actividad); $a++) {
                  ?>
                  <tr>
                     <td><?= $actividad[$a]['id'] ?></td>
                     <td><?= $actividad[$a]['desc_unidad'] ?></td>
                     <td><?= $actividad[$a]['desctipcion'] ?></td>
                     <td><?= $actividad[$a]['dt_visita'] ?></td>
                     <td><?= $actividad[$a]['nombre_profecional'] ?></td>
                     <td><?= $actividad[$a]['nombre_empresa'] ?></td>
                     <td class="text-center">
                        <div class="btn-group btn-group-sm me-2 mb-2" role="group" aria-label="Small Primary Second group">
                           <button value="<?= $actividad[$a]['id'] ?>" type="button" class="btn btn-eliminar rounded-pill btn-alt-danger btn-eliminar"> <!-- Llama un evento jquery -->
                              <i class="si si-trash"></i>
                           </button>
                           <a href="<?= APP_URI ?>actividades/editar/<?= $actividad[$a]['id'] ?>" type="button" class="btn rounded-pill btn-alt-success mx-sm-1">
                              <i class="si si-pencil"></i>
                           </a>
                           <a href="<?= APP_URI ?>actividades/detalles/<?= $actividad[$a]['id'] ?>" type="button" class="btn rounded-pill btn-alt-secondary mx-sm-1">
                              <i class="si si-list"></i>
                           </a>

                        </div>
                     </td>
                  </tr>
               <?php } }?>
            </tbody>
         </table>
      </div>
   </div>
</div>

<<script src="<?= APP_URI ?>public/pages/actividades.js"></script>