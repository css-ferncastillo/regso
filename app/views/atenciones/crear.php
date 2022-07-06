<div class="content">
   <div class="block block-rounded block-mode-loading-oneui h-100">
      <div class="block-header block-header-default">
         <h3 class="block-title">Hoja de Trabajo N° <?= isset($data['hoja']) ? $data['hoja'] : 0 ?> <small><?= $_SESSION[APP_SESSION_NAME]['user_info']['nombre1'] ?> <?= $_SESSION[APP_SESSION_NAME]['user_info']['apellido1'] ?></small></h3>
      </div>
      <div class="block-content block-content-full">
         <form  id="form-atenciones">
            <input type="hidden" name="id_hoja_especialista" id="id_hoja_especialista" value="<?= $data['hoja'] ?>">
            <h2 class="content-heading border-bottom mb-4 pb-2 text-uppercase">Datos Generales</h2>
            <!-- ROW 1 -->
            <div class="row g-3 mb-4">
               <div class="col-md-3">
                  <label for="id_sexo" class="form-label">Sexo</label>
                  <select class="form-select" aria-label="Sexo" id="id_sexo" name="id_sexo">
                     <option value="0">Seleccione</option>
                     <option value="1">Masculino</option>
                     <option value="2">Femenino</option>
                  </select>
               </div>
               <div class="col-md-3">
                  <label for="num_cedula" class="form-label">Cedula</label>
                  <input type="text" class="form-control" placeholder="N&uacute;mero de C&eacute;dula" aria-label="Cedula" id="num_cedula" name="num_cedula">
               </div>
               <div class="col-md-3">
                  <label for="edad" class="form-label">Edad</label>
                  <input type="text" class="form-control" placeholder="Edad" aria-label="Edad del Paciente" id="edad" name="edad">
               </div>
               <div class="col-md-3">
                  <label for="nombre_empresa" class="form-label">Nombre de Empresa</label>
                  <input type="text" class="form-control" placeholder="Nombre de Empresa" aria-label="Nombre de Empresa" id="nombre_empresa" name="nombre_empresa">
               </div>
            </div>
            <!-- ROW 2 -->
            <div class="row g-3 mb-4">
               <div class="col-md-3">
                  <label for="num_patronal" class="form-label">N&uacute;mero Patronal</label>
                  <input type="text" class="form-control" placeholder="Numero Patronal" aria-label="Numero Patronal" id="num_patronal" name="num_patronal">
               </div>
               <div class="col-md-3">
                  <label for="id_tipo_empresa" class="form-label">Tipo de Empresa</label>
                  <select class="form-select" aria-label="Tipo empresa" name="id_tipo_empresa" id="id_tipo_empresa">
                     <option value="0">Seleccione</option>
                     <?php
                     $tipo_empresa = $data['tipo_empresa'];
                     for ($te = 0; $te < count($tipo_empresa); $te++) {
                        echo '<option value="' . $tipo_empresa[$te]['id'] . '">' . $tipo_empresa[$te]['tipo_empresa'] . '</option>';
                     }
                     ?>
                  </select>
               </div>
               <div class="col-md-3">
                  <label for="id_actividad_economica" class="form-label">Actividad Economica</label>
                  <select id="id_actividad_economica" name="id_actividad_economica" class="form-select" aria-label="Default select example">
                     <option value="0">Seleccione</option>
                     <?php
                     $act_economica = $data['actividad'];
                     for ($ae = 0; $ae < count($act_economica); $ae++) {
                        echo '<option value="' . $act_economica[$ae]['id'] . '">' . $act_economica[$ae]['actividad_economica'] . '</option>';
                     }
                     ?>
                  </select>
               </div>
               <div class="col-md-3">
                  <label for="id_tamano_empresa" class="form-label">Tama&ntilde;o Empresa</label>
                  <select class="form-select" aria-label="Tamaño de Empresa" id="id_tamano_empresa" name="id_tamano_empresa">
                     <option value="0">Seleccione</option>
                     <?php
                     $tamanio_empresa = $data['tamanio_empresa'];
                     for ($tae = 0; $tae < count($tamanio_empresa); $tae++) {
                        echo '<option value="' . $tamanio_empresa[$tae]['id'] . '">' . $tamanio_empresa[$tae]['tamano_empresa'] . '</option>';
                     }
                     ?>
                  </select>
               </div>
            </div>
            <!-- ROW 3 -->
            <div class="row g-3 mb-4">
               <div class="col-md-3">
                  <label for="id_tipo_asegurado" class="form-label">Tipo de Paciente</label>
                  <select class="form-select" aria-label="Tipo de Asegurado" id="id_tipo_asegurado" name="id_tipo_asegurado">
                     <option value="0">Seleccione</option>
                     <?php
                     $tipo_paciente = $data['tipo_paciente'];
                     for ($tae = 0; $tae < count($tipo_paciente); $tae++) {
                        echo '<option value="' . $tipo_paciente[$tae]['id'] . '">' . $tipo_paciente[$tae]['tipo_asegurado'] . '</option>';
                     }
                     ?>
                  </select>
               </div>
               <div class="col-md-3">
                  <label for="id_tipo_atencion" class="form-label">Tipo de Atenci&oacute;n</label>
                  <select class="form-select" aria-label="Tipo de Atencion" id="id_tipo_atencion" name="id_tipo_atencion">
                     <option value="0">Seleccione</option>
                     <?php
                     $tipo_atencion = $data['tipo_atencion'];
                     for ($tat = 0; $tat < count($tipo_atencion); $tat++) {
                        echo '<option value="' . $tipo_atencion[$tat]['id'] . '">' . $tipo_atencion[$tat]['tipo_atencion'] . '</option>';
                     }
                     ?>
                  </select>
               </div>
               <div class="col-md-3">
                  <label for="id_tipo_consulta" class="form-label">Tipo Consulta</label>
                  <select class="form-select" aria-label="Tipo de Consulta" id="id_tipo_consulta" name="id_tipo_consulta">
                     <option value="0">Seleccione</option>
                     <?php
                     $tipo_consulta = $data['tipo_consulta'];
                     for ($tc = 0; $tc < count($tipo_consulta); $tc++) {
                        echo '<option value="' . $tipo_consulta[$tc]['id'] . '">' . $tipo_consulta[$tc]['tipo_consulta'] . '</option>';
                     }
                     ?>
                  </select>
               </div>
               <div class="col-md-3">
                  <label for="id_provincia" class="form-label">Provincia</label>
                  <select class="form-select" aria-label="Ubicacion Provincia" id="id_provincia" name="id_provincia">
                     <option value="0">Seleccione</option>
                     <?php
                     $provincia = $data['provincia'];
                     for ($p = 0; $p < count($provincia); $p++) {
                        echo '<option value="' . $provincia[$p]['id'] . '">' . $provincia[$p]['desc_prov'] . '</option>';
                     }
                     ?>
                  </select>
               </div>
            </div>
            <!-- ROW 4 -->
            <div class="row g-3 mb-4">
               <div class="col-md-3">
                  <label for="id_distrito" class="form-label">Distrito</label>
                  <select class="form-select" aria-label="Ubicacion Distrito" id="id_distrito" name="id_distrito">
                     <option value="0">Seleccione Dsitrito</option>
                  </select>
               </div>
               <div class="col-md-3">
                  <label for="id_corregimiento" class="form-label">Corregimiento</label>
                  <select class="form-select" aria-label="Ubicacion Corregimiento" id="id_corregimiento" name="id_corregimiento">
                     <option value="0">Seleccione Corregimiento</option>
                  </select>
               </div>
            </div>
            <h2 class="content-heading border-bottom mb-4 pb-2 text-uppercase">DIAGNÓSTICO SEGÚN LA CLASIFICACIÓN ESTADÍSTICA INTERNACIONAL DE ENFERMEDADESDATOS GENERALES</h2>
            <!-- ROW 5 -->
            <div class="row g-3 mb-4">
               <div class="col-md-3">
                  <label for="cod_diagnostico" class="form-label">C&oacute;digo de Diagnostico</label>
                  <input type="text" class="form-control cod_diagnostico" placeholder="C&oacute;digo de Diagnostico" aria-label="Codigo de Diagnostico" id="cod_diagnostico" name="cod_diagnostico">
               </div>
               <div class="col-md-3">
                  <label for="desc_diagnostico" class="form-label">Descripci&oacute;n de Diagnostico</label>
                  <input type="text" class="form-control desc_diagnostico" placeholder="Descripci&oacute;n de Diagnostico" aria-label="descripcion de Diagnostico" id="desc_diagnostico" name="desc_diagnostico">
               </div>
            </div>
            <div id="new_row_diagnostico"></div>
            <div class="row">
               <div class="col-md-4">
                  <button type="button" class="btn btn-alt-success" id="add_row_diagnostico"><i class="si si-plus"></i> Agregar Diagn&oacute;stico</button>
               </div>
            </div>
            <h2 class="content-heading border-bottom mb-4 pb-2 text-uppercase">REFERENCIA / CONTRAREFERENCIA</h2>
            <!-- ROW 7 -->
            <div class="row g-3 mb-4">
               <div class="col-md-6">
                  <label for="id_referencia" class="form-label">Referencia / Contrareferencia</label>
                  <select class="form-select" aria-label="Referencia / Contrareferencia" id="id_referencia" name="id_referencia">
                     <option value="0">Seleccione</option>
                     <?php
                     $referencia = $data['referencia'];
                     for ($r = 0; $r < count($referencia); $r++) {
                        echo '<option value="' . $referencia[$r]['id'] . '">' . $referencia[$r]['tipo_referencia'] . '</option>';
                     }
                     ?>
                  </select>
               </div>

            </div>

            <!-- ROW 8 -->
            <div class="row g-3 mb-4">
               <div class="col-md-3">
                  <label for="especialidad" class="form-label">Especialidad o Servicio</label>
                  <input type="text" class="form-control especialidad" placeholder="Especialidades / Servicios" aria-label="Especialidades / Servicios" id="especialidad" name="especialidad">
               </div>
               <div class="col-md-3">
                  <label for="cod_especialidad" class="form-label">C&oacute;digo Especialidad o Servicio </label>
                  <input type="text" class="form-control cod_especialidad" placeholder="Codigo Especialidad" aria-label="Codigo Especialidad" id="cod_especialidad" name="cod_especialidad">
               </div>
            </div>
            <div id="new_row_referencia"></div>
            <div class="row mb-4">
               <div class="col-md-4">
                  <button type="button" class="btn btn-alt-success" id="add_row_referencia"><i class="si si-plus"></i> Agregar Referencia</button>
               </div>
            </div>
            <!-- ROW 9 -->
            <div class="row g-3 mb-4">
               <div class="col-md-3">
                  <label for="id_alta_laboral" class="form-label">Alta Laboral</label>
                  <select class="form-select" aria-label="Alta Laboral" id="id_alta_laboral" name="id_alta_laboral">
                     <option value="0">Seleccione</option>
                     <?php
                     $alta_laboral = $data['alta_laboral'];
                     for ($al = 0; $al < count($alta_laboral); $al++) {
                        echo '<option value="' . $alta_laboral[$al]['id'] . '">' . $alta_laboral[$al]['alta_laboral'] . '</option>';
                     }
                     ?>
                  </select>
               </div>
               <div class="col-md-3 align-self-center">
                  <input class="form-check-input" type="checkbox" value="" id="incapacidad">
                  <label class="form-check-label" for="incapacidad">
                     Recibi&oacute; incapacidad?
                  </label>
               </div>
               <div class="col-md-3">
                  <label for="dias_incapacidad" class="form-label">Dias de Incapacidad</label>
                  <input type="number" class="form-control" placeholder="Last name" aria-label="Dias de Incapacidad" id="dias_incapacidad" name="dias_incapacidad">
               </div>
            </div>
            <div class="row">
               <div class="d-grid gap-2 col-3 mx-auto">
                  <button class="btn btn-alt-primary" id="submit" type="button"> <i class="si si-disc"></i> REGISTRAR</button>
               </div>
               <div class="d-grid col-3 mx-auto">
                  <button class="btn btn-alt-info" type="button"> <i class="si si-action-undo"></i> VOLVER</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<script type="text/javascript" src="<?= APP_URI ?>public/pages/nueva_atencion.js"></script>