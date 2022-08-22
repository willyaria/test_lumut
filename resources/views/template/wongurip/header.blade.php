<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar">
	<nav class="navbar top-navbar navbar-expand-md navbar-light">
		<!-- ============================================================== -->
		<!-- Logo -->
		<!-- ============================================================== -->
		
		<!-- ============================================================== -->
		<!-- End Logo -->
		<!-- ============================================================== -->
		<div class="navbar-collapse">
			<!-- ============================================================== -->
			<!-- toggle and nav items -->
			<!-- ============================================================== -->
			<ul class="navbar-nav mr-auto mt-md-0">
				<!-- This is  -->
				<li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
				<li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
			</ul>
			<!-- ============================================================== -->
			<!-- User profile and search -->
			<!-- ============================================================== -->
			<ul class="navbar-nav my-lg-0">
				<!-- ============================================================== -->
				<!-- Comment -->
				<!-- ============================================================== -->
				<!-- <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
						<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
					</a>
					<div class="dropdown-menu dropdown-menu-right mailbox scale-up">
						<ul>
							
							<li>
								<div class="message-center">
									
								</div>
							</li>
							<li>
								<a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
							</li>
						</ul>
					</div>
				</li> -->
				<!-- ============================================================== -->
				<!-- End Comment -->
				<!-- ============================================================== -->
				<!-- ============================================================== -->
				<!-- Messages -->
				<!-- ============================================================== -->
				
				<!-- ============================================================== -->
				<!-- End Messages -->
				<!-- ============================================================== -->
				<!-- ============================================================== -->
				<!-- Profile -->
				<!-- ============================================================== -->
				<?php
					$user = DB::select('SELECT * from account where id="'.$id_user.'"'); //Mengambil where id berdasarkan session yang dikirim dari controller Administrator pada function dashboard
					
					foreach ($user as $dt) {
						$nama = $dt->name;
						$peran = $dt->role;
						$id = $dt->id;
					}
				?>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="" alt="user" class="profile-pic" /></a>
					<div class="dropdown-menu dropdown-menu-right scale-up">
						<ul class="dropdown-user">
							<li>
								<div class="dw-user-box">
									<div class="u-img"><img src="" class="img-circle" alt="user"></div>
									<div class="u-text">
										<h4>Hai, <?php echo $nama ?></h4>  
										<p class="text-muted">Peran : <?php echo $peran ?></p>
									</div>
								</div>
							</li>
							<li><a href="{{ url('/logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
						</ul>
					</div>
				</li>
				<!-- ============================================================== -->
				<!-- Language -->
				<!-- ============================================================== -->
			</ul>
		</div>
	</nav>
</header>
<!-- ============================================================== -->
<!-- End Topbar header -->

