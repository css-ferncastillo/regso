<div class="content">

   <div class="block block-rounded block-mode-loading-oneui h-100 mb-0">
      <div class="block-header block-header-default">
         <h3 class="block-title"><?= $title_page ?></h3>
      </div>
      <div class="block-content block-content-full">

         <form id="crear-actividad" method="post" action="<?= APP_URI ?>actividades/procesar_crear">
            <div class="row mb-2">
               <div class="col-md-3">
                  <label for="id_unidad" class="form-label">Unidad Ejecutora</label>
                  <select id="id_unidad" name="id_unidad" class="form-control">
                     <option selected value="0">Selecciona una Unidad</option>
                     <?php
                     $unidad = $data['unidad'];
                     for ($u = 0; $u < count($unidad); $u++) {
                        echo '<option value="' . $unidad[$u]['id'] . '">' . $unidad[$u]['desc_prov'] . ' - ' . $unidad[$u]['desc_unidad'] . '</option>';
                     }
                     ?>
                  </select>
               </div>
               <div class="col-md-3">
                  <label for="id_servicio">Servicios</label>
                  <select id="id_servicio" name="id_servicio" class="form-control">
                     <option selected value="0">Selecciona una Servicio</option>
                     <?php
                     $servicio = $data['servicio'];
                     for ($s = 0; $s < count($servicio); $s++) {
                        echo "<option value='{$servicio[$s]['id']}'>{$servicio[$s]['desctipcion']}</option>";
                     }
                     ?>
                  </select>
               </div>
               <div class="col-md-3">
                  <!-- inertar plugin datetime -->
                  <label for="dt_visita">Fecha de visita</label>
                  <input id="dt_visita" name="dt_visita" class="form-control">
               </div>
               <div class="col-md-3">
                  <label for="htrabajadas">Horas Trabajadas</label>
                  <input type="number" id="htrabajadas" name="htrabajadas" class="form-control">
               </div>
            </div>

            <div class="row mb-2">
               <div class="col-md-3">
                  <label for="nombre_profecional">Nombre Profesional</label>
                  <input type="text" id="nombre_profecional" name="nombre_profecional" class="form-control">
               </div>
               <div class="col-md-3">
                  <label for="nombre_empresa">Nombre empresa</label>
                  <input type="text" id="nombre_empresa" name="nombre_empresa" class="form-control">
               </div>
               <div class="col-md-3">
                  <label for="num_patronal">N&uacute;mero Patronal</label>
                  <input type="text" id="num_patronal" name="num_patronal" class="form-control">
               </div>
               <div class="col-md-3">
                  <label for="id_actividad_economica">Actividad Economica</label>
                  <select id="id_actividad_economica" name="id_actividad_economica" class="form-control">
                     <option value="0">Seleccione una opcion</option>
                     <?php
                     $actividad = $data['actividad'];
                     for ($a = 0; $a < count($actividad); $a++) {
                        echo "<option value='{$actividad[$a]['id']}'>{$actividad[$a]['actividad_economica']}</option>";
                     }
                     ?>
                  </select>
               </div>
            </div>

            <div class="row mb-2">
               <div class="col-md-3">
                  <label for="id_referencia">Referencia de Empresa</label>
                  <select id="id_referencia" name="id_referencia" class="form-control">
                     <option value="0">Seleccione una opcion</option>
                     <?php
                     $referencia = $data['referencia'];
                     for ($r = 0; $r < count($referencia); $r++) {
                        echo "<option value='{$referencia[$r]['id']}'>{$referencia[$r]['ref_empresa']}</option>";
                     }
                     ?>
                  </select>
               </div>
               <div class="col-md-3">
                  <label for="num_empleados">Numero de Empleados</label>
                  <input type="number" id="num_empleados" name="num_empleados" class="form-control">
               </div>
               <div class="col-md-3">
                  <label for="num_hombres">N&uacute;mero de Hombres</label>
                  <input type="number" id="num_hombres" name="num_hombres" class="form-control">
               </div>
               <div class="col-md-3">
                  <label for="num_mujeres">N&uacute;mero de Mujeres</label>
                  <input type="number" id="num_mujeres" name="num_mujeres" class="form-control">
               </div>
            </div>

            <div class="row mb-2">
               <div class="col-md-3">
                  <label for="num_beneficiados">Trabajadores Beneficiados</label>
                  <input type="number" id="num_beneficiados" name="num_beneficiados" class="form-control">
               </div>
               <div class="col-md-3">
                  <label for="id_provincia">Provincia</label>
                  <select class="form-select" id="id_provincia" name="id_provincia">
                     <option value="0">Seleccione</option>
                     <?php
                     $provincia = $data['provincia'];
                     for ($p = 0; $p < count($provincia); $p++) {
                        echo '<option value="' . $provincia[$p]['id'] . '">' . $provincia[$p]['desc_prov'] . '</option>';
                     }
                     ?>
                  </select>
               </div>
               <div class="col-md-3">
                  <label for="id_distrito">Distrito</label>
                  <select id="id_distrito" name="id_distrito" class="form-control"></select>
               </div>
               <div class="col-md-3">
                  <label for="id_corregimiento">Corregimiento</label>
                  <select id="id_corregimiento" name="id_corregimiento" class="form-control"></select>
               </div>
            </div>

            <div class="row mb-2 mt-4">
               <?php
               $tipo_actividad = $data['tipo_actividad'];
               $desc_actividades = $data['desc_actividades'];
               for ($ac = 0; $ac < count($tipo_actividad); $ac++) {
               ?>
                  <div class="col-md-6">
                     <div class="block block-rounded block-themed">
                        <div class="block-header bg-flat-dark">
                           <h3 class="block-title"><?= $tipo_actividad[$ac]['tipo_actividad'] ?></h3>
                           <div class="block-options">
                           </div>
                        </div>
                        <div class="block-content">
                           <?php
                           for ($da = 0; $da < count($desc_actividades); $da++) {
                              echo "<div class='space-y-2'>";
                              if ($desc_actividades[$da]['tipo_actividad'] == $tipo_actividad[$ac]['id']) {
                           ?>
                                 <div class="form-check">
                                    <input class="form-check-input check-actividad" type="checkbox" value="<?= $desc_actividades[$da]['id'] ?>" id="json_acrividades" name="json_acrividades">
                                    <label class="form-check-label"><?= $desc_actividades[$da]['descripcion'] ?>.</label>
                                 </div>
                           <?php
                              }
                              echo '</div>';
                           }
                           ?>
                        </div>
                     </div>
                  </div>
               <?php
               }
               ?>
            </div>
            <div class="row mt-2 mb-2">
               <div class="col-md-3"></div>
               <div class="col-md-3">
                  <button id="submit-actividad" type="button" class="btn btn-lg btn-block btn-alt-primary">Registrar Actividad</button>
               </div>
               <div class="col-md-3">
               <a href="javascript:history.back()" class="btn btn-alt-info" type="button"> <i class="si si-action-undo"></i> VOLVER</a>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>

<script type="text/javascript">
   $(document).ready(function() {
      $("#dt_visita").datepicker({
         todayHighlight: true,
         format: "yyyy-mm-dd"
      });
   })
</script>
<script src="<?= APP_URI ?>public/pages/actividades.js"></script>