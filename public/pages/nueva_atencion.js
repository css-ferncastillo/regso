$(document).ready(function() {
   // Agregar fila de diagnostico
   $("#add_row_diagnostico").on('click', add_row_diagnostico);
   $(document).on('click', "#remove_row_diagnostico", remove_row_diagnostico);
   // Agregar fila de referencia
   $("#add_row_referencia").on('click', add_row_referencia);
   $(document).on('click', "#remove_row_referencia", remove_row_referencia);
   // Filtrar Distritos
   $("#id_provincia").on('change', getDistritos);
   $("#id_distrito").on('change', getCorregimientos);
   $("#submit").on('click', submitForm);
   
})

function add_row_diagnostico() {
   var html = "";
   html += ` <div class="row g-3 mb-4" id="diagnostico_row">`;
   html += ` <div class="col-md-3">`;
   html += ` <label for="cod_diagnostico" class="form-label">C&oacute;digo de Diagnostico</label>`;
   html += ` <input type="text" class="form-control cod_diagnostico" placeholder="C&oacute;digo de Diagnostico" aria-label="C&oacute;digo de Diagnostico" id="cod_diagnostico" name="cod_diagnostico">`;
   html += ` </div>`;
   html += ` <div class="col-md-3">`;
   html += ` <label for="desc_diagnostico" class="form-label">Descripcion de Diagnostico </label>`;
   html += ` <input type="text" class="form-control desc_diagnostico" placeholder="Descripci&oacute;n de Diagnostico" aria-label="Descripci&oacute;n de Diagnostico" id="desc_diagnostico" name="desc_diagnostico">`;
   html += ` </div>`;
   html += ` <div class="col-md-3">`;
   html += `<button type="button" class="btn btn-danger mt-4" id="remove_row_diagnostico"><i class="si si-trash"></i> Eliminar</button>`;
   html += `</div>`;
   html += ` </div>`;
   $("#new_row_diagnostico").append(html);
   let input_numer = $("#cod_diagnostico").length;
   console.log(input_numer);
}

function remove_row_diagnostico() {
   $(this).closest('#diagnostico_row').remove();
}

function add_row_referencia() {
   var html = "";
   html += ` <div class="row g-3 mb-4" id="referencia_row">`;
   html += ` <div class="col-md-3">`;
   html += ` <label for="especialidad" class="form-label">Especialidad o Servicio</label>`;
   html += ` <input type="text" class="form-control especialidad" placeholder="Especialidades / Servicios" aria-label="Especialidades / Servicios" id="especialidad" name="especialidad">`;
   html += ` </div>`;
   html += ` <div class="col-md-3">`;
   html += ` <label for="cod_especialidad" class="form-label">C&oacute;digo Especialidad o Servicio </label>`;
   html += ` <input type="text" class="form-control cod_especialidad" placeholder="Codigo Especialidad" aria-label="Codigo Especialidad" id="cod_especialidad" name="cod_especialidad">`;
   html += ` </div>`;
   html += ` <div class="col-md-3">`;
   html += `<button type="button" class="btn btn-danger mt-4" id="remove_row_referencia"><i class="si si-trash"></i> Eliminar</button>`;
   html += `</div>`;
   html += ` </div>`;
   $("#new_row_referencia").append(html);
}

function remove_row_referencia() {
   $(this).closest('#referencia_row').remove();
}

function getDistritos() {
   let id_provincia = $("#id_provincia").val();
   $.ajax({
      url: url + 'distrito/filtrar/' + id_provincia,
      type: 'GET',
      dataType: 'json',
      success: function(data) {
         $("#id_distrito").empty();
         $("#id_corregimiento").empty();
         
         $("#id_distrito").append('<option value="">Seleccione Distrito</option>');
         $("#id_corregimiento").append('<option value="">Seleccione Corregimiento</option>');
         $.each(data['data'], function(index, value) {
            $("#id_distrito").append('<option value="' + value.id + '">' + value.desc_dist + '</option>');
         });
      },
      error: function(data) {
         console.log(data);
      }
   });
}

function getCorregimientos(){
   let id_distrito = $("#id_distrito").val();
   $.ajax({
      url: url + 'corregimiento/filtrar/' + id_distrito,
      type: 'GET',
      dataType: 'json',
      success: function(data) {
         $("#id_corregimiento").empty();
         $("#id_corregimiento").append('<option value="">Seleccione Corregimiento</option>');
         $.each(data['data'], function(index, value) {
            $("#id_corregimiento").append('<option value="' + value.id + '">' + value.desc_correg + '</option>');
         });
      },
      error: function(data) {
         console.log(data);
      }
   });
}



function submitForm(){
   let data = [];

   let cod_diagnostico = [];
   let desc_diagnostico = [];
   let especialidad = [];
   let cod_especialidad = [];

   // TODO: agregar tipos a un solo array

   for (let i = 0; i < $(".cod_diagnostico").length; i++) {
      cod_diagnostico.push($(".cod_diagnostico").eq(i).val());
   }

   for (let i = 0; i < $(".desc_diagnostico").length; i++) {
      desc_diagnostico.push($(".desc_diagnostico").eq(i).val());
   }

   for (let i = 0; i < $(".especialidad").length; i++) {
      especialidad.push($(".especialidad").eq(i).val());
   }

   for (let i = 0; i < $(".cod_especialidad").length; i++) {
      cod_especialidad.push($(".cod_especialidad").eq(i).val());
   }

   var t = [
      "id", "id_hoja_especialista", "id_sexo", "num_cedula", "edad", "nombre_empresa", "num_patronal", "id_tipo_empresa", "id_actividad_economica","id_tamano_empresa", "id_tipo_asegurado", "id_tipo_atencion", "id_tipo_consulta", "id_corregimiento", "incapacidad", "dias_incapacidad", "id_referencia", "diagnosticos", "referencias", "id_alta_laboral", "dt_registro", "id_usuario", "estado"
   ];

   //TODO: validar campos no coincidentes

   data['id_hoja_especialista'] = $("#id_hoja_especialista").val();
   data['id_sexo'] = $("#id_sexo").val();
   data['num_cedula'] = $("#num_cedula").val();
   data['edad'] = $("#edad").val();
   data['nombre_empresa'] = $("#nombre_empresa").val();
   data['num_patronal'] = $("#num_patronal").val();
   data['id_tipo_empresa'] = $("#id_tipo_empresa").val();
   data['id_tamano_empresa'] = $("#id_tamano_empresa").val();
   data['id_actividad_economica'] = $("#id_actividad_economica").val();
   data['id_tipo_asegurado'] = $("#id_tipo_asegurado").val();
   data['id_tipo_atencion'] = $("#id_tipo_atencion").val();
   data['id_tipo_consulta'] = $("#id_tipo_consulta").val();
   data['id_corregimiento'] = $("#id_corregimiento").val();
   data['cod_diagnostico'] = cod_diagnostico;
   data['desc_diagnostico'] = desc_diagnostico;
   data['id_referencia'] = $("#id_referencia").val();
   data['especialidad'] = especialidad;
   data['cod_especialidad'] = cod_especialidad;
   data['id_alta_laboral'] = $("#id_alta_laboral").val();
   data['incapacidad'] = $("#incapacidad").val();
   data['dias_incapacidad'] = $("#dias_incapacidad").val();

   console.log(data);
   $.ajax({
      url: url + 'atenciones/guardar_atencion',
      type: 'POST',
      dataType: 'json',
      data: data,
      success: function(res) {
         console.log(res);
      },
      error: function(err) {
         console.log(err);
      }
   });
}