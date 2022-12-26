<nav class="main-header navbar navbar-expand navbar-white navbar-light py-0 py-sm-1 px-2 px-sm-3"
style="line-height: 1.85">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item mr-2">
			<a class="nav-link p-1" data-widget="pushmenu" href="#" role="button">
				<i class="fas fa-bars"></i>
			</a>
		</li>
		<li class="nav-item mr-2">
			<a href="{{ back()->getTargetUrl() }}" class="nav-link p-1"
				title="Kembali" style="line-height: 1.85">
				<i class="fa fa-angle-left fa-lg"></i>
			</a>
		</li>
		<li class="nav-item">
			<a href="/admin" class="nav-link p-1"> Dashboard </a>
		</li>
		{{-- <li class="nav-item d-sm-none">
			<a class="nav-link" data-widget="fullscreen" href="#" role="button">
				<i class="fa fa-expand-arrows-alt"></i>
			</a>
		</li> --}}
	</ul>

	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<!-- Navbar Search -->
		{{-- <li class="nav-item">
			<a class="nav-link" data-widget="navbar-search" href="#" role="button">
				<i class="fa fa-search"></i>
			</a>
			<div class="navbar-search-block">
				<form class="form-inline">
					<div class="input-group input-group-sm">
						<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-navbar" type="submit">
								<i class="fa fa-search"></i>
							</button>
							<button class="btn btn-navbar btn-sm p-1" type="button" data-widget="navbar-search">
								<i class="fa fa-times"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
		</li> --}}

		{{-- <!-- Messages Dropdown Menu -->
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="far fa-comments"></i>
				<span class="badge badge-danger navbar-badge">3</span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<a href="#" class="dropdown-item">
					<!-- Message Start -->
					<div class="media">
						<img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
						<div class="media-body">
							<h3 class="dropdown-item-title">
								Brad Diesel
								<span class="float-right text-sm text-danger"><i class="fa fa-star"></i></span>
							</h3>
							<p class="text-sm">Call me whenever you can...</p>
							<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
						</div>
					</div>
					<!-- Message End -->
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<!-- Message Start -->
					<div class="media">
						<img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
						<div class="media-body">
							<h3 class="dropdown-item-title">
								John Pierce
								<span class="float-right text-sm text-muted"><i class="fa fa-star"></i></span>
							</h3>
							<p class="text-sm">I got your message bro</p>
							<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
						</div>
					</div>
					<!-- Message End -->
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<!-- Message Start -->
					<div class="media">
						<img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
						<div class="media-body">
							<h3 class="dropdown-item-title">
								Nora Silvester
								<span class="float-right text-sm text-warning"><i class="fa fa-star"></i></span>
							</h3>
							<p class="text-sm">The subject goes here</p>
							<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
						</div>
					</div>
					<!-- Message End -->
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
			</div>
		</li>
		<!-- Notifications Dropdown Menu -->
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				<i class="far fa-bell"></i>
				<span class="badge badge-warning navbar-badge">15</span>
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
				<span class="dropdown-item dropdown-header">15 Notifications</span>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fa fa-envelope mr-2"></i> 4 new messages
					<span class="float-right text-muted text-sm">3 mins</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fa fa-users mr-2"></i> 8 friend requests
					<span class="float-right text-muted text-sm">12 hours</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item">
					<i class="fa fa-file mr-2"></i> 3 new reports
					<span class="float-right text-muted text-sm">2 days</span>
				</a>
				<div class="dropdown-divider"></div>
				<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
			</div>
		</li> --}}
		<li class="nav-item">
			<a class="nav-link p-1" data-widget="fullscreen" href="#" role="button">
				<i class="fa fa-expand-arrows-alt"></i>
			</a>
		</li>
		{{-- <li class="nav-item">
			<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
				<i class="fa fa-th-large"></i>
			</a>
		</li> --}}
	</ul>
</nav>