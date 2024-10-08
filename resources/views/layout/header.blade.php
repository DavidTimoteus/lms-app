<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="index.html">
                    <h4 style="font-family: 'Inter', sans-serif; font-weight: bold; line-height: 1.2; color: #5a73a6;">
                        Learning<br>Management System
                    </h4>
                </a>
            </div>
            <div class="theme-toggle d-flex gap-2  align-items-center mt-2" bis_skin_checked="1">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                    role="img" class="iconify iconify--system-uicons" width="20" height="20"
                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                    <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2"
                            opacity=".3"></path>
                        <g transform="translate(-210 -1)">
                            <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                            <circle cx="220.5" cy="11.5" r="4"></circle>
                            <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                        </g>
                    </g>
                </svg>
                <div class="form-check form-switch fs-6" bis_skin_checked="1">
                    <input class="form-check-input  me-0" type="checkbox" id="toggle-dark" style="cursor: pointer">
                    <label class="form-check-label"></label>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true"
                    role="img" class="iconify iconify--mdi" width="20" height="20"
                    preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                    </path>
                </svg>
            </div>
            <div class="header-top-right">

                <div class="dropdown">
                    <a href="#" id="topbarUserDropdown"
                        class="user-dropdown d-flex align-items-center dropend dropdown-toggle "
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="text">
                            <h6 class="user-dropdown-name">{{ Auth::user() ? Auth::user()->name : 'Guest' }}</h6>
                            <p class="user-dropdown-status text-sm text-muted">
                                {{ Auth::check() && Auth::user()->level ? Auth::user()->level->level_name : 'Not Logged In' }}
                            </p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                        @if (Auth::check())
                            <li><a class="dropdown-item" href="#">My Account</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ url('login') }}">Login</a></li>
                        @endif
                    </ul>
                </div>
                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <ul>
                @if (Auth::check() && Auth::user()->level && Auth::user()->level->level_code === 'ADM')
                    <li class="menu-item {{ $activeMenu == 'level' ? 'active' : '' }}">
                        <a href="{{ url('/level') }}" class="menu-link"
                            style="{{ $activeMenu == 'level' ? '' : 'color: #8e9ed8' }}">
                            <span class="align-content-center"><i class="bi bi-stack me-2"></i>Data Level</span>
                        </a>
                    </li>
                    <li class="menu-item {{ $activeMenu == 'category' ? 'active' : '' }}">
                        <a href="{{ url('/category') }}" class="menu-link"
                            style="{{ $activeMenu == 'category' ? '' : 'color: #8e9ed8' }}">
                            <span class="align-content-center"><i class="bi bi-tags-fill me-2"></i>Data Kategori</span>
                        </a>
                    </li>
                    <li class="menu-item {{ $activeMenu == 'user' ? 'active' : '' }}">
                        <a href="{{ url('/user') }}" class="menu-link"
                            style="{{ $activeMenu == 'user' ? '' : 'color: #8e9ed8' }}">
                            <span class="align-content-center">
                                <i class="bi bi-people-fill me-2"></i>Data Pengguna
                            </span>
                        </a>
                    </li>
                @elseif (Auth::check() && Auth::user()->level && Auth::user()->level->level_code === 'MHS')
                    <li class="menu-item {{ $activeMenu == 'home' ? 'active' : '' }}">
                        <a href="{{ url('/') }}" class="menu-link"
                            style="{{ $activeMenu == 'home' ? '' : 'color: #8e9ed8' }}">
                            <span class=""><i class="bi bi-house-door-fill me-2"></i>Home</span>
                        </a>
                    </li>
                    <li class="menu-item {{ $activeMenu == 'userDB' ? 'active' : '' }}">
                        <a href="{{ url('/userDB') }}" class="menu-link"
                            style="{{ $activeMenu == 'userDB' ? '' : 'color: #8e9ed8' }}">
                            <span class="align-content-center">
                                <i class="bi bi-grid-1x2-fill me-2"></i>
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li class="menu-item {{ $activeMenu == 'mycourse' ? 'active' : '' }}">
                        <a href="{{ url('/mycourse') }}" class="menu-link"
                            style="{{ $activeMenu == 'mycourse' ? '' : 'color: #8e9ed8' }}">
                            <span class="align-content-center">
                                <i class="bi bi-mortarboard-fill me-2"></i>
                                My Course
                            </span>
                        </a>
                    </li>
                @elseif (Auth::check() && Auth::user()->level && Auth::user()->level->level_code === 'PGJ')
                    <li class="menu-item {{ $activeMenu == 'dashboard' ? 'active' : '' }}">
                        <a href="{{ url('/dashboard') }}" class="menu-link"
                            style="{{ $activeMenu == 'dashboard' ? '' : 'color: #8e9ed8' }}">
                            <span class="align-content-center">
                                <i class="bi bi-grid-1x2-fill me-2"></i>
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li class="menu-item {{ $activeMenu == 'courses' ? 'active' : '' }}">
                        <a href="{{ url('/courses') }}" class="menu-link"
                            style="{{ $activeMenu == 'courses' ? '' : 'color: #8e9ed8' }}">
                            <span class="align-content-center">
                                <i class="bi bi-mortarboard-fill me-2"></i>
                                List Course
                            </span>
                        </a>
                    </li>
                    <li class="menu-item {{ $activeMenu == 'lesson' ? 'active' : '' }}">
                        <a href="{{ url('/lesson') }}" class="menu-link"
                            style="{{ $activeMenu == 'lesson' ? '' : 'color: #8e9ed8' }}">
                            <span class="align-content-center">
                                <i class="bi bi-journal-bookmark-fill me-2"></i>
                                Lesson
                            </span>
                        </a>
                    </li>
                @else
                    <li class="menu-item {{ $activeMenu == 'home' ? 'active' : '' }}">
                        <a href="#Home" class="menu-link"
                            style="{{ $activeMenu == 'home' ? '' : 'color: #8e9ed8' }}">
                            <span class=""><i class="bi bi-house-door-fill me-2"></i>Home</span>
                        </a>
                    </li>
                    <li class="menu-item {{ $activeMenu == 'contact' ? 'active' : '' }}">
                        <a href="#ContactUs" class="menu-link"
                            style="{{ $activeMenu == 'contact' ? '' : 'color: #8e9ed8' }}">
                            <span><i class="bi bi-telephone-fill me-2"></i>Contact Us</span>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

</header>
