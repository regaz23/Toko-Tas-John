@extends("home")

@section("home_content")
<div class="px-2 py-6 flex flex-col gap-4">
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
    @endif

    @if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ session('error') }}</span>
    </div>
    @endif
    <h1 class="text-4xl text-[#434B6A] font-medium">Data Produk</h1>
    <a href="/product/create" class="bg-[#19427D] text-white px-6 py-2 flex text-md items-center gap-1 rounded self-start">
        <x-bi-plus class="w-8 h-8" />
        Insert Data
    </a>
    <div class="bg-white rounded overflow-hidden">
        <div class="bg-[#434B6A] p-3 flex flex-row gap-2 items-center">
            <x-bi-box class="" fill="#FFF" />
            <h4 class="text-white">Data Product</h4>
        </div>
        <div class="px-6 pb-4">
            <table id="myTable" class="display responsive nowrap">
                <thead>
                    <tr>
                        <th style="width: 10%">No Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Stock</th>
                        <th>User</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Dibuat pada</th>
                        <th>Diubah pada</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $pro)
                    <tr>
                        <td>{{sprintf("B%04d", $pro->id);}}</td>
                        <td>{{$pro->name}}</td>
                        <td>{{$pro->category->name}}</td>
                        <td>{{$pro->stock}}</td>
                        <td>{{$pro->user->name}}</td>
                        <td>{{$pro->buy_price}}</td>
                        <td>{{$pro->sell_price}}</td>
                        <td>{{$pro->created_at}}</td>
                        <td>{{$pro->updated_at}}</td>
                        <td>
                            @if($current_user->role_id == 1 || $pro->user->id == $current_user->id)
                            <a href="/product/edit/{{$pro->id}}" class="bg-[#F2A007] text-white px-2 py-1 rounded">Edit</a>
                            <button class="bg-[#EF3A25] text-white px-2 py-1 rounded" onclick="confirmDelete('/product/destroy/{{$pro->id}}')">Delete</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection