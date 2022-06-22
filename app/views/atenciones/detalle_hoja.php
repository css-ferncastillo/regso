<div class="content">
   <div class="block block-rounded block-mode-loading-oneui h-100 mb-4">
      <div class="block-header block-header-default">
         <h3 class="block-title">Registro de Hoja de Atenci&oacute;n</h3>
      </div>
      <div class="block-content block-content-full">
         <form action="">
            <div class="row g-3 mb-4">
               <!-- ROW 1 -->
               <div class="col">
                  <label for="unidad" class="form-label">Unidad Ejecutora</label>
                  <select class="form-select" aria-label="Unidad Ejecutora" id="unidad" name="unidad">
                     <option selected>Open this select menu</option>
                     <option value="1">One</option>
                     <option value="2">Two</option>
                     <option value="3">Three</option>
                  </select>
               </div>
               <div class="col">
                  <label for="servicio" class="form-label">Servicio</label>
                  <select class="form-select" aria-label="Servicio" id="servicio" name="servicio">
                     <option selected>Open this select menu</option>
                     <option value="1">One</option>
                     <option value="2">Two</option>
                     <option value="3">Three</option>
                  </select>
               </div>
               <div class="col">
                  <label for="atencion_dt" class="form-label">Fecha de Atenci&oacute;n</label>
                  <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" id="atencion_dt" name="atencion_dt">
               </div>
               <div class="col">
                  <label for="especialista" class="form-label">Nombre Especialista</label>
                  <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" id="especialista" name="especialista">
               </div>
            </div>
            <!-- ROW 2 -->
            <div class="row g-3 mb-4">
               <div class="col">
                  <label for="latencion" class="form-label">Lugar de Atencion</label>
                  <select class="form-select" aria-label="Unidad Ejecutora" id="latencion" name="latencion">
                     <option selected>Open this select menu</option>
                     <option value="1">One</option>
                     <option value="2">Two</option>
                     <option value="3">Three</option>
                  </select>
               </div>
               <div class="col">
                  <label for="hadministrativas" class="form-label">Horas Administrativas</label>
                  <input type="number" class="form-control" placeholder="Last name" aria-label="Last name" id="hadministrativas" name="hadministrativas" min="0" max="24">
               </div>
               <div class="col">
                  <label for="exampleFormControlInput1" class="form-label">Horas Contratadas</label>
                  <input type="number" class="form-control" placeholder="Last name" aria-label="Last name" min="0" max="24">
               </div>
               <div class="col">
                  <label for="exampleFormControlInput1" class="form-label">Horas Utilizadas</label>
                  <input type="number" class="form-control" placeholder="Last name" aria-label="Last name" min="0" max="24">
               </div>
            </div>
            <!-- ROW 3 -->
            <div class="row g-3 mb-4">
               <div class="col">
                  <label for="hadministrativas" class="form-label">Vacaciones</label>
                  <input type="number" class="form-control" placeholder="Last name" aria-label="Last name" id="hadministrativas" name="hadministrativas">
               </div>
               <div class="col">
                  <label for="hadministrativas" class="form-label">Licencias</label>
                  <input type="number" class="form-control" placeholder="Last name" aria-label="Last name" id="hadministrativas" name="hadministrativas">
               </div>
               <div class="col">
                  <label for="hadministrativas" class="form-label">Permisos</label>
                  <input type="number" class="form-control" placeholder="Last name" aria-label="Last name" id="hadministrativas" name="hadministrativas">
               </div>
               <div class="col">
                  <label for="hadministrativas" class="form-label">Incapacidades</label>
                  <input type="number" class="form-control" placeholder="Last name" aria-label="Last name" id="hadministrativas" name="hadministrativas">
               </div>
               <div class="col">
                  <label for="hadministrativas" class="form-label">Fortuitos</label>
                  <input type="number" class="form-control" placeholder="Last name" aria-label="Last name" id="hadministrativas" name="hadministrativas">
               </div>
            </div>
            <!-- ROW 4 -->
            <div class="row g-3 mb-4">
               <div class="col">
                  <label for="hadministrativas" class="form-label">Carga Laboral</label>
                  <input type="number" class="form-control" placeholder="Last name" aria-label="Last name" id="hadministrativas" name="hadministrativas">
               </div>
               <div class="col">
                  <label for="hadministrativas" class="form-label">Cupos Utilizados</label>
                  <input type="number" class="form-control" placeholder="Last name" aria-label="Last name" id="hadministrativas" name="hadministrativas">
               </div>
               <div class="col">
                  <label for="hadministrativas" class="form-label">Cuppos Disponibles</label>
                  <input type="number" class="form-control" placeholder="Last name" aria-label="Last name" id="hadministrativas" name="hadministrativas">
               </div>
               <div class="col">
                  <label for="hadministrativas" class="form-label">Cupos No Acudi&oacute;</label>
                  <input type="number" class="form-control" placeholder="Last name" aria-label="Last name" id="hadministrativas" name="hadministrativas">
               </div>
               <div class="col">
                  <label for="hadministrativas" class="form-label">Cupos No Solicitados</label>
                  <input type="number" class="form-control" placeholder="Last name" aria-label="Last name" id="hadministrativas" name="hadministrativas">
               </div>
            </div>

            <div class="d-grid gap-2 col-3 mx-auto">
               <button class="btn btn-alt-primary" type="button">EDITAR</button>
            </div>
         </form>
      </div>
   </div>

   <div class="block block-rounded block-mode-loading-oneui h-100 mb-4">
      <div class="block-header block-header-default">
         <h3 class="block-title">Detalle de Atenciones</h3>
      </div>
      <div class="block-content block-content-full">
         <table class="table">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Cedula</th>
                  <th>Empresa</th>
                  <th>Tipo Empresa</th>
                  <th>Actividad Economica</th>
                  <th>Tipo Paciente</th>
                  <th>Acciones</th>
               </tr>
            </thead>
         </table>
      </div>
   </div>
</div>