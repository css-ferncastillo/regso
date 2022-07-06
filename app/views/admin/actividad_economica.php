
<div class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="block block-rounded block-mode-loading-oneui h-100 mb-2">
            <div class="block-header block-header-default">
               <h3 class="block-title"><?= $title_page ?></h3>
               <div class="block-options">

               </div>
            </div>
            <div class="block-content block-content-full table-responsive">
               <!-- Contenido -->
               <table class="table">
                  <thead>
                     <tr>
                        <th>Id</th>
                        <th>Actividades</th>
                        <th>Acciones</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="block block-rounded block-mode-loading-oneui h-100 mb-2">
            <div class="block-header block-header-default">
               <h3 class="block-title"><?= $title_page ?></h3>
               <div class="block-options">

               </div>
            </div>
            <div class="block-content block-content-full">
               <!-- Contenido -->
               <form id="frm_acteconomica" action="" method="post">
                  <div class="mb-2">
                     <input type="text" class="form-control" id="id" name="id" placeholder="Identificador" disabled>
                  </div>
                  <div class="mb-2">
                     <label class="form-label" for="actividad_economica">Actividad Economica</label>
                     <input type="text" class="form-control" id="actividad_economica" name="actividad_economica" placeholder="Actividad Economica">
                  </div>
                  <div class="mb-2 mt-3 mb-3">
                     <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>