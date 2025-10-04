<aside id="sidebar" class="sidebar d-flex flex-column" role="navigation" aria-label="Sidebar">
    <!-- Sidebar Toggle Button -->
    <div class="toggle-btn px-3 py-2" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </div>

    <!-- Sidebar Navigation -->
    <div class="sidebar-nav-wrapper flex-grow-1 overflow-auto">
        <nav class="nav flex-column text-start px-2">
            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
               title="{{ __('messages.dashboard') }}">
                <i class="fas fa-chart-line me-2"></i>
                <span>{{ __('messages.dashboard') }}</span>
            </a>

            <a href="{{ route('admin.clients.index') }}" class="nav-link" title="{{ __('messages.clients') }}">
                <i class="fas fa-users me-2"></i>
                <span>{{ __('messages.clients') }}</span>
            </a>

            <a href="{{ route('admin.invoices.index') }}" class="nav-link" title="{{ __('messages.invoices') }}">
                <i class="fas fa-file-invoice me-2"></i>
                <span>{{ __('messages.invoices') }}</span>
            </a>

            <a href="#" class="nav-link" title="{{ __('messages.inventory') }}">
                <i class="fas fa-boxes me-2"></i>
                <span>{{ __('messages.inventory') }}</span>
            </a>
        </nav>
    </div>

    <!-- Sidebar Bottom -->
    <div class="nav-bottom px-3 py-3 border-top">
        <a href="#" class="nav-link text-danger" title="{{ __('messages.logout') }}">
            <i class="fas fa-sign-out-alt me-2"></i>
            <span>{{ __('messages.logout') }}</span>
        </a>
    </div>
</aside>
