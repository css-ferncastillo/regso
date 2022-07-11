<?php $atencion = $data['atencion'][0] ?>
<div class="content">
   <div class="block block-rounded block-mode-loading-oneui h-100 mb-4">
      <div class="block-header block-header-default">
         <h3 class="block-title"><?= $title_page ?></h3>
      </div>
      <div class="block-content block-content-full">

         <div class="row mb-3">
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Hoja
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['id_hoja_especialista'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Sexo
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['id_sexo'] == 1 ? "Masculino" : "Femenino" ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  N&uacute;mero de C&eacute;dula
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['num_cedula'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Edad
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['edad'] ?>
                  </strong>
               </p>
            </div>
         </div>

         <div class="row mb-3">
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Nombre de Empresa
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['nombre_empresa'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  N&uacute;mero Patronal
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['num_patronal'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Tipo de Empresa
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['tipo_empresa'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Actividad Econ&oacute;mica
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['actividad_economica'] ?>
                  </strong>
               </p>
            </div>
         </div>

         <div class="row mb-3">
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Tama&ntilde;o de Empresa
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['tamano_empresa'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Tipo de Paciente
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['tipo_asegurado'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Tipo de Atenci&oacute;n
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['tipo_atencion'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Tipo de Consulta
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['tipo_consulta'] ?>
                  </strong>
               </p>
            </div>
         </div>

         <div class="row mb-3">
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Provincia
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['desc_prov'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Distrito
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['desc_dist'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Corregimiento
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['desc_correg'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Dias de Incapacidad
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['dias_incapacidad'] ?>
                  </strong>
               </p>
            </div>
         </div>

         <div class="row mb-3">
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Tipo de referencias
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['tipo_referencia'] ?>
                  </strong>
               </p>
            </div>
            <div class="col-md-3">
               <p class="pb-3 mb-0 small lh-sm">
                  Alta Laboral
                  <strong class="d-block text-gray-dark">
                     <?= $atencion['alta_laboral'] ?>
                  </strong>
               </p>
            </div>
         </div>
         <div class="row">
            <div class="col-md-6">
               <h3>Referencias</h3>
            </div>
            <div class="col-md-6">
               <h3>Diagnosticos</h3>
            </div>
         </div>

         <div class="row">
            <div class="col-md-6">
               <?php
               $json_ref = json_decode($atencion['json_referencias'], true);
               for ($jr = 0; $jr < count($json_ref); $jr++) {
                  //[{"especialidad":"Servicio 1","codigo":"SRV1"},{"especialidad":"Servicio 5","codigo":"SRV5"}]
                  ?>
                  <div class="row mb-3">
                     <div class="col-md-6">
                        <p class="pb-3 mb-0 small lh-sm">
                           Especialidad
                           <strong class="d-block text-gray-dark">
                              <?= $json_ref[$jr]['especialidad'] ?>
                           </strong>
                        </p>
                     </div>
                     <div class="col-md-6">
                        <p class="pb-3 mb-0 small lh-sm">
                           C&oacute;digo
                           <strong class="d-block text-gray-dark">
                              <?= $json_ref[$jr]['codigo'] ?>
                           </strong>
                        </p>
                     </div>
                  </div>
               <?php } ?>
            </div>
            <div class="col-md-6">
               <?php
               $json_dia = json_decode($atencion['json_diagnosticos'], true);
               for ($jd = 0; $jd < count($json_ref); $jd++) {
                  ?>
                  <div class="row mb-3">
                     <div class="col-md-3">
                        <p class="pb-3 mb-0 small lh-sm">
                           Especialidad
                           <strong class="d-block text-gray-dark">
                              <?= $json_dia[$jd]['diagnostico'] ?>
                           </strong>
                        </p>
                     </div>
                     <div class="col-md-3">
                        <p class="pb-3 mb-0 small lh-sm">
                           C&oacute;digo
                           <strong class="d-block text-gray-dark">
                              <?= $json_dia[$jd]['codigo'] ?>
                           </strong>
                        </p>
                     </div>
                  </div>
               <?php } ?>
            </div>
         </div>

      </div>
   </div>
</div>

</div>