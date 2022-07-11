$(document).ready(function () {
   $("#id_provincia").on('change', filter_distrito);
   $("#id_distrito").on('change', filter_corregimiento);
   $("#submit-actividad").on('click', validateForm);
   $("#update_actividad").on('click', updateData);
   $("#tbl-actividades").on("click", ".btn-eliminar", eliminar_actividad);
});

function filter_distrito() {
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
function filter_corregimiento() {
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

function validateForm() {
   let errors = 0;
   //
   id_unidad = $("#id_unidad");
   id_servicio = $("#id_servicio");
   dt_visita = $("#dt_visita");
   htrabajadas = $("#htrabajadas")
   nombre_profecional = $("#nombre_profecional");
   nombre_empresa = $("#nombre_empresa")
   num_patronal = $("#num_patronal")
   id_actividad_economica = $("#id_actividad_economica")
   id_referencia = $("#id_referencia")
   num_empleados = $("#num_empleados")
   num_hombres = $("#num_hombres")
   num_mujeres = $("#num_mujeres")
   num_beneficiados = $("#num_beneficiados");
   id_corregimiento = $("#id_corregimiento");
   json_actividades = $("#json_actividades");
   id_usuario = $("#id_usuario");
   dt_creacion = $("#dt_creacion");



   if (id_unidad.val() == '' || id_unidad.val() == null || id_unidad.val() == 0 || id_unidad.val() == undefined) {
      id_unidad.addClass('is-invalid');
      id_unidad.focus();
      errors += 1;
   }

   if (id_servicio.val() == '' || id_servicio.val() == null || id_servicio.val() == 0 || id_servicio.val() == undefined) {
      id_servicio.addClass('is-invalid');
      id_servicio.focus();
      errors += 1;
   }

   if (dt_visita.val() == '' || dt_visita.val() == null || dt_visita.val() == 0 || dt_visita.val() == undefined) {
      dt_visita.addClass('is-invalid');
      dt_visita.focus();
      errors += 1;
   }

   if (htrabajadas.val() == '' || htrabajadas.val() == null || htrabajadas.val() == 0 || htrabajadas.val() == undefined) {
      htrabajadas.addClass('is-invalid');
      htrabajadas.focus();
      errors += 1;
   }

   if (nombre_profecional.val() == '' || nombre_profecional.val() == null || nombre_profecional.val() == 0 || nombre_profecional.val() == undefined) {
      nombre_profecional.addClass('is-invalid');
      nombre_profecional.focus();
      errors += 1;
   }

   if (nombre_empresa.val() == '' || nombre_empresa.val() == null || nombre_empresa.val() == 0 || nombre_empresa.val() == undefined) {
      nombre_empresa.addClass('is-invalid');
      nombre_empresa.focus();
      errors += 1;
   }

   if (num_patronal.val() == '' || num_patronal.val() == null || num_patronal.val() == 0 || num_patronal.val() == undefined) {
      num_patronal.addClass('is-invalid');
      num_patronal.focus();
      errors += 1;
   }

   if (id_actividad_economica.val() == '' || id_actividad_economica.val() == null || id_actividad_economica.val() == 0 || id_actividad_economica.val() == undefined) {
      id_actividad_economica.addClass('is-invalid');
      id_actividad_economica.focus();
      errors += 1;
   }

   if (id_referencia.val() == '' || id_referencia.val() == null || id_referencia.val() == 0 || id_referencia.val() == undefined) {
      id_referencia.addClass('is-invalid');
      id_referencia.focus();
      errors += 1;
   }

   if (num_empleados.val() == '' || num_empleados.val() == null || num_empleados.val() == 0 || num_empleados.val() == undefined) {
      num_empleados.addClass('is-invalid');
      num_empleados.focus();
      errors += 1;
   }

   if (num_hombres.val() == '' || num_hombres.val() == null || num_hombres.val() == 0 || num_hombres.val() == undefined) {
      num_hombres.addClass('is-invalid');
      num_hombres.focus();
      errors += 1;
   }

   if (num_mujeres.val() == '' || num_mujeres.val() == null || num_mujeres.val() == 0 || num_mujeres.val() == undefined) {
      num_mujeres.addClass('is-invalid');
      num_mujeres.focus();
      errors += 1;
   }

   if (num_beneficiados.val() == '' || num_beneficiados.val() == null || num_beneficiados.val() == 0 || num_beneficiados.val() == undefined) {
      num_beneficiados.addClass('is-invalid');
      num_beneficiados.focus();
      errors += 1;
   }

   if (id_corregimiento.val() == '' || id_corregimiento.val() == null || id_corregimiento.val() == 0 || id_corregimiento.val() == undefined) {
      id_corregimiento.addClass('is-invalid');
      id_corregimiento.focus();
      errors += 1;
   }



   if (errors > 0) {
      return false;
   }
   let json_actividad = [];

   for (let i = 0; i < $(".check-actividad").length; i++) {
      if ($(".check-actividad").eq(i).is(':checked')) {
         json_actividad.push($(".check-actividad").eq(i).val());
      }
   }

   let data = {
      id_unidad: $("#id_unidad").val(),
      id_servicio: $("#id_servicio").val(),
      dt_visita: $("#dt_visita").val(),
      htrabajadas: $("#htrabajadas").val(),
      nombre_profecional: $("#nombre_profecional").val(),
      nombre_empresa: $("#nombre_empresa").val(),
      num_patronal: $("#num_patronal").val(),
      id_actividad_economica: $("#id_actividad_economica").val(),
      id_referencia: $("#id_referencia").val(),
      num_empleados: $("#num_empleados").val(),
      num_hombres: $("#num_hombres").val(),
      num_mujeres: $("#num_mujeres").val(),
      num_beneficiados: $("#num_beneficiados").val(),
      id_corregimiento: $("#id_corregimiento").val(),
      json_actividades: json_actividad,
      id_usuario: $("#id_usuario").val(),
      dt_creacion: $("#dt_creacion").val()
   }

   $.post(url + 'actividades/procesar_crear', data)
      .done((res) => {
         console.log(res);
         history.back();
      })
      .fail((err) => {
         console.log(err);
         const toast = swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
            
         });
      })
}

