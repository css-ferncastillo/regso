<div class="bg-primary-darker">
   <div class="content py-3">
      <div class="d-lg-none">
         <button type="button" class="btn w-100 btn-alt-secondary d-flex justify-content-between align-items-center" data-toggle="class-toggle" data-target="#main-navigation" data-class="d-none">
            Menu
            <i class="fa fa-bars"></i>
         </button>
      </div>
      <div id="main-navigation" class="d-none d-lg-block mt-2 mt-lg-0">
         <ul class="nav-main nav-main-dark nav-main-horizontal nav-main-hover">
            <li class="nav-main-item">
               <a class="nav-main-link" href="<?= APP_URI; ?>">
                  <i class="nav-main-link-icon si si-compass"></i>
                  <span class="nav-main-link-name">Inicio</span>
               </a>
            </li>

            <li class="nav-main-item">
               <a class="nav-main-link" href="<?= APP_URI; ?>atenciones">
                  <i class="nav-main-link-icon si si-directions"></i>
                  <span class="nav-main-link-name">Atenciones</span>
               </a>
            </li>

            <li class="nav-main-item">
               <a class="nav-main-link" href="<?= APP_URI; ?>actividades">
                  <i class="nav-main-link-icon si si-badge"></i>
                  <span class="nav-main-link-name">Actividades</span>
               </a>
            </li>

            <li class="nav-main-item">
               <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
               <i class="nav-main-link-icon si si-equalizer"></i>
                  <span class="nav-main-link-name">Administraci&oacute;n</span>
               </a>
               <ul class="nav-main-submenu">
                  <li class="nav-main-item">
                     <a class="nav-main-link" href="<?=APP_URI?>administracion/usuarios">
                        <span class="nav-main-link-name">Usuarios</span>
                     </a>
                  </li>
                  <li class="nav-main-item">
                     <a class="nav-main-link" href="<?=APP_URI?>administracion/actividad_economica">
                        <span class="nav-main-link-name">Actividad Econ&oacute;mica</span>
                     </a>
                  </li>

                  <li class="nav-main-item">
                     <a class="nav-main-link" href="<?=APP_URI?>administracion/alta_laboral">
                        <span class="nav-main-link-name">Alta Laboral</span>
                     </a>
                  </li>

                  <li class="nav-main-item">
                     <a class="nav-main-link" href="<?=APP_URI?>administracion/ref_empresas">
                        <span class="nav-main-link-name">Referencia de Empresas</span>
                     </a>
                  </li>

                  <li class="nav-main-item">
                     <a class="nav-main-link" href="<?=APP_URI?>administracion/tipo_actividad">
                        <span class="nav-main-link-name">Tipo de Actividad</span>
                     </a>
                  </li>

                  <li class="nav-main-item">
                     <a class="nav-main-link" href="<?=APP_URI?>administracion/tipo_servicio">
                        <span class="nav-main-link-name">Tipo de Servicio</span>
                     </a>
                  </li>

                  <li class="nav-main-item">
                     <a class="nav-main-link" href="<?=APP_URI?>administracion/servicios">
                        <span class="nav-main-link-name">Servicios</span>
                     </a>
                  </li>
            
               </ul>
            </li>

            <li class="nav-main-item">
               <a class="nav-main-link" href="<?= APP_URI; ?>reportes">
                  <i class="nav-main-link-icon si si-chart"></i>
                  <span class="nav-main-link-name">Reportes</span>
               </a>
            </li>

         </ul>
      </div>
   </div>
</div>