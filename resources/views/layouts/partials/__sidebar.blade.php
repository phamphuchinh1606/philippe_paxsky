<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="nav-icon icon-home"></i> Trang chủ
                </a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-grid"></i>Buildings
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::is('*building*')) active @endif" href="{{route('building.index')}}">
                            <i class="nav-icon icon-layers"></i>
                            List Building
                        </a>
                        <a class="nav-link @if(\Request::is('*investor*')) active @endif" href="{{route('investor.index')}}">
                            <i class="nav-icon icon-disc"></i>
                            Investors
                        </a>
                        <a class="nav-link @if(\Request::is('*classify*')) active @endif" href="{{route('classify.index')}}">
                            <i class="nav-icon icon-social-spotify"></i>
                            Classifications
                        </a>
                        <a class="nav-link @if(\Request::is('*management-agency*')) active @endif" href="{{route('management_agency.index')}}">
                            <i class="nav-icon icon-support"></i>
                            Management Agency
                        </a>
                        <a class="nav-link @if(\Request::is('*direction*')) active @endif" href="{{route('direction.index')}}">
                            <i class="nav-icon icon-direction"></i>
                            Directions
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-list"></i>Offices
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::is('*office/*')) active @endif" href="{{route('office.index')}}">
                            <i class="nav-icon icon-printer"></i>
                            Offices
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::is('*office-layout*')) active @endif" href="{{route('office_layout.index')}}">
                            <i class="nav-icon icon-chart"></i>
                            Office Layouts
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="nav-icon icon-people"></i>User & Customer
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::is('*user/*')) active @endif" href="{{route('user.index')}}">
                            <i class="nav-icon icon-user"></i>
                            User List
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::is('*customer*')) active @endif" href="{{route('customer.index')}}">
                            <i class="nav-icon icon-user-follow"></i>
                            Customer List
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle font-weight-bold" href="#">
                    APP
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link @if(\Request::is('*user/*')) active @endif" href="{{route('appointment.index')}}">
                            <i class="nav-icon icon-calendar"></i>
                            Visits
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 708px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 422px;"></div>
        </div>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
