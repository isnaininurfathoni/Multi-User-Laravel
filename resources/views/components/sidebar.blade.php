<div class="sidebar bg-dark text-white p-3">
    <h2 class="sidebar-header mb-4">Fastlink</h2>
    <div class="d-flex flex-column align-items-start">
        @if (Auth::user()->role == 'superuser')
            <a href="{{ url('/role-management') }}" class="nav-link"><i class="bi bi-house-door-fill"></i> Dashboard</a>
            <a href="{{ url('/customer') }}" class="nav-link"><i class="bi bi-person-lines-fill"></i> Customer</a>
            <a href="{{ url('/finance') }}" class="nav-link"><i class="bi bi-credit-card-fill"></i> Finance</a>
        @elseif (Auth::user()->role == 'administrator')
            <a href="{{ url('/dashboard') }}" class="nav-link"><i class="bi bi-house-door-fill"></i> Dashboard</a>
            <a href="{{ url('/customer') }}" class="nav-link"><i class="bi bi-person-lines-fill"></i> Customer</a>
        @elseif (Auth::user()->role == 'teknisi')
            <a href="{{ url('/maps') }}" class="nav-link"><i class="bi bi-geo-alt-fill"></i> Maps</a>
            <a href="{{ url('/help') }}" class="nav-link"><i class="bi bi-question-circle-fill"></i> Help</a>
        @endif
    </div>
</div>
