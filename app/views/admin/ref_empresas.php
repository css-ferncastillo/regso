<div class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="block block-rounded block-mode-loading-oneui h-100 mb-2">
            <div class="block-header block-header-default">
               <h3 class="block-title"><?= $title_page ?></h3>
               <div class="block-options">

               </div>
            </div>
            <div class="block-content block-content-full">
               <!-- Contenido -->
               <table class="table table-sm">
                  <thead>
                     <tr>
                        <th>Id</th>
                        <th>Tipo Empresa</th>
                        <th>Acciones</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     if (isset($data)) {
                        for ($i = 0; $i < count($data); $i++) {
                     ?>
                           <tr>
                              <td><?= $data[$i]['id']; ?></td>
                              <td><?= $data[$i]['ref_empresa'] ?></td>
                              <td>
                                 <div class="btn-group btn-group-sm me-2 mb-2" role="group">
                                    <button type="button" value="<?= $data[$i]['id'] ?>" class="btn rounded-pill btn-alt-danger mx-sm-1 btn-eliminar">
                                       <i class="si si-trash"></i>
                                    </button>
                                    <button type="button" value="<?= $data[$i]['id'] ?>" class="btn rounded-pill btn-alt-success mx-sm-1 btn-editar">
                                       <i class="si si-pencil"></i>
                                    </button>
                                 </div>
                              </td>
                           </tr>
                     <?php }
                     }
                     ?>
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
               <form id="frm_alaboral" action="" method="post">
                  <div class="mb-2">
                     <input type="text" class="form-control" id="id" name="id" placeholder="Identificador" disabled>
                  </div>
                  <div class="mb-2">
                     <label class="form-label" for="ref_empresa">Tipo Empresa</label>
                     <input type="text" class="form-control" id="ref_empresa" name="ref_empresa" placeholder="Tipo Empresa">
                  </div>
                  <div class="mb-2 text-center">
                     <button type="submit" class="btn btn-alt-primary btn-block">
                        <i class="si si-share"></i>
                        Procesar
                     </button>
                     <button type="reset" class="btn btn-alt-secondary btn-block">
                        <i class="si si-refresh"></i>
                        Limpiar
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>