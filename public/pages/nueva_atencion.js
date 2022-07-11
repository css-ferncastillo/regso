$(document).ready(function () {
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
   $("#update").on('click', submitUpdateForm);
   $("#incapacidad").on('click', dias_incapacidad);
   $("#tbl-atenciones").on("click", ".btn-eliminar", eliminar_atencion);
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

function dias_incapacidad() {
   if ($("#incapacidad").is(':checked')) {
      $("#dias_incapacidad").prop('disabled', false);
      ;
   } else {
      $("#dias_incapacidad").prop('disabled', true);
      ;
   }
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
      url: url + 'listfilters/filter_distrito/' + id_provincia,
      type: 'GET',
      dataType: 'json',
      success: function (data) {
         $("#id_distrito").empty();
         $("#id_corregimiento").empty();

         $("#id_distrito").append('<option value="">Seleccione Distrito</option>');
         $("#id_corregimiento").append('<option value="">Seleccione Corregimiento</option>');
         $.each(data['data'], function (index, value) {
            $("#id_distrito").append('<option value="' + value.id + '">' + value.desc_dist + '</option>');
         });
      },
      error: function (data) {
         console.log(data);
      }
   });
}

function getCorregimientos() {
   let id_distrito = $("#id_distrito").val();
   $.ajax({
      url: url + 'listfilters/filter_corregimiento/' + id_distrito,
      type: 'GET',
      dataType: 'json',
      success: function (data) {
         $("#id_corregimiento").empty();
         $("#id_corregimiento").append('<option value="">Seleccione Corregimiento</option>');
         $.each(data['data'], function (index, value) {
            $("#id_corregimiento").append('<option value="' + value.id + '">' + value.desc_correg + '</option>');
         });
      },
      error: function (data) {
         console.log(data);
      }
   });
}



function submitForm() {
   let data = {};

   let diagnostico = [];
   let referencia = [];


   // TODO: agregar tipos a un solo array

   for (let i = 0; i < $(".cod_diagnostico").length; i++) {
      var dia = {};
      dia.diagnostico = $(".desc_diagnostico").eq(i).val();
      dia.codigo = $(".cod_diagnostico").eq(i).val();
      diagnostico.push(dia);
   }


   for (let i = 0; i < $(".especialidad").length; i++) {
      var esp = {}
      esp.especialidad = $(".especialidad").eq(i).val();
      esp.codigo = $(".cod_especialidad").eq(i).val();
      referencia.push(esp);
   }

   //TODO: validar campos no coincidentes
   //dt_registro, id_usuario, estado
   data['id_hoja_especialista'] = $("#id_hoja_especialista").val(); //id_hoja_especialista
   data['id_sexo'] = $("#id_sexo").val(); // id_sexo
   data['num_cedula'] = $("#num_cedula").val(); // num_cedula
   data['edad'] = $("#edad").val(); //edad
   data['nombre_empresa'] = $("#nombre_empresa").val(); // nombre_empresa
   data['num_patronal'] = $("#num_patronal").val(); // num_patronal
   data['id_tipo_empresa'] = $("#id_tipo_empresa").val(); // id_tipo_empresa
   data['id_tamano_empresa'] = $("#id_tamano_empresa").val(); // id_tamano_empresa
   data['id_actividad_economica'] = $("#id_actividad_economica").val(); // id_actividad_economica
   data['id_tipo_asegurado'] = $("#id_tipo_asegurado").val(); // id_tipo_asegurado
   data['id_tipo_atencion'] = $("#id_tipo_atencion").val(); // id_tipo_atencion
   data['id_tipo_consulta'] = $("#id_tipo_consulta").val(); // id_tipo_consulta
   data['id_corregimiento'] = $("#id_corregimiento").val(); // id_corregimiento
   data['incapacidad'] = $("#incapacidad").is(':checked') ? 1 : 0; // incapacidad
   data['dias_incapacidad'] = $("#dias_incapacidad").val() // dias_incapacidad
   data['json_diagnosticos'] = diagnostico; // json_diagnosticos
   data['id_referencia'] = $("#id_referencia").val(); // id_referencia
   data['json_referencias'] = referencia; // json_referencias
   data['id_alta_laboral'] = $("#id_alta_laboral").val(); // id_alta_laboral
   data['estado'] = 1; // estado



   $.post(url + 'atenciones/proceso_crear', data)
           .done((res) => {
              location.reload();
              console.log(res);
           })
           .fail((err) => {
              $.notify("Se ha generado un error", {
                 type: 'warning',
                 allow_dismiss: true,
                 placement: {
                    from: "bottom",
                    align: "right"
                 }
              });
           })
}

