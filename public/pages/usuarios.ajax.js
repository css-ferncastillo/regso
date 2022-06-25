$(document).ready(() => {
   getProvincias();
   getTipoUsuario();
   $("#id_provincia").change(() => {
      getUnidades();
   })
   $("#tbl-usuarios").on("click", ".btn-editar", cargarDatos);
   $("#tbl-usuarios").on("click", ".btn-eliminar", eliminarUsuario);
})

function getProvincias() {
   $.ajax({
      url: baseUrl + '/provincia/listar',
      type: 'GET',
      dataType: 'json',
      success: function (data) {
         $('#id_provincia').empty();
         $('#id_provincia').append('<option value="">Seleccione una provincia</option>');
         $.each(data['data'], function (key, value) {
            $('#id_provincia').append('<option value="' + value.id + '">' + value.desc_prov + '</option>');
         });

      },
      error: function (data) {
         console.log(data);
      }
   });
}

function getUnidades(unidad=null){
   let params = $("#id_provincia").val();
   $.ajax({
      url: baseUrl + '/unidad/filtrar/' + params,
      type: 'GET',
      dataType: 'json',
      success: function (data) {
         $('#id_unidad').empty();
         $('#id_unidad').append('<option value="">Seleccione una unidad</option>');
         $.each(data['data'], function (key, value) {
            if(unidad != null && unidad == value.id){
               $('#id_unidad').append('<option value="' + value.id + '" selected>' + value.desc_unidad + '</option>');
            } else{
               $('#id_unidad').append('<option value="' + value.id + '">' + value.tipo +" - "+ value.desc_unidad + '</option>');
            }
         });
      },
      error: function (data) {
         console.log(data);
      }
   })
}

function getTipoUsuario(){
   $.ajax({
      url: baseUrl + '/tipo_usuario/listar',
      type: 'GET',
      dataType: 'json',
      success: function (data) {
         $('#id_tipo_usuario').empty();
         $('#id_tipo_usuario').append('<option value="">Seleccione un tipo de usuario</option>');
         $.each(data['data'], function (key, value) {
            $('#id_tipo_usuario').append('<option value="' + value.id + '">' + value.tipo_usuario + '</option>');
         });
      },
      error: function (data) {
         console.log(data);
      }
   });
}

function cargarDatos(){
   var currentRow = $(this).closest("tr");
   var id = currentRow.find("button.btn-editar").val();
   $.ajax({
      url: baseUrl + '/usuario/listar_uno/' + id,
      type: 'GET',
      dataType: 'json',
      success: function (data) {
         const {id, nombre1, apellido1, id_tipo_usuario, correo, id_provincia, id_unidad, estado} = data['data'][0];
         $("#id").val(id);
         $("#nombre1").val(nombre1);
         $("#apellido1").val(apellido1);
         $("#id_tipo_usuario").val(id_tipo_usuario);
         $("#correo").val(correo);
         $("#id_provincia").val(id_provincia);
         getUnidades(id_unidad);
         $("#estado").val(estado);
      },
      error: function (data) {
         console.log(data);
      }
   });
}

function eliminarUsuario(){
   var currentRow = $(this).closest("tr");
   var id = currentRow.find("button.btn-editar").val();
   const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-alt-success',
        cancelButton: 'btn btn-alt-danger'
      },
      buttonsStyling: false
    })
    
    swalWithBootstrapButtons.fire({
      title: 'Desea eliminar este usuario?',
      text: "Al ser eliminado no podrá recuperarlo!",
      // icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Si, eliminar!',
      cancelButtonText: 'No, cancelar!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        swalWithBootstrapButtons.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'Your imaginary file is safe :)',
          'error'
        )
      }
    })
}