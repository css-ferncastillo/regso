<header id="page-header">
         <div class="content-header">
            <div class="d-flex align-items-center">
               <a class="fw-semibold fs-5 tracking-wider text-dual me-3" href="<?=APP_URI ?>"> 
               <img class="img-avatar img-avatar32 m-2" src="<?= APP_URI ?>public/assets/media/photos/white_logo.jpg" alt="logo"/>
                  CSS<span class="fw-normal">Panam&aacute;</span> </a>
               
            </div>
            <div class="d-flex align-items-center">
               
               <div class="dropdown d-inline-block ms-2">
                  <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <img class="rounded" src="https://ui-avatars.com/api/?name=Nombre+Apellido&rounded=True" alt="Header Avatar" style="width: 21px;" />
                     <span class="d-none d-sm-inline-block ms-1">John</span>
                     <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
                     <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="https://ui-avatars.com/api/?name=Nombre+Apellido&rounded=True" alt="">
                        <p class="mt-2 mb-0 fw-medium">John Smith</p>
                        <p class="mb-0 text-muted fs-sm fw-medium">Web Developer</p>
                     </div>
                     <div class="p-2">
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_inbox.html">
                           <span class="fs-sm fw-medium">Inbox</span>
                           <span class="badge rounded-pill bg-primary ms-2">3</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="be_pages_generic_profile.html">
                           <span class="fs-sm fw-medium">Profile</span>
                           <span class="badge rounded-pill bg-primary ms-2">1</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                           <span class="fs-sm fw-medium">Settings</span>
                        </a>
                     </div>
                     <div role="separator" class="dropdown-divider m-0"></div>
                     <div class="p-2">
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="op_auth_lock.html">
                           <span class="fs-sm fw-medium">Lock Account</span>
                        </a>
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="op_auth_signin.html">
                           <span class="fs-sm fw-medium">Log Out</span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="page-header-search" class="overlay-header bg-body-extra-light">
            <div class="content-header">
               <form class="w-100" action="bd_search.html" method="POST">
                  <div class="input-group">
                     <button type="button" class="btn btn-alt-danger" data-toggle="layout" data-action="header_search_off">
                        <i class="fa fa-fw fa-times-circle"></i>
                     </button>
                     <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input" />
                  </div>
               </form>
            </div>
         </div>
         <div id="page-header-loader" class="overlay-header bg-primary-lighter">
            <div class="content-header">
               <div class="w-100 text-center">
                  <i class="fa fa-fw fa-circle-notch fa-spin text-primary"></i>
               </div>
            </div>
         </div>
      </header>