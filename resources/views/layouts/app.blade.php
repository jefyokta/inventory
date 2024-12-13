<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="max-w-screen overflow-x-hidden">
    <div class="min-h-screen px-5">
        <div>
            <div class="navbar z-50 w-full  bg-base-100 bg-opacity-70 backdrop-blur-md shadow-lg rounded-3xl">
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
                <div class="navbar-end">
                    <div class="dropdown dropdown-end">
                        <button class="btn btn-ghost btn-circle shadow">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                        <ul class="menu dropdown-content bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                            <li><x-link :href="'/dashboard'">Item 1</x-link></li>
                            <li><x-link :href="'/s'" wire:navigate>Item 2</x-link></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex  space-x-3 mt-10">
                <aside class="w-64   bg-base-100 max-h-max rounded-box shadow-xl text-base-content p-4">
                    <ul class="menu space-y-2">
                        <li class="font-bold text-lg mb-4">Menu</li>
                        <x-nav-link href="/dashboard" :active="request()->routeIs('dashboard')">Dashboard</x-nav-link>
                        <x-nav-link href="#">Permintaan</x-nav-link>
                        <li>
                            <details open>
                                <summary>Stok barang</summary>
                                <ul>
                                    <x-nav-link href="#">
                                        Tambah barang
                                    </x-nav-link>
                                </ul>
                            </details>
                        </li>
                        <x-nav-link href="#">Perakitan</x-nav-link>
                        <li>
                            <details open>
                                <summary>Laporan</summary>
                                <ul>
                                    <li><a href="#">Peminjaman</a></li>
                                    <li><a href="#">Keseluruhan</a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                </ul>
                            </details>
                        </li>
                        <x-nav-link href="#">Surat pengeluaran</x-nav-link>
                        <x-nav-link href="#">Barang diterima</x-nav-link>
                        <x-nav-link href="#">Logout</x-nav-link>



                    </ul>
                </aside>
                <main class="bg-base-100  p-10 w-full min-h-screen shadow-xl  rounded-3xl">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>

</body>

</html>
