<div class="content">
   <h1><?= $title_page ?></h1>
   <div class="block block-rounded block-mode-loading-oneui h-100 mb-2">
      <div class="block-header block-header-default">
         <h3 class="block-title">Actividades</h3>
         <div class="block-options">
            <button type="button" class="btn-block-option text-primary">
               <i class="si si-plus"></i>
               Nuevo Registro
            </button>
         </div>
      </div>
      <div class="block-content block-content-full">
         <table class="table table-striped table-hover table-borderless table-vcenter fs-sm mb-2">
            <thead>
               <tr class="text-uppercase">
                  <th class="fw-bold">ID</th>
                  <th class="fw-bold">Fecha</th>
                  <th class="fw-bold">Tipo</th>
                  <th class="fw-bold">Orders</th>
                  <th class="fw-bold">Acciones</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>
                     <span class="fw-semibold">#01368</span>
                  </td>
                  <td class="d-none d-sm-table-cell text-center">
                     <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar13.jpg" alt="">
                  </td>
                  <td class="fw-semibold">
                     Jose Wagner </td>
                  <td class="d-none d-sm-table-cell text-center">
                     <a class="link-fx fw-semibold" href="javascript:void(0)">5</a>
                  </td>
                  <td class="text-center">
                     <div class="btn-group btn-group-sm me-2 mb-2" role="group" aria-label="Small Primary Second group">
                        <button type="button" class="btn rounded-pill btn-danger">
                           <i class="si si-trash"></i>
                        </button>
                        <a href="#editar" type="button" class="btn rounded-pill btn-success mx-sm-1">
                           <i class="si si-pencil"></i>
                        </a>
                        <a href="#nuevo" type="button" class="btn rounded-pill btn-primary">
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