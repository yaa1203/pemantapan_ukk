<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Toko Indonesia') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,600,800" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif

    <style>
        body { font-family: 'Instrument Sans', sans-serif; }

        .mesh-gradient {
            background-color: #2563eb;
            background-image:
                radial-gradient(at 0% 0%, #1e3a8a 0, transparent 50%),
                radial-gradient(at 50% 0%, #1d4ed8 0, transparent 50%),
                radial-gradient(at 100% 0%, #3b82f6 0, transparent 50%);
        }

        .glass {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 10px;
            color: rgba(255, 255, 255, 0.7);
            font-size: 14px;
            font-weight: 600;
            transition: all 0.15s;
            text-decoration: none;
        }

        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
        }

        .sidebar-link.active {
            background: rgba(255, 255, 255, 0.18);
            color: #fff;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
        }

        .sidebar-link svg {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
            opacity: 0.9;
        }

        .nav-badge {
            margin-left: auto;
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-size: 10px;
            padding: 2px 7px;
            border-radius: 99px;
            font-weight: 800;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 antialiased">

<div class="flex h-screen overflow-hidden">

    {{-- ===== SIDEBAR ===== --}}
    <aside class="mesh-gradient w-[230px] min-w-[230px] flex flex-col py-6 px-4 relative overflow-hidden">

        {{-- Decorative glow --}}
        <div class="absolute bottom-[-10%] left-[-10%] w-52 h-52 bg-blue-400 rounded-full blur-3xl opacity-20 pointer-events-none"></div>

        {{-- Logo --}}
        <div class="flex items-center gap-3 mb-8 px-1">
            <div class="w-9 h-9 rounded-xl flex items-center justify-center font-extrabold text-sm text-white"
                 style="background:rgba(255,255,255,0.2);border:1px solid rgba(255,255,255,0.25);">
                TI
            </div>
            <div>
                <div class="text-white font-extrabold text-[15px] leading-tight">Toko Indonesia</div>
                <div class="text-[10px] font-bold tracking-widest uppercase"
                     style="color:rgba(255,255,255,0.45);">Enterprise</div>
            </div>
        </div>

        {{-- Role label --}}
        @php $role = auth()->user()->role; @endphp
        <div class="text-[10px] font-extrabold tracking-widest uppercase px-1 mb-2"
             style="color:rgba(255,255,255,0.4);">
            {{ ucfirst($role) }} Panel
        </div>

        {{-- Navigation --}}
        <nav class="flex flex-col gap-0.5 flex-1">

            @if ($role == 'admin')
                <a href="{{ url('/admin') }}"
                   class="sidebar-link {{ request()->is('admin') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>

                <a href="{{ url('/supplier') }}"
                   class="sidebar-link {{ request()->is('supplier*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/></svg>
                    Supplier
                </a>

                <a href="{{ url('/gerai') }}"
                   class="sidebar-link {{ request()->is('gerai*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    Gerai
                </a>

                <a href="{{ url('/benda') }}"
                   class="sidebar-link {{ request()->is('benda*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    Data Barang
                </a>

                <a href="{{ url('/distribusis') }}"
                   class="sidebar-link {{ request()->is('distribusis*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                    Distribusi
                </a>

                <a href="{{ url('/laporan') }}"
                   class="sidebar-link {{ request()->is('laporan*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    Laporan
                </a>
            @endif

            @if ($role == 'gudang')
                <a href="{{ url('/gudang') }}"
                   class="sidebar-link {{ request()->is('gudang') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>

                <a href="{{ url('/barang') }}"
                   class="sidebar-link {{ request()->is('barang*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    Data Barang
                </a>

                <a href="{{ url('/suppliers') }}"
                   class="sidebar-link {{ request()->is('suppliers*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/></svg>
                    Supplier
                </a>

                <a href="{{ url('/distribusi') }}"
                   class="sidebar-link {{ request()->is('distribusi*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
                    Distribusi
                </a>
            @endif

            @if ($role == 'gerai')
                <a href="{{ url('/geraii') }}"
                   class="sidebar-link {{ request()->is('geraii') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                    Dashboard
                </a>

                <a href="{{ url('/transaksi') }}"
                   class="sidebar-link {{ request()->is('transaksi*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                    Transaksi
                </a>

                <a href="{{ url('/barangs') }}"
                   class="sidebar-link {{ request()->is('barangs*') ? 'active' : '' }}">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    Stok Barang
                </a>
            @endif

        </nav>

        {{-- User Section --}}
        <div class="mt-auto pt-4" style="border-top:1px solid rgba(255,255,255,0.1);">
            <div class="flex items-center gap-3 px-1">
                <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-white text-xs flex-shrink-0"
                     style="background:rgba(255,255,255,0.2);">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="text-white text-[13px] font-semibold truncate">{{ Auth::user()->name }}</div>
                    <div class="text-[11px] truncate" style="color:rgba(255,255,255,0.45);">{{ Auth::user()->email }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" title="Keluar"
                            style="color:rgba(255,255,255,0.45);"
                            class="hover:text-white transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

    </aside>

    {{-- ===== MAIN AREA ===== --}}
    <div class="flex flex-col flex-1 overflow-hidden">

        {{-- TOPBAR --}}
        <header class="bg-white border-b border-gray-100 h-[60px] flex items-center justify-between px-7 flex-shrink-0">

            {{-- Page Title / Breadcrumb --}}
            <div class="flex items-center gap-2">
                @isset($header)
                    {{ $header }}
                @endisset
            </div>

            {{-- Right side --}}
            <div class="flex items-center gap-3">
                {{-- Notification bell --}}
                <button class="w-9 h-9 bg-gray-100 rounded-xl flex items-center justify-center hover:bg-gray-200 transition">
                    <svg class="w-[17px] h-[17px] text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                    </svg>
                </button>

                {{-- Profile dropdown --}}
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-2 pl-2 pr-3 py-1.5 rounded-xl hover:bg-gray-100 transition">
                            <div class="w-7 h-7 bg-blue-600 rounded-full flex items-center justify-center text-white text-xs font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span class="text-sm font-semibold text-gray-700">{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </header>

        {{-- PAGE CONTENT --}}
        <main class="flex-1 overflow-y-auto p-7">
            {{ $slot }}
        </main>

    </div>

</div>

</body>
</html>