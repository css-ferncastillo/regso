$(document).ready(function() {
   $("#dt_atencion").datepicker({todayHighlight: true, format: "yyyy-mm-dd"});
   $("#btn-nueva-hoja").on('click', validateForm);
   
});


function validateForm(e){
   let id_unidad = $("#id_unidad");
   let id_servicio =  $("#id_servicio");
   let dt_atencion = $("#dt_atencion");
   let nombre_profecional = $("#nombre_profecional");
   let lugar_atencion = $("#lugar_atencion");
   let h_contratadas = $("#h_contratadas");
   let h_trabajadas = $("#h_trabajadas");
   let h_administrativas = $("#h_administrativas");
   let num_vacaciones = $("#num_vacaciones");
   let num_licencias  = $("#num_licencias");
   let num_permiso = $("#num_permiso");
   let num_incapacidad = $("#num_incapacidad");
   let num_fortuitas = $("#num_fortuitas");
   let carga_laboral = $("#carga_laboral");
   let cupo_utilizado = $("#cupo_utilizado");
   let cupo_disponible = $("#cupo_disponible");
   let cupo_ausente  = $("#cupo_ausente");
   let cupo_no_solicitado = $("#cupo_no_solicitado");

   let errors = 0;

   if(id_unidad.val() == '' || id_unidad.val() == null || id_unidad.val() == 0 || id_unidad.val() == undefined){
      id_unidad.addClass('is-invalid');
      id_unidad.focus();
      $("#id_unidad_help").removeAttr('hidden');
      errors += 1;
   }

   if(id_servicio.val() == '' || id_servicio.val() == null || id_servicio.val() == 0 || id_servicio.val() == undefined){
      id_servicio.addClass('is-invalid');
      id_servicio.focus();
      $("#id_servicio_help").removeAttr('hidden');
      errors += 1;
   }

   if(dt_atencion.val() == '' || dt_atencion.val() == null || dt_atencion.val() == 0 || dt_atencion.val() == undefined){
      dt_atencion.addClass('is-invalid');
      dt_atencion.focus();
      $("#dt_atencion").removeAttr('hidden');
      errors += 1;
   }

   if(nombre_profecional.val() == '' || nombre_profecional.val() == null || nombre_profecional.val() == 0 || nombre_profecional.val() == undefined){
      nombre_profecional.addClass('is-invalid');
      nombre_profecional.focus();
      $("#nombre_profecional").removeAttr('hidden');
      errors += 1;
   }

   if(lugar_atencion.val() == '' || lugar_atencion.val() == null || lugar_atencion.val() == 0 || lugar_atencion.val() == undefined){
      lugar_atencion.addClass('is-invalid');
      lugar_atencion.focus();
      $("#lugar_atencion_help").removeAttr('hidden');
      errors += 1;
   }

   if(h_contratadas.val() == '' || h_contratadas.val() == null || h_contratadas.val() == 0 || h_contratadas.val() == undefined){
      h_contratadas.addClass('is-invalid');
      h_contratadas.focus();
      $("#h_contratadas_help").removeAttr('hidden');
      errors += 1;
   }

   if(h_trabajadas.val() == '' || h_trabajadas.val() == null || h_trabajadas.val() == 0 || h_trabajadas.val() == undefined){
      h_trabajadas.addClass('is-invalid');
      h_trabajadas.focus();
      $("#h_trabajadas_help").removeAttr('hidden');
      errors += 1;
   }

   if(h_administrativas.val() == '' || h_administrativas.val() == null || h_administrativas.val() == 0 || h_administrativas.val() == undefined){
      h_administrativas.addClass('is-invalid');
      h_administrativas.focus();
      $("#h_administrativas_help").removeAttr('hidden');
      errors += 1;
   }

  
   if(errors > 0){
      return false;
   } else {
      $("#frm-nueva-hoja").submit();
   }
}