function submitUpdateForm() {
   let data = {};

   let diagnostico = [];
   let referencia = [];


   // TODO: agregar tipos a un solo array

   for (let i = 0; i < $(".cod_diagnostico").length; i++) {
      var dia = {};
      dia.diagnostico = $(".desc_diagnostico").eq(i).val();
      dia.codigo = $(".cod_diagnostico").eq(i).val();
      diagnostico.push(dia);
   }


   for (let i = 0; i < $(".especialidad").length; i++) {
      var esp = {}
      esp.especialidad = $(".especialidad").eq(i).val();
      esp.codigo = $(".cod_especialidad").eq(i).val();
      referencia.push(esp);
   }

   //TODO: validar campos no coincidentes

   data['id'] = $("#id").val(); //id_hoja_especialista
   //id_sexo = :id_sexo,
   data['id_sexo'] = $("#id_sexo").val(); // id_sexo
   //num_cedula = :num_cedula,
   data['num_cedula'] = $("#num_cedula").val(); // num_cedula
   //edad = :edad,
   data['edad'] = $("#edad").val(); //edad
   //nombre_empresa = :nombre_empresa,
   data['nombre_empresa'] = $("#nombre_empresa").val(); // nombre_empresa
   //num_patronal = :num_patronal,
   data['num_patronal'] = $("#num_patronal").val(); // num_patronal
   //id_tipo_empresa = :id_tipo_empresa,
   data['id_tipo_empresa'] = $("#id_tipo_empresa").val(); // id_tipo_empresa
   //id_tamano_empresa = :id_tamano_empresa,
   data['id_tamano_empresa'] = $("#id_tamano_empresa").val(); // id_tamano_empresa
   //id_actividad_economica = :id_actividad_economica,
   data['id_actividad_economica'] = $("#id_actividad_economica").val(); // id_actividad_economica
   //id_tipo_asegurado = :id_tipo_asegurado,
   data['id_tipo_asegurado'] = $("#id_tipo_asegurado").val(); // id_tipo_asegurado
   //id_tipo_atencion = :id_tipo_atencion,
   data['id_tipo_atencion'] = $("#id_tipo_atencion").val(); // id_tipo_atencion
   //id_tipo_consulta = :id_tipo_consulta,
   data['id_tipo_consulta'] = $("#id_tipo_consulta").val(); // id_tipo_consulta
   //id_corregimiento = :id_corregimiento,
   data['id_corregimiento'] = $("#id_corregimiento").val(); // id_corregimiento
   //incapacidad = :incapacidad,
   data['incapacidad'] = $("#incapacidad").is(':checked') ? 1 : 0; // incapacidad
   //dias_incapacidad = :dias_incapacidad,
   data['dias_incapacidad'] = $("#dias_incapacidad").val() // dias_incapacidad
   //json_diagnosticos = :json_diagnosticos,
   data['json_diagnosticos'] = diagnostico; // json_diagnosticos
   //id_referencia = :id_referencia,
   data['id_referencia'] = $("#id_referencia").val(); // id_referencia
   //json_referencias = :json_referencias,
   data['json_referencias'] = referencia; // json_referencias
   //id_alta_laboral = :id_alta_laboral
   data['id_alta_laboral'] = $("#id_alta_laboral").val(); // id_alta_laboral
   $.post(url + 'atenciones/procesar_editar/' + data['id'], data)
           .done((res) => {
              location.reload();
              console.log(res);
           })
           .fail((err) => {
              $.notify("Se ha generado un error", {
                 type: 'warning',
                 allow_dismiss: true,
                 placement: {
                    from: "bottom",
                    align: "right"
                 }
              });
           })
}

function eliminar_atencion() {
   var currentRow = $(this).closest("tr");
   var id = currentRow.find("button.btn-eliminar").val();
   const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
         confirmButton: 'btn btn-alt-success',
         cancelButton: 'btn btn-alt-danger'
      },
      buttonsStyling: false
   })

   swalWithBootstrapButtons.fire({
      title: 'Desea eliminar este registro?',
      text: "Al ser eliminado no podrá recuperarlo!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, eliminar!',
      cancelButtonText: 'No, cancelar!',
      reverseButtons: true
   }).then((result) => {
      if (result.isConfirmed) {

         $.ajax({
            url: url + 'atenciones/eliminar/' + id,
            type: 'POST',
            dataType: 'json',
            success: function (data) {
               swalWithBootstrapButtons.fire({
                  title: `${data['title']}!`,
                  text: `${data['message']}`,
                  showCancelButton: false,
                  confirmButtonText: 'Aceptar!',
               }).then(rst => {
                  location.reload();
               })
            },
            error: function (data) {
               swalWithBootstrapButtons.fire(
                       `${data['title']}!`,
                       `${data['message']}`,
                       `${data['type']}`
                       )
            },
         })


      } else if (
              /* Read more about handling dismissals below */
              result.dismiss === Swal.DismissReason.cancel
              ) {
         swalWithBootstrapButtons.fire(
                 'Cancelado',
                 'La acción no ha sido procesada :)',
                 'info'
                 )
      }
   })
}
