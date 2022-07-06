<div class="content">
   <div class="block block-rounded bg-transparent bg-image" style="background-image: url('<?= APP_URI ?>public/assets/media/photos/atenci_ba.jpg');">
      <div class="block-content block-content-full bg-primary-dark-op">
         <div class="py-4">
            <h1 class="h3 text-center text-white-50 fw-bold mb-2">
               <?= $title_page ?>
            </h1>
         </div>
      </div>
   </div>
   <div class="block block-rounded block-mode-loading-oneui h-100 mb-2">
      <div class="block-header block-header-default">
         <h3 class="block-title">Atenciones</h3>
         <div class="block-options">
            <a href="<?= APP_URI ?>atenciones/nueva_hoja" type="button" class="btn-block-option text-primary">
               <i class="si si-plus"></i>
               Nuevo Registro
            </a>
         </div>
      </div>
      <div class="block-content block-content-full">
         <table id="tbl_hojas" class="table table-sm table-striped table-hover table-borderless table-vcenter fs-sm mb-2">
            <thead>
               <tr class="text-uppercase">
                  <th class="fw-bold  text-center">ID</th>
                  <th class="fw-bold  text-center">Unidad Ejecutora</th>
                  <th class="fw-bold  text-center">Servicio</th>
                  <th class="fw-bold  text-center">Fecha de Atenci&oacute;n</th>
                  <th class="fw-bold  text-center">Especialista</th>
                  <th class="fw-bold  text-center">Acciones</th>

               </tr>
            </thead>
            <tbody>
               <?php
               if (isset($data['atenciones'])) {
                  $atencion = $data['atenciones']['data'];
                  for ($a = 0; $a < count($atencion); $a++) {

               ?>
                     <tr>
                        <td><span class="fw-semibold"><?= $atencion[$a]['id'] ?></span></td>
                        <td class="d-none d-sm-table-cell"><?= $atencion[$a]['desc_unidad'] ?></td>
                        <td class="d-none d-sm-table-cell"><?= $atencion[$a]['desctipcion'] ?></td>
                        <td class="d-none d-sm-table-cell"><?= $atencion[$a]['dt_atencion'] ?></td>
                        <td class="d-none d-sm-table-cell"><?= $atencion[$a]['nombre_profecional'] ?></td>

                        <td class="text-center">
                           <div class="btn-group btn-group-sm me-2 mb-2" role="group" aria-label="Small Primary Second group">
                              <button type="button" class="btn btn-eliminar rounded-pill btn-danger" data-bs-toggle="popover" data-bs-placement="top" title="Eliminar" data-bs-content=" ">
                                 <i class="si si-trash"></i>
                              </button>
                              <a href="<?= APP_URI ?>atenciones/editar_hoja/<?= $atencion[$a]['id'] ?>" type="button" class="btn rounded-pill btn-success mx-sm-1" data-bs-toggle="popover" data-bs-placement="top" title="Editar" data-bs-content=" ">
                                 <i class="si si-pencil"></i>
                              </a>
                              <a href="<?= APP_URI ?>atenciones/detalle_hoja/<?= $atencion[$a]['id'] ?>" type="button" class="btn rounded-pill btn-secondary mx-sm-1" data-bs-toggle="popover" data-bs-placement="top" title="Detalles" data-bs-content=" ">
                                 <i class="si si-list"></i>
                              </a>
                              <a href="<?= APP_URI ?>atenciones/nueva_atencion/<?= $atencion[$a]['id'] ?>" type="button" class="btn rounded-pill btn-primary" data-bs-toggle="popover" data-bs-placement="top" title="Crear" data-bs-content=" ">
                                 <i class="si si-plus"></i>
                              </a>
                           </div>
                        </td>
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

<script>
   $("document").ready(function() {
      $("#tbl_hojas").DataTable();
      $("#tbl_hojas").on('click', '.btn-eliminar', confirmar);
   })

   function confirmar() {
      var currentRow = $(this).closest("tr");
      var id = currentRow.find("td:eq(0)").text();
      Swal.fire({
         title: 'Eliminar Registro',
         text: "Está seguro que desea eliminar este registro! ",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Si, eliminar!!',
         cancelButtonText: 'Volver'
      }).then((result) => {
         if (result.isConfirmed) {
            Swal.fire(
               $.ajax({
                  url: '<?= APP_URI ?>atenciones/eliminar_hoja/' + id,
                  type: 'DELETE',
                  dataType: 'json',
                  success: function(data) {
                     if (data.status == 'success') {
                        Swal.fire({
                           title: 'Eliminado!',
                           text: data.message,
                           icon: 'success',
                           confirmButtonText: 'Ok'
                        }).then((result) => {
                           if (result.isConfirmed) {
                              location.reload();
                           }
                        })
                     } else {
                        Swal.fire({
                           title: 'Error!',
                           text: data.message,
                           icon: 'error',
                           confirmButtonText: 'Ok'
                        })
                     }
                  },
                  error: function(data) {
                     Swal.fire({
                        title: 'Error!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                     })
                  }

               })
            )
         }
      })
   }
</script>