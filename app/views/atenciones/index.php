<div class="content">
   <h1><?= $title_page ?></h1>
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
         <table class="table table-striped table-hover table-borderless table-vcenter fs-sm mb-2">
            <thead>
               <tr class="text-uppercase">
                  <th class="fw-bold">ID</th>
                  <th class="fw-bold">Unidad Ejecutora</th>
                  <th class="fw-bold">Servicio</th>
                  <th class="fw-bold">Fecha de Atenci&oacute;n</th>
                  <th class="fw-bold">Especialista</th>
                  <th class="fw-bold">Acciones</th>
                  
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>
                     <span class="fw-semibold">#01368</span>
                  </td>
                  <td class="d-none d-sm-table-cell text-center">
                     data
                  </td>
                  <td class="fw-semibold">
                     Jose Wagner </td>
                  <td class="d-none d-sm-table-cell text-center">
                     data
                  </td>
                  <td class="d-none d-sm-table-cell text-center">
                     data
                  </td>
                  <td class="text-center">
                     <div class="btn-group btn-group-sm me-2 mb-2" role="group" aria-label="Small Primary Second group">
                        <button type="button" class="btn rounded-pill btn-danger" data-bs-toggle="popover" data-bs-placement="top" title="Eliminar" data-bs-content=" ">
                           <i class="si si-trash"></i>
                        </button>
                        <a href="#editar" type="button" class="btn rounded-pill btn-success mx-sm-1" data-bs-toggle="popover" data-bs-placement="top" title="Editar" data-bs-content=" ">
                           <i class="si si-pencil"></i>
                        </a>
                        <a href="<?= APP_URI ?>atenciones/nueva_atencion/1" type="button" class="btn rounded-pill btn-primary" data-bs-toggle="popover" data-bs-placement="top" title="Crear" data-bs-content=" ">
                           <i class="si si-plus"></i>
                        </a>
                     </div>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>