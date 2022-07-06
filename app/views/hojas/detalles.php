<div class="content">
   <div class="block block-rounded block-mode-loading-oneui h-100 mb-4">
      <div class="block-header block-header-default">
         <h3 class="block-title">Registro de Hoja de Atenci&oacute;n</h3>
      </div>
      <div class="block-content block-content-full">
         <?php $hoja = count($data['hoja']) > 0 ? $data['hoja'][0] : null; ?>
         <div class="row g-3 mb-4">
            <!-- ROW 1 -->
            <div class="col">
               Unidad Ejecutora
               <p class="text-muted"><?= $hoja['desc_unidad'] ?></p>
            </div>
            <div class="col">
               Servicio
               <p class="text-muted"><?= $hoja['desctipcion'] ?></p>
            </div>
            <div class="col">
               Fecha de Atenci&oacute;n
               <p class="text-muted"><?= $hoja['dt_atencion'] ?></p>
            </div>
            <div class="col">procesar
               Nombre Especialista
               <p class="text-muted"><?= $hoja['nombre_profecional'] ?></p>
            </div>
         </div>
         <!-- ROW 2 -->
         <div class="row g-3 mb-4">
            <div class="col">
               Lugar de Atencion
               <p class="text-muted"><?= $hoja['lugar_atencion'] == 1 ? "Sede" : "Extramuro" ?></p>
            </div>
            <div class="col">
               Horas Administrativas
               <p class="text-muted"><?= $hoja['h_administrativas'] ?></p>
            </div>
            <div class="col">
               Horas Contratadas
               <p class="text-muted"><?= $hoja['h_contratadas'] ?></p>
            </div>
            <div class="col">
               Horas Utilizadas
               <p class="text-muted"><?= $hoja['h_trabajadas'] ?></p>
            </div>
         </div>
         <!-- ROW 3 -->
         <div class="row g-3 mb-4">
            <div class="col">
               Vacaciones
               <p class="text-muted"><?= $hoja['num_vacaciones'] ?></p>
            </div>
            <div class="col">
               Licencias
               <p class="text-muted"><?= $hoja['num_licencias'] ?></p>
            </div>
            <div class="col">
               Permisos
               <p class="text-muted"><?= $hoja['num_permiso'] ?></p>
            </div>
            <div class="col">
               Incapacidades
               <p class="text-muted"><?= $hoja['num_incapacidad'] ?></p>
            </div>
            <div class="col">
               Fortuitos
               <p class="text-muted"><?= $hoja['num_fortuitas'] ?></p>
            </div>
         </div>
         <!-- ROW 4 -->
         <div class="row g-3 mb-4">
            <div class="col">
               Carga Laboral
               <p class="text-muted"><?= $hoja['carga_laboral'] ?></p>
            </div>
            <div class="col">
               Cupos Utilizados
               <p class="text-muted"><?= $hoja['cupo_utilizado'] ?></p>
            </div>
            <div class="col">
               Cuppos Disponibles
               <p class="text-muted"><?= $hoja['cupo_disponible'] ?></p>
            </div>
            <div class="col">
               Cupos No Acudi&oacute;
               <p class="text-muted"><?= $hoja['cupo_ausente'] ?></p>
            </div>
            <div class="col">
               Cupos No Solicitados
               <p class="text-muted"><?= $hoja['cupo_no_solicitado'] ?></p>
            </div>
         </div>
      </div>
   </div>

   <div class="block block-rounded block-mode-loading-oneui h-100 mb-4">
      <div class="block-header block-header-default">
         <h3 class="block-title">Detalle de Atenciones</h3>
         <div class="block-options">
            <a href="<?= APP_URI ?>atenciones/nueva_hoja" type="button" class="btn-block-option text-primary">
               <i class="si si-plus"></i>
               Nuevo Registro
            </a>
         </div>
      </div>
      <div class="block-content block-content-full">
         <table class="table">
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
               if (isset($data['atenciones'])) {
                  $row = $data['atenciones'];
                  for ($a = 0; $a < count($row); $a++) {
                     ?>
                     <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['num_cedula'] ?></td>
                        <td><?= $row['nombre_empresa'] ?></td>
                        <td><?= $row['tipo_empresa'] ?></td>
                        <td><?= $row[''] ?></td>
                        <td><?= $row[''] ?></td>
                        <td><?= $row[''] ?></td>
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