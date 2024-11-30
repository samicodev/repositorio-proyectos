				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar">
					<!-- <div class="app-sidebar__logo">
						<a class="header-brand" href="index.php">
						
							<img src="../img/logo.png" class="header-brand-img dark-logo" alt="logo incos">
							<img src="../img/logo.png" class="header-brand-img mobile-logo" alt="logo incos">
							<img src="../img/logo.png" class="header-brand-img darkmobile-logo" alt="logo incos">
						</a>
					</div> -->
					<div class="app-sidebar3">
						<div class="app-sidebar__user">
							<div class="dropdown user-pro-body text-center">
								<div class="user-pic">
									<img src="../img/admin.jpg" alt="user-img" class="avatar-xl rounded-circle mb-1">
								</div>
<div class="user-info">
    <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION['nombres']; ?></h5>
    <span class="text-muted app-sidebar__user-name text-sm">
        <?php 
            // Asignar un nombre más descriptivo según el rol almacenado en la sesión
            if ($_SESSION['rol'] === 'admin') {
                echo 'Administrador';
            } elseif ($_SESSION['rol'] === 'docente') {
                echo 'Docente';
            } else {
                echo 'Rol desconocido'; // Opcional: por si existe otro rol no reconocido
            }
        ?>
    </span>
</div>
							</div>
						</div>
						<ul class="side-menu">
							<li class="slide">
								<a class="side-menu__item"   href="index.php">
									<span class="shape1"></span>
									<span class="shape2"></span>
									<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
									<span class="side-menu__label">Inicio</span>
								</a>
							</li>

							<?php if($_SESSION['rol']=='admin') { ?>
							<li class="slide">
								<a class="side-menu__item"   href="usuarios.php">
									<span class="shape1"></span>
									<span class="shape2"></span>
									<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
									<span class="side-menu__label">Usuarios</span>
								</a>
							</li>
							<?php } ?>

							<li class="slide">
								<a class="side-menu__item"   href="estudiantes.php">
									<span class="shape1"></span>
									<span class="shape2"></span>
									<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
									<span class="side-menu__label">Estudiantes</span>
								</a>
							</li>

							<?php if($_SESSION['rol']=='admin') { ?>
							<li class="slide">
								<a class="side-menu__item"   href="carreras.php">
									<span class="shape1"></span>
									<span class="shape2"></span>
									<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
									<span class="side-menu__label">Carreras</span>
								</a>
							</li>
							<?php } ?>

							<?php if($_SESSION['rol']=='admin') { ?>
							<li class="slide">
								<a class="side-menu__item"   href="modalidades.php">
									<span class="shape1"></span>
									<span class="shape2"></span>
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line><line x1="1" y1="14" x2="7" y2="14"></line><line x1="9" y1="8" x2="15" y2="8"></line><line x1="17" y1="16" x2="23" y2="16"></line></svg>
									<span class="side-menu__label">Modalidades</span>
								</a>
							</li>
							<?php } ?>


							<li class="slide">
								<a class="side-menu__item"   href="trabajos.php">
									<span class="shape1"></span>
									<span class="shape2"></span>
									<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
									<span class="side-menu__label">Trabajos</span>
								</a>
							</li>


							<li class="slide">
								<a class="side-menu__item"   href="reportes.php">
									<span class="shape1"></span>
									<span class="shape2"></span>
									<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
									<span class="side-menu__label">Reportes</span>
								</a>
							</li>
								
							<li class="slide">
								<a class="side-menu__item"   href="graficos.php">
									<span class="shape1"></span>
									<span class="shape2"></span>
									<svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path><path d="M22 12A10 10 0 0 0 12 2v10z"></path></svg>
									<span class="side-menu__label">Gráficos</span>
								</a>
							</li>



						</ul>
					</div>
				</aside>