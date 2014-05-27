<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">

@if (Auth::check())

<!-- Sidebar toggle button-->
<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
	<span class="sr-only">Toggle navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
</a>

<div class="navbar-right">
<ul class="nav navbar-nav">

<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<i class="fa fa-warning"></i>
		<span class="label label-warning">{{ count($errors->all()) || '' }}</span>
	</a>
	<ul class="dropdown-menu">
		<li class="header">You have {{ count($errors->all()) }} notifications</li>
		<li>
			<!-- inner menu: contains the actual data -->
			<ul class="menu">
                @foreach($errors->all() as $error)
				<li>
					<a href="#">
						<i class="fa fa-warning danger"></i> {{ $error }}
					</a>
				</li>
				@endforeach
			</ul>
		</li>
		<li class="footer"><a href="#">View all</a></li>
	</ul>
</li>

<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<i class="glyphicon glyphicon-user"></i>
		<span>{{ Auth::user()->name }}  <i class="caret"></i></span>
	</a>
	<ul class="dropdown-menu">
		<!-- User image -->
		<li class="user-header bg-light-blue">
			<img src="{{ Auth::user()->profile_image }}" class="img-circle" alt="User Image"/>

			<p>
				{{ Auth::user()->name }}
			</p>
		</li>
		<!-- Menu Body -->
<!--		<li class="user-body">
			<div class="col-xs-4 text-center">
				<a href="#">Followers</a>
			</div>
			<div class="col-xs-4 text-center">
				<a href="#">Sales</a>
			</div>
			<div class="col-xs-4 text-center">
				<a href="#">Friends</a>
			</div>
		</li>-->
		<!-- Menu Footer-->
		<li class="user-footer">
			<!--<div class="pull-left">
				<a href="#" class="btn btn-default btn-flat">Profile</a>
			</div>-->
			<div class="pull-right">
				<a href="{{ URL::to('logout') }}" class="btn btn-default btn-flat">Sign out</a>
			</div>
		</li>
	</ul>
</li>
@endif
</ul>
</div>
</nav>