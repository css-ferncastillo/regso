<div class="content">
   <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center py-2 text-center text-md-start">
      <div class="flex-grow-1 mb-1 mb-md-0">
         <h1 class="h3 fw-bold mb-2">
            Administraci&oacute;n de Usuarios
         </h1>
      </div>
   </div>

   <div class="row">
      <div class="col-md-8">
         <div class="block block-rounded">
            <div class="block-content block-content-full">
               <div class="table-responsive">
                  <table class="table" id="tbl-usuarios">
                     <thead>
                        <tr>
                           <td>Correo</td>
                           <td>Nombre</td>
                           <td>Tipo Usuario</td>
                           <td>Unidad</td>
                           <td>Estado</td>
                           <td>Acciones</td>
                        </tr>
                     </thead>
                     <tbody>
                        <?php for ($i = 0; $i < count($usuarios); $i++) { ?>
                           <tr>
                              <td><?= $usuarios[$i]['correo']; ?></td>
                              <td><?= $usuarios[$i]['apellido1'] . ', ' . $usuarios[$i]['nombre1']; ?></td>
                              <td><?= $usuarios[$i]['tipo_usuario']; ?></td>
                              <td><?= $usuarios[$i]['desc_unidad']; ?></td>

                              <td>
                                 <span class="fs-xs fw-semibold d-inline-block py-1 px-3 rounded-pill <?= $usuarios[$i]['estado'] == 1 ? 'bg-success-light text-success' : 'bg-danger-light text-danger'; ?>">
                                    <?= $usuarios[$i]['estado'] == 1 ? 'Activo' : 'Inactivo'; ?>
                                 </span>
                              </td>
                              <td>
                                 <div class="btn-group btn-group-sm me-2 mb-2" role="group">
                                    <button type="button" value="<?= $usuarios[$i]['id']?>" class="btn rounded-pill btn-danger btn-eliminar">
                                       <i class="si si-trash"></i>
                                    </button>
                                    <button type="button" value="<?= $usuarios[$i]['id']?>" class="btn rounded-pill btn-success mx-sm-1 btn-editar">
                                       <i class="si si-pencil"></i>
                                    </button>
                                 </div>
                              </td>
                           </tr>
                        <?php } ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="block block-rounded">
            <div class="block-content block-content-full">
               <form method="post" action="<?=APP_URI?>usuario/create_or_update">
                  <div class="mb-2">
                     <input type="text" class="form-control" id="id" name="id" placeholder="Identificador" readonly>
                  </div>
                  <div class="mb-2">
                     <label class="form-label" for="nombre1">Nombre</label>
                     <input type="text" class="form-control" id="nombre1" name="nombre1" placeholder="Nombres">
                  </div>
                  <div class="mb-2">
                     <label class="form-label" for="apellido1">Apellido</label>
                     <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Apellidos">
                  </div>

                  <div class="mb-2">
                     <label class="form-label" for="id_tipo_usuario">Tipo de Usuario</label>
                     <select class="form-select" id="id_tipo_usuario" name="id_tipo_usuario">

                     </select>
                  </div>

                  <div class="mb-2">
                     <label class="form-label" for="correo">Correo</label>
                     <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo Electronico">
                  </div>

                  <div class="mb-2">
                     <label class="form-label" for="id_provincia">Provincia</label>
                     <select class="form-select" id="id_provincia" name="id_provincia">

                     </select>
                  </div>

                  <div class="mb-2">
                     <label class="form-label" for="id_unidad">Unidad de Salud</label>
                     <select class="form-select" id="id_unidad" name="id_unidad">

                     </select>
                  </div>

                  <div class="mb-2">
                     <label class="form-label" for="clave">Contrase&ntilde;a</label>
                     <input type="password" class="form-control" id="clave" name="clave" placeholder="Contrase&ntilde;a">
                  </div>
                  <div class="mb-2">
                     <label class="form-label" for="estado">Estado Usuario</label>
                     <select class="form-select" id="estado" name="estado">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                     </select>
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
<script src="<?= APP_URI ?>public/assets/js/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="<?= APP_URI ?>public/pages/usuarios.ajax.js"></script>
