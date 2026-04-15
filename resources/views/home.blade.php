@extends('layout')

@section("content")
<div class="flex flex-row relative">
    <div class="bg-[#FEFFFE] px-8 py-4 flex flex-col gap-8" id="sidebar">
        <div class="flex flex-row">
            <x-bi-arrow-left class="h-8 w-8 block md:hidden cursor-pointer" id="close-sidebar" />
            <img src="{{asset('/logo.png')}}" alt="logo" class="w-32 h-32 m-auto">
        </div>
        <div class="h-[200px] w-[200px] rounded-[50%] bg-[#F3F3F3] flex justify-center items-center self-center">
            <x-far-user class="h-[120px]" fill="#434B6A" />
        </div>
        <p class="text-lg font-bold text-center">{{$user_info->name}}</p>
        <div class="flex flex-col w-full gap-4">
            <a class="flex flex-row items-center gap-4 p-2 {{ explode('.', Route::currentRouteName())[0] == 'dashboard' ? 'active-navbar' : '' }}" href="/">
                <x-antdesign-home-o class="h-8" fill="#434B6A" />
                <p class="text-xl text-[#434B6A]">Dashboard</p>
            </a>
            @can("admin")
            <a href="/category" class="flex flex-row items-center gap-4 p-2 {{ explode('.', Route::currentRouteName())[0] == 'category' ? 'active-navbar' : '' }}">
                <x-antdesign-tag-o class="h-8" fill="#434B6A" />
                <p class="text-xl text-[#434B6A]">Kategori</p>
            </a>
            @endcan
            <a href="/product" class="flex flex-row items-center gap-4 p-2 {{ explode('.', Route::currentRouteName())[0] == 'product' ? 'active-navbar' : '' }}">
                <x-bi-box class="h-8 w-8" fill="#434B6A" />
                <p class="text-xl text-[#434B6A]">Produk</p>
            </a>
            <div class="flex flex-col w-full gap-4 {{ explode('.', Route::currentRouteName())[0] == 'transaction' ? 'active-navbar' : '' }}">
                <div class="flex flex-row items-center gap-4 p-2 cursor-pointer" onclick="toggleTransactionMenu()">
                    <x-bi-bag class="h-8 w-8" fill="#434B6A" />
                    <p class="text-xl text-[#434B6A]">Transaksi</p>
                </div>
                <div id="transaction-menu" class="flex flex-col gap-4 pl-8 hidden">
                    <a href="/transaction/sales" class="flex flex-row items-center gap-4 p-2">
                        <x-bi-bag class="h-8 w-8" fill="#434B6A" />
                        <p class="text-xl text-[#434B6A]">Transaksi Penjualan</p>
                    </a>
                    <a href="/transaction/purchase" class="flex flex-row items-center gap-4 p-2">
                        <x-bi-bag class="h-8 w-8" fill="#434B6A" />
                        <p class="text-xl text-[#434B6A]">Transaksi Pembelian</p>
                    </a>
                </div>
            </div>
            @can("admin")
            <a href="/report" class="flex flex-row items-center gap-4 p-2 {{ explode('.', Route::currentRouteName())[0] == 'report' ? 'active-navbar' : '' }}">
                <x-antdesign-calendar-o class="h-8 w-8" fill="#434B6A" />
                <p class="text-xl text-[#434B6A]">Laporan</p>
            </a>
            <a href="/setting" class="flex flex-row items-center gap-4 p-2 {{ explode('.', Route::currentRouteName())[0] == 'setting' ? 'active-navbar' : '' }}">
                <x-bi-sliders class="h-8 w-8" fill="#434B6A" />
                <p class="text-xl text-[#434B6A]">Setting</p>
            </a>
            @endcan
        </div>
    </div>
    <div class="flex-1 bg-[#F3F3F3] pl-2 w-full min-h-[100vh]">
        <div class="h-[50px] bg-white flex flex-row justify-between px-5 items-center">
            <div class="flex flex-row gap-2">
                <x-bi-list class="w-8 h-8 cursor-pointer block md:hidden" id="open-sidebar" />
                <p>{{ $web_title }} | {{$user_info->role_id == 1 ? "ADMIN" : "KARYAWAN"}}</p>
            </div>
            <a href="/auth/logout" class="flex gap-2">
                <x-tabler-logout />
                <p class="text-[#808080]">LOGOUT</p>
            </a>
        </div>
        @yield("home_content")
    </div>
</div>
<script>
    function toggleTransactionMenu() {
        var menu = document.getElementById('transaction-menu');
        menu.classList.toggle('hidden');
    }

    const sidebar = document.querySelector("#sidebar")
    document.querySelector("#close-sidebar").addEventListener("click", () => {
        sidebar.classList.remove('active-sidebar');
    })
    document.querySelector("#open-sidebar").addEventListener("click", () => {
        sidebar.classList.add('active-sidebar');
    });
</script>
@endsection