function updateData() {
   let errors = 0;
   //
   id_unidad = $("#id_unidad");
   id_servicio = $("#id_servicio");
   dt_visita = $("#dt_visita");
   htrabajadas = $("#htrabajadas")
   nombre_profecional = $("#nombre_profecional");
   nombre_empresa = $("#nombre_empresa")
   num_patronal = $("#num_patronal")
   id_actividad_economica = $("#id_actividad_economica")
   id_referencia = $("#id_referencia")
   num_empleados = $("#num_empleados")
   num_hombres = $("#num_hombres")
   num_mujeres = $("#num_mujeres")
   num_beneficiados = $("#num_beneficiados");
   id_corregimiento = $("#id_corregimiento");
   json_actividades = $("#json_actividades");
   id_usuario = $("#id_usuario");
   dt_creacion = $("#dt_creacion");



   if (id_unidad.val() == '' || id_unidad.val() == null || id_unidad.val() == 0 || id_unidad.val() == undefined) {
      id_unidad.addClass('is-invalid');
      id_unidad.focus();
      errors += 1;
   }

   if (id_servicio.val() == '' || id_servicio.val() == null || id_servicio.val() == 0 || id_servicio.val() == undefined) {
      id_servicio.addClass('is-invalid');
      id_servicio.focus();
      errors += 1;
   }

   if (dt_visita.val() == '' || dt_visita.val() == null || dt_visita.val() == 0 || dt_visita.val() == undefined) {
      dt_visita.addClass('is-invalid');
      dt_visita.focus();
      errors += 1;
   }

   if (htrabajadas.val() == '' || htrabajadas.val() == null || htrabajadas.val() == 0 || htrabajadas.val() == undefined) {
      htrabajadas.addClass('is-invalid');
      htrabajadas.focus();
      errors += 1;
   }

   if (nombre_profecional.val() == '' || nombre_profecional.val() == null || nombre_profecional.val() == 0 || nombre_profecional.val() == undefined) {
      nombre_profecional.addClass('is-invalid');
      nombre_profecional.focus();
      errors += 1;
   }

   if (nombre_empresa.val() == '' || nombre_empresa.val() == null || nombre_empresa.val() == 0 || nombre_empresa.val() == undefined) {
      nombre_empresa.addClass('is-invalid');
      nombre_empresa.focus();
      errors += 1;
   }

   if (num_patronal.val() == '' || num_patronal.val() == null || num_patronal.val() == 0 || num_patronal.val() == undefined) {
      num_patronal.addClass('is-invalid');
      num_patronal.focus();
      errors += 1;
   }

   if (id_actividad_economica.val() == '' || id_actividad_economica.val() == null || id_actividad_economica.val() == 0 || id_actividad_economica.val() == undefined) {
      id_actividad_economica.addClass('is-invalid');
      id_actividad_economica.focus();
      errors += 1;
   }

   if (id_referencia.val() == '' || id_referencia.val() == null || id_referencia.val() == 0 || id_referencia.val() == undefined) {
      id_referencia.addClass('is-invalid');
      id_referencia.focus();
      errors += 1;
   }

   if (num_empleados.val() == '' || num_empleados.val() == null || num_empleados.val() == 0 || num_empleados.val() == undefined) {
      num_empleados.addClass('is-invalid');
      num_empleados.focus();
      errors += 1;
   }

   if (num_hombres.val() == '' || num_hombres.val() == null || num_hombres.val() == 0 || num_hombres.val() == undefined) {
      num_hombres.addClass('is-invalid');
      num_hombres.focus();
      errors += 1;
   }

   if (num_mujeres.val() == '' || num_mujeres.val() == null || num_mujeres.val() == 0 || num_mujeres.val() == undefined) {
      num_mujeres.addClass('is-invalid');
      num_mujeres.focus();
      errors += 1;
   }

   if (num_beneficiados.val() == '' || num_beneficiados.val() == null || num_beneficiados.val() == 0 || num_beneficiados.val() == undefined) {
      num_beneficiados.addClass('is-invalid');
      num_beneficiados.focus();
      errors += 1;
   }

   if (id_corregimiento.val() == '' || id_corregimiento.val() == null || id_corregimiento.val() == 0 || id_corregimiento.val() == undefined) {
      id_corregimiento.addClass('is-invalid');
      id_corregimiento.focus();
      errors += 1;
   }



   if (errors > 0) {
      return false;
   }
   let json_actividad = [];

   for (let i = 0; i < $(".check-actividad").length; i++) {
      if ($(".check-actividad").eq(i).is(':checked')) {
         json_actividad.push($(".check-actividad").eq(i).val());
      }
   }

   let data = {
      id_unidad: $("#id_unidad").val(),
      id_servicio: $("#id_servicio").val(),
      dt_visita: $("#dt_visita").val(),
      htrabajadas: $("#htrabajadas").val(),
      nombre_profecional: $("#nombre_profecional").val(),
      nombre_empresa: $("#nombre_empresa").val(),
      num_patronal: $("#num_patronal").val(),
      id_actividad_economica: $("#id_actividad_economica").val(),
      id_referencia: $("#id_referencia").val(),
      num_empleados: $("#num_empleados").val(),
      num_hombres: $("#num_hombres").val(),
      num_mujeres: $("#num_mujeres").val(),
      num_beneficiados: $("#num_beneficiados").val(),
      id_corregimiento: $("#id_corregimiento").val(),
      json_actividades: json_actividad,
      id_usuario: $("#id_usuario").val(),
      dt_creacion: $("#dt_creacion").val(),
      id: $("#id").val()

   }

   $.post(url + 'actividades/procesar_editar', data)
      .done((res) => {
         console.log(res);
         history.back();
      })
      .fail((err) => {
         console.log(err);
      })
}


function eliminar_actividad() {
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
      text: "Al ser eliminado no podrá recuperarlo--!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, eliminar!',
      cancelButtonText: 'No, cancelar!',
      reverseButtons: true
   }).then((result) => {
      if (result.isConfirmed) {
         $.post(url + 'actividades/eliminar/' + id, {})
            .done((res) => {
               console.log(res);
               console.log(id);
               swalWithBootstrapButtons.fire({
                  title: `${res['title']}!`,
                  text: `${res['message']}`,
                  showCancelButton: false,
                  confirmButtonText: 'Aceptar!',
               }).then(rst => {
                  console.log(rst);
                  location.reload();
               })
            })
            .fail((err) => {
               console.log(err);
               console.log(id);
               swalWithBootstrapButtons.fire({
                  title: `${err.responseJSON['title']}!`,
                  text: `${err.responseJSON['message']}`,

               })
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
