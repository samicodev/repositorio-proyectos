						<div class="app-header header">
							<div class="container-fluid">
								<div class="d-flex">
									<!-- <a class="header-brand" href="index.php">
										<img src="../img/logo.png" class="header-brand-img desktop-lgo" alt="Zendashlogo">
										<img src="../img/logo.png" class="header-brand-img dark-logo" alt="Zendashlogo">
										<img src="../img/logo.png" class="header-brand-img mobile-logo" alt="Zendashlogo">
										<img src="../img/logo.png" class="header-brand-img darkmobile-logo" alt="Zendashlogo">
									</a> -->
									<div class="app-sidebar__toggle" data-toggle="sidebar">
										<a class="open-toggle" href="#">
											<svg class="header-icon mt-1" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"><path d="M0 0h24v24H0V0z" fill="none"></path><path d="M21 11.01L3 11v2h18zM3 16h12v2H3zM21 6H3v2.01L21 8z"></path></svg>
										</a>
									</div>
									<div class="mt-1">

									</div><!-- SEARCH -->
									<div class="d-flex justify-content-between align-items-center w-100">
  <!-- Grupo de elementos a la izquierda -->
  <div class="d-flex align-items-center">
    <div class="d-none d-lg-block ml-5">
      <h6 class="mb-0">INSTITUTO TECNICO INCOS PANDO</h6>
    </div>
    <div>
      <img src="../img/logo.png" class="header-brand-img ml-3" alt="INCOS" style="width:25px;height:auto;">
    </div>
  </div>

  <!-- Grupo de elementos a la derecha -->
  <div class="d-flex align-items-center">
    <div class="dropdown header-fullscreen">
      <a class="nav-link icon full-screen-link p-0" id="fullscreen-button">
        <svg class="header-icon" x="1008" y="1248" viewBox="0 0 24 24" height="100%" width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
          <path d="M7,14 L5,14 L5,19 L10,19 L10,17 L7,17 L7,14 Z M5,10 L7,10 L7,7 L10,7 L10,5 L5,5 L5,10 Z M17,17 L14,17 L14,19 L19,19 L19,14 L17,14 L17,17 Z M14,5 L14,7 L17,7 L17,10 L19,10 L19,5 L14,5 Z"></path>
        </svg>
      </a>
    </div>
    <div class="dropdown profile-dropdown">
      <a href="#" class="nav-link pr-0 pl-2 leading-none" data-toggle="dropdown">
        <span>
          <img src="../img/admin.jpg" alt="img" class="avatar avatar-md brround">
        </span>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated p-0">
        <div class="text-center border-bottom pb-4 pt-4">
          <a href="#" class="text-center user pb-0 font-weight-bold"><?php echo $_SESSION['nombres']; ?></a>
          <p class="text-center user-semi-title mb-0"><?php echo $_SESSION['rol']; ?></p>
        </div>
        <a class="dropdown-item border-bottom" href="#" style="display: none;">
          <i class="dropdown-icon mdi mdi-settings"></i> Cambiar clave
        </a>
        <a class="dropdown-item border-bottom" href="logout.php">
          <i class="dropdown-icon mdi mdi-logout-variant"></i> Cerrar sesión
        </a>
      </div>
    </div>
  </div>
</div>

								</div>
							</div>
						</div>