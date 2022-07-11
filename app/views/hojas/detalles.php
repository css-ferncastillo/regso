<div class="content">
   <div class="block block-rounded block-mode-loading-oneui h-100 mb-4">
      <div class="block-header block-header-default">
         <h3 class="block-title">Registro de Hoja de Atenci&oacute;n</h3>
      </div>
      <div class="block-content block-content-full">
         <?php $hoja = count($data['hoja']) > 0 ? $data['hoja'][0] : null; ?>
         <div class="row mb-2">
            <!-- ROW 1 -->
            <div class="col-sm-6 col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Unidad Ejecutora
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['desc_unidad'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-sm-6 col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Servicio
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['desctipcion'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-sm-6 col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Fecha de Atenci&oacute;n
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['dt_atencion'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-sm-6 col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Nombre Especialista
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['nombre_profecional'] ?>
                  </strong>
               </p>
            </div>
         </div>
         <!-- ROW 2 -->
         <div class="row mb-2">
            <div class="col-sm-6 col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Lugar de Atencion
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['lugar_atencion'] == 1 ? "Sede" : "Extramuro" ?>
                  </strong>
               </p>
            </div>
            <div class="col-sm-6 col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Horas Administrativas
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['h_administrativas'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-sm-6 col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Horas Contratadas
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['h_contratadas'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-sm-6 col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Horas Utilizadas
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['h_trabajadas'] ?>
                  </strong>
               </p>
            </div>
         </div>
         <!-- ROW 3 -->
         <div class="row mb-2">
            <div class="col-md-2">
               <p class="pb-3 mb-0 small lh-sm">
                  Vacaciones
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['num_vacaciones'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-2">
               <p class="pb-3 mb-0 small lh-sm">
                  Licencias
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['num_licencias'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-2">
               <p class="pb-3 mb-0 small lh-sm">
                  Permisos
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['num_permiso'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-2">
               <p class="pb-3 mb-0 small lh-sm">
                  Incapacidades
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['num_incapacidad'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-2">
               <p class="pb-3 mb-0 small lh-sm">
                  Fortuitos
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['num_fortuitas'] ?>
                  </strong>
               </p>
            </div>
         </div>
         <!-- ROW 4 -->
         <div class="row mb-2">
            <div class="col-md-2">
               <p class="pb-3 mb-0 small lh-sm">
                  Descarga Laboral
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['carga_laboral'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-2">
               <p class="pb-3 mb-0 small lh-sm">
                  Cupos Utilizados
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['cupo_utilizado'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-2">
               <p class="pb-3 mb-0 small lh-sm">
                  Cupos Disponibles
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['cupo_disponible'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-2">
               <p class="pb-3 mb-0 small lh-sm">
                  Cupos No Acudi&oacute;
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['cupo_ausente'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-2">
               <p class="pb-3 mb-0 small lh-sm">
                  Cupos No Solicitados
                  <strong class="d-block text-gray-dark">
                     <?= $hoja['cupo_no_solicitado'] ?>
                  </strong>
               </p>
            </div>
         </div>
      </div>
   </div>

   <div class="block block-rounded block-mode-loading-oneui h-100 mb-4">
      <div class="block-header block-header-default">
         <h3 class="block-title">Detalle de Atenciones</h3>
         <div class="block-options">
            <a href="<?= APP_URI ?>atenciones/crear/<?= $data['id'] ?>" type="button" class="btn-block-option text-primary">
               <i class="si si-plus"></i>
               Nuevo Registro
            </a>
         </div>
      </div>
      <div class="block-content block-content-full">
         <table class="table table-responsive table-sm" id="tbl-atenciones">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Cedula</th>
                  <th>Empresa</th>
                  <th>Tipo Empresa</th>
                  <th>Actividad Economica</th>
                  <th>Tipo Paciente</th>
                  <th>Acciones</th>
               </tr>
            </thead>
            <tbody>
               <?php
               if (($data['atenciones'])) {
                  $row = $data['atenciones'];
                  for ($a = 0; $a < count($row); $a++) {
                     ?>
                     <tr>
                        <td><?= $row[$a]['id'] ?></td>
                        <td><?= $row[$a]['num_cedula'] ?></td>
                        <td><?= $row[$a]['nombre_empresa'] ?></td>
                        <td><?= $row[$a]['tipo_empresa'] ?></td>
                        <td><?= $row[$a]['actividad_economica'] ?></td>
                        <td><?= $row[$a]['tipo_asegurado'] ?></td>
                        <td>
                           <div class="btn-group btn-group-sm me-2 mb-2" role="group">
                              <button type="button" value="<?= $row[$a]['id'] ?>" class="btn rounded-pill btn-alt-danger mx-sm-1 btn-eliminar">
                                 <i class="si si-trash"></i>
                              </button>
                              <a href="<?= APP_URI ?>atenciones/editar/<?= $row[$a]['id'] ?>" type="button" class="btn rounded-pill btn-alt-success mx-sm-1">
                                 <i class="si si-pencil"></i>
                              </a>
                              <a href="<?= APP_URI ?>atenciones/detalles/<?= $row[$a]['id'] ?>" type="button" class="btn rounded-pill btn-alt-secondary mx-sm-1">
                                 <i class="si si-list"></i>
                              </a>
                           </div>
                        </td>
                     </tr>
                     <?php
                  }
               }
               ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<<script src="<?= APP_URI ?>public/pages/nueva_atencion.js"></script>