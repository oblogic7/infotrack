<!-- Left side column. contains the logo and sidebar -->
<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        @if(Auth::check())
        <!-- Sidebar user panel -->
        <!--		<div class="user-panel">-->
        <!--			<div class="pull-left image">-->
        <!--				<img src="/assets/img/avatar3.png" class="img-circle" alt="User Image"/>-->
        <!--			</div>-->
        <!--			<div class="pull-left info">-->
        <!--				<p>Hello, Jane</p>-->
        <!--				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        <!--			</div>-->
        <!--		</div>-->
        <!-- search form -->
<!--        <form action="#" method="get" class="sidebar-form">-->
<!--            <div class="input-group">-->
<!--                <input type="text" name="q" class="form-control" placeholder="Search..."/>-->
<!--                    <span class="input-group-btn">-->
<!--                        <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>-->
<!--                    </span>-->
<!--            </div>-->
<!--        </form>-->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <!--			<li class="active">
                            <a href="/assets/index.html">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>-->
            <li>
                <a href="{{ URL::route('clients.index') }}">
                    <i class="fa fa-users"></i> Clients
                </a>
            </li>

            <li>
                <a href="{{ URL::route('credentials.index') }}">
                    <i class="fa fa-lock"></i> Company Accounts
                </a>
            </li>
<!--            <li class="treeview">-->
<!--                <a href="#">-->
<!--                    <i class="fa fa-desktop"></i>-->
<!--                    <span>Assets</span>-->
<!--                    <i class="fa fa-angle-left pull-right"></i>-->
<!--                </a>-->
<!--                <ul class="treeview-menu">-->
<!--                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Computers</a></li>-->
<!--                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Software Licenses</a></li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li class="treeview">-->
<!--                <a href="#">-->
<!--                    <i class="fa fa-lock"></i>-->
<!--                    <span>Authentication</span>-->
<!--                    <i class="fa fa-angle-left pull-right"></i>-->
<!--                </a>-->
<!--                <ul class="treeview-menu">-->
<!--                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Client Credentials</a></li>-->
<!--                    <li><a href="#"><i class="fa fa-angle-double-right"></i> YA Accounts</a></li>-->
<!--                </ul>-->
<!--            </li>-->

            @if(Access::userAuthorized(['Super Admin']))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>User Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ URL::route('users.index') }}"><i class="fa fa-user"></i> Users</a></li>
                    <li><a href="#"><i class="fa fa-puzzle-piece"></i> Roles</a></li>
                </ul>
            </li>
            @endif
            <!--<li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>UI Elements</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="UI/general.html"><i class="fa fa-angle-double-right"></i> General</a></li>
                    <li><a href="UI/icons.html"><i class="fa fa-angle-double-right"></i> Icons</a></li>
                    <li><a href="UI/buttons.html"><i class="fa fa-angle-double-right"></i> Buttons</a></li>
                    <li><a href="UI/sliders.html"><i class="fa fa-angle-double-right"></i> Sliders</a></li>
                    <li><a href="UI/timeline.html"><i class="fa fa-angle-double-right"></i> Timeline</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Forms</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="forms/general.html"><i class="fa fa-angle-double-right"></i> General Elements</a></li>
                    <li><a href="forms/advanced.html"><i class="fa fa-angle-double-right"></i> Advanced Elements</a></li>
                    <li><a href="forms/editors.html"><i class="fa fa-angle-double-right"></i> Editors</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Tables</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="tables/simple.html"><i class="fa fa-angle-double-right"></i> Simple tables</a></li>
                    <li><a href="tables/data.html"><i class="fa fa-angle-double-right"></i> Data tables</a></li>
                </ul>
            </li>
            <li>
                <a href="calendar.html">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <small class="badge pull-right bg-red">3</small>
                </a>
            </li>
            <li>
                <a href="mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <small class="badge pull-right bg-yellow">12</small>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Examples</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="examples/invoice.html"><i class="fa fa-angle-double-right"></i> Invoice</a></li>
                    <li><a href="examples/login.html"><i class="fa fa-angle-double-right"></i> Login</a></li>
                    <li><a href="examples/register.html"><i class="fa fa-angle-double-right"></i> Register</a></li>
                    <li><a href="examples/lockscreen.html"><i class="fa fa-angle-double-right"></i> Lockscreen</a></li>
                    <li><a href="examples/404.html"><i class="fa fa-angle-double-right"></i> 404 Error</a></li>
                    <li><a href="examples/500.html"><i class="fa fa-angle-double-right"></i> 500 Error</a></li>
                    <li><a href="examples/blank.html"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> Multilevel Menu
                    <i class="fa fa-angle-left pull-right"></i>
                </a>

                <ul class="treeview-menu">
                    <li class="treeview">
                        <a href="#">
                            First level
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>

                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#">
                                    Second level
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>

                                <ul class="treeview-menu">
                                    <li>
                                        <a href="#">Third level</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>-->
        </ul>
        @endif
    </section>
    <!-- /.sidebar -->
</aside>
