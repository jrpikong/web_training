<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="{{asset('images/avatar.png')}}" width="38" height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i> &nbsp;Admin
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                @if(Auth::user()->id == 10)
                    <li class="nav-item">
                        <a href="{{ route('home') }}" class="nav-link">
                            <i class="icon-home4"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('sales') }}" class="nav-link">
                            <i class="icon-git-branch"></i>
                            <span>Sales Report</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('list_quiz') }}" class="nav-link">
                            <i class="icon-traffic-lights"></i>
                            <span>All Quiz</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin_members') }}" class="nav-link">
                            <i class="icon-traffic-lights"></i>
                            <span>Member Report</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin_sliders') }}" class="nav-link">
                            <i class="icon-traffic-lights"></i>
                            <span>Sliders</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin_faq') }}" class="nav-link">
                            <i class="icon-address-book"></i>
                            <span>Faq</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('pages') }}" class="nav-link">
                            <i class="icon-add-to-list"></i>
                            <span>Pages</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('list_product') }}" class="nav-link">
                            <i class="icon-package"></i>
                            <span>Products</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('profile') }}" class="nav-link">
                            <i class="icon-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('log_transactions') }}" class="nav-link">
                            <i class="icon-coin-dollar"></i>
                            <span>Log Transaction</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('trainings') }}" class="nav-link">
                            <i class="icon-stack"></i>
                            <span>Training</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('report_training') }}" class="nav-link">
                            <i class="icon-quill4"></i>
                            <span>Report Training</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-switch2"></i> Logout
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </a>
                    </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="icon-home4"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('start_quiz') }}" class="nav-link">
                        <i class="icon-lab"></i>
                        <span>Personality Test</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('trainings') }}" class="nav-link">
                        <i class="icon-stack"></i>
                        <span>Training</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('history_training') }}" class="nav-link">
                        <i class="icon-accessibility"></i>
                        <span>History Training</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('ssa_agreement') }}" class="nav-link">
                        <i class="icon-lab"></i>
                        <span>SSA Agreement</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('transactions') }}" class="nav-link">
                        <i class="icon-git-branch"></i>
                        <span>Transactions</span>
                    </a>
                </li>
                @endif
                <!-- /main -->

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>