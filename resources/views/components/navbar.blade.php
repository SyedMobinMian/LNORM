<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm px-3 py-2">
    <div class="container-fluid">
        <!-- Brand Logo -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/img/mw.jpg') }}" width="45" height="35" alt="Logo" class="me-2 rounded">
            <span class="fw-bold">Maven Woods</span>
        </a>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse justify-content-end" id="topNavbarContent">
            <ul class="nav flex-column nav-bottom d-none"></ul> <!-- Reserved for mobile optional use -->

            <ul class="navbar-nav align-items-center">
                <!-- Theme Toggle -->
                <li class="nav-item me-2">
                    {{-- <button id="themeToggle" class="btn btn-light" title="Toggle Light/Dark">
                        <i class="fas fa-sun"></i>
                    </button> --}}
                    <!-- In navbar -->
                    <button id="themeToggle" class="btn">
                    <i class="fas fa-sun"></i>
                    </button>
                </li>

                <!-- RTL Toggle -->
                <li class="nav-item me-2">
                    <button id="rtlToggle" class="btn btn-light" title="Toggle RTL">
                        <i class="bi bi-layout-text-sidebar-reverse"></i>
                    </button>
                </li>

                <!-- Searchbar -->
                <li class="nav-item me-3 d-none d-md-block">
                    <form class="d-flex">
                        <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
                    </form>
                </li>

                <!-- Language Dropdown -->
                {{-- <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/earth.gif') }}" alt="Earth" class="me-1 rotate-animation" style="width: 30px; height: 30px;"> English
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('lang.switch', 'en') }}">
                                <img src="{{ asset('assets/img/flags/gb.png') }}" alt="EN" class="me-2" width="20"> English
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('lang.switch', 'ar') }}">
                                <img src="{{ asset('assets/img/flags/sa.png') }}" alt="AR" class="me-2" width="20"> العربية
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('lang.switch', 'de') }}">
                                <img src="{{ asset('assets/img/flags/de.png') }}" alt="DE" class="me-2" width="20"> Deutsch
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item text-primary" href="#">Create Language</a></li>
                        <li><a class="dropdown-item text-primary" href="#">Manage Language</a></li>
                    </ul>
                </li> --}}
@php
    $supportedLocales = [
        'en' => ['name' => 'English', 'flag' => 'gb.png'],
        'ar' => ['name' => 'العربية', 'flag' => 'sa.png'],
        'de' => ['name' => 'Deutsch', 'flag' => 'de.png'],
        'fr' => ['name' => 'Français', 'flag' => 'fr.png'],
        'hi' => ['name' => 'हिन्दी', 'flag' => 'in.png'],
        'ur' => ['name' => 'اُردُو', 'flag' => 'pk.png'],
        'tr' => ['name' => 'Türkçe', 'flag' => 'tr.png'],
        'zh' => ['name' => '中文', 'flag' => 'cn.png'],
        'fa' => ['name' => 'دری', 'flag' => 'af.png'], 
    ];

    $currentLang = session('locale', config('app.locale'));
@endphp

<li class="nav-item dropdown me-3">
    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
        <img src="{{ asset('assets/img/flags/' . ($supportedLocales[$currentLang]['flag'] ?? 'gb.png')) }}"
             alt="{{ $currentLang }}" class="me-1" style="width: 25px; height: 25px;">
        {{ $supportedLocales[$currentLang]['name'] ?? 'Language' }}
    </a>

    <ul class="dropdown-menu dropdown-menu-end">
        @foreach ($supportedLocales as $code => $locale)
            <li>
                <a class="dropdown-item {{ $currentLang === $code ? 'text-primary fw-semibold' : '' }}"
                   href="{{ route('lang.switch', $code) }}">
                    <img src="{{ asset('assets/img/flags/' . $locale['flag']) }}" alt="{{ $code }}" class="me-2" width="20">
                    {{ $locale['name'] }}
                </a>
            </li>
        @endforeach

        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item text-primary" href="#">Create Language</a></li>
        <li><a class="dropdown-item text-primary" href="#">Manage Language</a></li>
    </ul>
</li>

                <!-- Notifications -->
                <li class="nav-item dropdown me-3 position-relative">
                    <button class="btn btn-light position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell fs-5"></i>
                        <span class="position-absolute top-50 start-100 translate-middle badge rounded-pill bg-danger">3</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end p-2" style="width: 250px;">
                        <li class="small text-muted">🔔 You have 3 new notifications</li>
                        <li><hr class="dropdown-divider"></li>
                        <li class="small">✔ Your report is ready</li>
                        <li class="small">💬 New comment on your post</li>
                        <li class="small">📦 Inventory updated</li>
                    </ul>
                </li>

                <!-- User Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/Profile.jpeg') }}" width="30" height="30" class="rounded-circle me-2" alt="Admin">
                        Admin
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">👤 Profile</a></li>
                        <li><a class="dropdown-item" href="#">⚙ Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        {{-- <li><a class="dropdown-item text-danger" href="{{ route('logout') }}">🚪 Logout</a></li> --}}
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
