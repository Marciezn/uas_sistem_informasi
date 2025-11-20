@php
    use Illuminate\Support\Facades\Auth;
@endphp

@if(Auth::check())
    @php $role = strtolower(Auth::user()->role); @endphp

    @if ($role === 'admin')
        <x-sidebar-admin />
    @elseif ($role === 'user')
        <x-sidebar-user />
    @else
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link text-center">
                <span class="brand-text font-weight-light">Sistem Informasi Persuratan</span>
            </a>
        </aside>
    @endif
@endif
