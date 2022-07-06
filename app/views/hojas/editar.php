<div class="content">
   <?php $record = $data['row'][0] ?>
   <div class="block block-rounded block-mode-loading-oneui h-100 mb-0">
      <div class="block-header block-header-default">
         <h3 class="block-title"><?= $title_page . $data['id']; ?></h3>
      </div>
      <div class="block-content block-content-full">
         <form id="frm-nueva-hoja" action="<?= APP_URI ?>hojas/procesar_edicion" method="POST">
            <input type="text" id="id" name="id" hidden value="<?= $data['id'] ?>">
            <div class="row g-3 mb-4">
               <!-- ROW 1 -->
               <div class="col">
                  <label for="id_unidad" class="form-label">Unidad Ejecutora</label>
                  <select class="form-select" aria-label="Unidad Ejecutora" id="id_unidad" name="id_unidad">
                     <option selected value="">Selecciona una Unidad</option>
                     <?php

                     $unidades = $data['unidades'];
                     for ($u = 0; $u < count($unidades); $u++) {
                        if ($record['id_unidad'] == $unidades[$u]['id']) {
                           echo '<option value="' . $unidades[$u]['id'] . '" selected="true">' . $unidades[$u]['desc_prov'] . ' - ' . $unidades[$u]['desc_unidad'] . '</option>';
                        } else {
                           echo '<option value="' . $unidades[$u]['id'] . '">' . $unidades[$u]['desc_prov'] . ' - ' . $unidades[$u]['desc_unidad'] . '</option>';
                        }
                     }
                     ?>
                  </select>
                  <small id="id_unidad_help" class="form-text text-danger" hidden>Campo requerido</small>
               </div>
               <div class="col">
                  <label for="id_servicio" class="form-label">Servicio</label>
                  <select class="form-select" aria-label="Servicio" id="id_servicio" name="id_servicio">
                     <option selected value="">Selecciona un Servicio</option>
                     <?php
                     $servicios = $data['servicios'];
                     for ($s = 0; $s < count($servicios); $s++) {
                        if ($record['id_servicio'] == $servicios[$s]['id']) {
                           echo '<option value="' . $servicios[$s]['id'] . '" selected="true">' . $servicios[$s]['desctipcion'] . '</option>';
                        } else {
                           echo '<option value="' . $servicios[$s]['id'] . '">' . $servicios[$s]['desctipcion'] . '</option>';;
                        }
                     }

                     ?>
                  </select>
                  <small id="id_servicio_help" class="form-text text-danger" hidden>Campo requerido</small>
               </div>
               <div class="col" id="datetime">
                  <label for="dt_atencion" class="form-label">Fecha de Atenci&oacute;n</label>
                  <input type="text" class="form-control" placeholder="Fecha de Atenci&oacute;n" aria-label="Last name" id="dt_atencion" name="dt_atencion" value="<?= $record['dt_atencion'] ?>">
                  <small id="dt_atencion_help" class="form-text text-danger" hidden>Campo requerido</small>
               </div>
               <div class="col">
                  <label for="nombre_profecional" class="form-label">Nombre Especialista</label>
                  <input type="text" class="form-control" placeholder="Nombre Especialista" aria-label="Last name" id="nombre_profecional" name="nombre_profecional" value="<?= $record['nombre_profecional'] ?>">
                  <small id="nombre_profecional_help" class="form-text text-danger" hidden>Campo requerido</small>
               </div>
            </div>
            <!-- ROW 2 -->
            <div class="row g-3 mb-4">
               <div class="col">
                  <label for="lugar_atencion" class="form-label">Lugar de Atencion</label>
                  <select class="form-select" aria-label="Unidad Ejecutora" id="lugar_atencion" name="lugar_atencion">
                     <option selected>Selecciona un Lugar de Atenci&oacute;n</option>
                     <?php
                     if ($record['lugar_atencion'] == 1) {
                        echo '<option value="1" selected="true">Sede</option><option value="2">Extramuro</option>';
                     } else {
                        echo '<option value="1">Sede</option><option value="2" selected="true">Extramuro</option>';
                     }
                     ?>
                  </select>
                  <small id="lugar_atencion_help" class="form-text text-danger" hidden>Campo requerido</small>
               </div>
               <div class="col">
                  <label for="h_contratadas" class="form-label">Horas Administrativas</label>
                  <input type="number" class="form-control" placeholder="Horas Administrativas" aria-label="Last name" id="h_contratadas" name="h_contratadas" min="0" max="24" value="<?= $record['h_contratadas'] ?>">
                  <small id="h_contratadas_help" class="form-text text-danger" hidden>Campo requerido</small>
               </div>
               <div class="col">
                  <label for="h_trabajadas" class="form-label">Horas Contratadas</label>
                  <input type="number" class="form-control" placeholder="Horas Contratadas" id="h_trabajadas" name="h_trabajadas" aria-label="Last name" min="0" max="24" value="<?= $record['h_trabajadas'] ?>">
                  <small id="h_trabajadas_help" class="form-text text-danger" hidden>Campo requerido</small>
               </div>
               <div class="col">
                  <label for="h_administrativas" class="form-label">Horas Utilizadas</label>
                  <input id="h_administrativas" name="h_administrativas" type="number" class="form-control" placeholder="Horas Utilizadas" aria-label="Last name" min="0" max="24" value="<?= $record['h_administrativas'] ?>">
                  <small id="h_administrativas_help" class="form-text text-danger" hidden>Campo requerido</small>
               </div>
            </div>
            <!-- ROW 3 -->
            <div class="row g-3 mb-4">
               <div class="col">
                  <label for="num_vacaciones" class="form-label">Vacaciones</label>
                  <input type="number" class="form-control" placeholder="Vacaciones" aria-label="Last name" id="num_vacaciones" name="num_vacaciones" value="<?= $record['num_vacaciones'] ?>">
               </div>
               <div class="col">
                  <label for="num_licencias" class="form-label">Licencias</label>
                  <input type="number" class="form-control" placeholder="Licencias" aria-label="Last name" id="num_licencias" name="num_licencias" value="<?= $record['num_licencias'] ?>">
               </div>
               <div class="col">
                  <label for="num_permiso" class="form-label">Permisos</label>
                  <input type="number" class="form-control" placeholder="Permisos" aria-label="Last name" id="num_permiso" name="num_permiso" value="<?= $record['num_permiso'] ?>">
               </div>
               <div class="col">
                  <label for="num_incapacidad" class="form-label">Incapacidades</label>
                  <input type="number" class="form-control" placeholder="Incapacidades" aria-label="Last name" id="num_incapacidad" name="num_incapacidad" value="<?= $record['num_incapacidad'] ?>">
               </div>
               <div class="col">
                  <label for="num_fortuitas" class="form-label">Fortuitos</label>
                  <input type="number" class="form-control" placeholder="Fortuitos" aria-label="Last name" id="num_fortuitas" name="num_fortuitas" value="<?= $record['num_fortuitas'] ?>">
               </div>
            </div>
            <!-- ROW 4 -->
            <div class="row g-3 mb-4">
               <div class="col">
                  <label for="carga_laboral" class="form-label">Carga Laboral</label>
                  <input type="number" class="form-control" placeholder="Carga Laboral" aria-label="Last name" id="carga_laboral" name="carga_laboral" value="<?= $record['carga_laboral'] ?>">
               </div>
               <div class="col">
                  <label for="cupo_utilizado" class="form-label">Cupos Utilizados</label>
                  <input type="number" class="form-control" placeholder="Cupos Utilizados" aria-label="Last name" id="cupo_utilizado" name="cupo_utilizado" value="<?= $record['cupo_utilizado'] ?>">
               </div>
               <div class="col">
                  <label for="cupo_disponible" class="form-label">Cuppos Disponibles</label>
                  <input type="number" class="form-control" placeholder="Cuppos Disponibles" aria-label="Last name" id="cupo_disponible" name="cupo_disponible" value="<?= $record['cupo_disponible'] ?>">
               </div>
               <div class="col">
                  <label for="cupo_ausente" class="form-label">Cupos No Acudi&oacute;</label>
                  <input type="number" class="form-control" placeholder="Cupos No Acudi&oacute;" aria-label="Last name" id="cupo_ausente" name="cupo_ausente" value="<?= $record['cupo_ausente'] ?>">
               </div>
               <div class="col">
                  <label fodescrupcionr="cupo_no_solicitado" class="form-label">Cupos No Solicitados</label>
                  <input type="number" class="form-control" placeholder="Cupos No Solicitados" aria-label="Last name" id="cupo_no_solicitado" name="cupo_no_solicitado" value="<?= $record['cupo_no_solicitado'] ?>">
               </div>
            </div>

            <div class="d-grid gap-2 col-3 mx-auto">
               <button id="btn-nueva-hoja" class="btn btn-alt-primary" type="button">MODIFICAR</button>
            </div>

         </form>
      </div>
   </div>
</div>
<script type="text/javascript" src="<?= APP_URI ?>public/pages/nueva_hoja.js"></script>