<div class="content">
   <div class="row">
      <div class="col-md-8">
         <div class="block block-rounded">
            <div class="block-content block-content-full">
               <div class="table-responsive">
               <table class="table">
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
                     <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                     </tr>
                  </tbody>
               </table>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-4">
         <div class="block block-rounded">
            <div class="block-content block-content-full">
               <form>
                  <div class="mb-2">
                     <input type="text" class="form-control" id="id" name="id" placeholder="Identificador" disabled>
                  </div>
                  <div class="mb-2">
                     <label class="form-label" for="nombre">Nombre</label>
                     <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombres">
                  </div>
                  <div class="mb-2">
                     <label class="form-label" for="apellido">Apellido</label>
                     <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos">
                  </div>

                  <div class="mb-2">
                     <label class="form-label" for="unidad">Unidad de Salud</label>
                     <select class="form-select" id="unidad" name="unidad">

                     </select>
                  </div>

                  <div class="mb-2">
                     <label class="form-label" for="tipo_usuario">Tipo de Usuario</label>
                     <select class="form-select" id="tipo_usuario" name="tipo_usuario">

                     </select>
                  </div>

                  <div class="mb-2">
                     <label class="form-label" for="correo">Correo</label>
                     <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo Electronico">
                  </div>

                  <div class="mb-2">
                     <label class="form-label" for="clave">Contrase&ntilde;a</label>
                     <input type="password" class="form-control" id="clave" name="clave" placeholder="Contrase&ntilde;a">
                  </div>
                  <div class="mb-2">
                     <label class="form-label" for="estado">Estado Usuario</label>
                     <select class="form-select" id="estado" name="estado">

                     </select>
                  </div>
                  <div class="mb-2 text-center">
                     <button type="button" class="btn btn-alt-primary btn-block">
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