<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="max-w-screen bg-neutral-content overflow-x-hidden">
    <div class="min-h-screen px-5">
        <div>
            <div style="z-index: 1999999"
                class="navbar w-full  bg-base-100 bg-opacity-50 backdrop-blur shadow-lg rounded-3xl">
                <div class="navbar-start">
                    <div class="md:invisible">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="navbar-center">
                    <h1 class="font-semibold text-xl">PT.Berjaya Abadi Selalu</h1>
                </div>
                <div class="navbar-end space-x-3 ">
                    <div class="flex flex-col">
                        <span class="">{{ auth()->user()->name }}</span>
                        <span class="text-xs">{{ auth()->user()->role }}</span>
                    </div>
                    @if (auth()->user()->role === 'petugas')
                        <x-link class="btn btn-ghost btn-circle shadow" :href="route('notification')">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="size-6">
                                <path fill-rule="evenodd"
                                    d="M5.25 9a6.75 6.75 0 0 1 13.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 0 1-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 1 1-7.48 0 24.585 24.585 0 0 1-4.831-1.244.75.75 0 0 1-.298-1.205A8.217 8.217 0 0 0 5.25 9.75V9Zm4.502 8.9a2.25 2.25 0 1 0 4.496 0 25.057 25.057 0 0 1-4.496 0Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </x-link>
                    @endif
                    <div class="dropdown dropdown-end">
                        <button class="btn btn-ghost btn-circle shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                        <ul class="menu dropdown-content bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                            <li><x-link :href="'/profile'">Profile</x-link></li>
                            <x-logout-button />
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex  my-10">
                <aside class="w-96 bg-base-100 max-h-max rounded-box shadow-xl text-base-content p-4">
                    <ul class="menu space-y-2">
                        <li class="font-bold text-lg text-primary mb-4">Menu</li>

                        <!-- Link Dashboard -->
                        <x-nav-link href="/dashboard" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>

                        @php
                            $role = auth()->user()->role;
                        @endphp

                        <!-- Role: Petugas -->
                        @if ($role === 'petugas')
                            {{-- <x-nav-link href="{{ route('permintaan.index') }}" :active="request()->routeIs('permintaan.*')">Permintaan</x-nav-link> --}}
                            <li>
                                <details open>
                                    <summary>Data barang</summary>
                                    <ul class="space-y-2 py-2">
                                        <x-nav-link href="{{ route('barang.index') }}" :active="request()->routeIs('barang.index')">
                                            Barang di kantor</x-nav-link>
                                        <x-nav-link href="{{ route('dipinjam') }}" :active="request()->routeIs('dipinjam')">
                                            Barang dipinjam</x-nav-link>
                                    </ul>
                                </details>
                            </li>
                        @endif
                        @if ($role !== 'karyawan')
                        <x-nav-link href="{{ route('permintaan.index') }}" :active="request()->routeIs('permintaan.*')">Permintaan</x-nav-link>
                        @endif

                        <!-- Role: Petugas atau Karyawan -->
                        @if (in_array($role, ['petugas']))
                            <x-nav-link href="{{ route('perakitan') }}" :active="request()->routeIs('perakitan')">Perakitan</x-nav-link>
                        @endif

                        <!-- Role-Based Laporan -->
                        <li>
                            <details open>
                                <summary>Laporan</summary>
                                <ul class="space-y-2 py-2">
                                    @switch($role)
                                        @case('gudang')
                                            <x-nav-link href="{{ route('barang-keluar') }}" :active="request()->routeIs('barang-keluar')">Barang
                                                Keluar</x-nav-link>
                                        @break

                                        @case('karyawan')
                                            <x-nav-link href="{{ route('barang-rakit') }}" :active="request()->routeIs('barang-rakit')">Barang
                                                Rakit</x-nav-link>
                                            <x-nav-link href="{{ route('laporan-barang') }}" :active="request()->routeIs('laporan-barang')">Laporan
                                                Barang</x-nav-link>
                                        @break

                                        @case('petugas')
                                            <x-nav-link href="{{ route('peminjaman') }}"
                                                :active="request()->routeIs('peminjaman')">Peminjaman</x-nav-link>
                                            <x-nav-link href="{{ route('keseluruhan') }}"
                                                :active="request()->routeIs('keseluruhan')">Permintaan</x-nav-link>
                                        @break

                                        @default
                                    @endswitch
                                </ul>
                            </details>
                        </li>


                        @if ($role === 'karyawan')
                            <x-nav-link href="{{ route('permintaan.index') }}" :active="request()->routeIs('permintaan.*')">Barang
                                Diterima</x-nav-link>
                        @endif

                        @if ($role === 'petugas')
                            <x-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">Register</x-nav-link>
                        @endif

                        <!-- Logout -->
                        <x-logout-button />
                    </ul>
                </aside>

                <main class="py-5 w-full max-h-[95vh]  -mt-20   overflow-y-auto">
                    <div class=" mt-6 p-8 pt-5  w-full ">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>
    </div>
    <livewire:components.logout />


</body>

</html>
