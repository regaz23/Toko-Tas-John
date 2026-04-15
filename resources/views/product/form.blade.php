@extends("home")

@section("home_content")
<div class="px-2 py-6 flex flex-col gap-4">
    <h1 class="text-4xl text-[#434B6A] font-medium">Data Produk</h1>
    <div class="bg-white rounded overflow-hidden">
        <div class="bg-[#434B6A] p-3 flex flex-row gap-2 items-center">
            <x-bi-box class="" fill="#FFF" />
            <h4 class="text-white">{{ isset($product) ? 'Edit' : 'Add' }} Produk</h4>
        </div>
        <form class="px-6 py-2 max-w-screen-md flex flex-col gap-4" action="/product/{{ isset($product) ? 'update/' . $product->id : 'store' }}" method="POST">
            @csrf
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Produk</label>
                <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="product name" name="name" value="{{ isset($product) ? $product->name : old('name') }}" required />
                @if ($errors->has('name'))
                <span class="text-red-500 text-sm">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div>
                <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
                @if ($errors->has('category_id'))
                <span class="text-red-500 text-sm">{{ $errors->first('category_id') }}</span>
                @endif
            </div>
            <div>
                <label for="buy_price" class="block mb-2 text-sm font-medium text-gray-900">Harga Beli</label>
                <input type="number" id="buy_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="product name" name="buy_price" value="{{ isset($product) ? $product->buy_price : old('buy_price') }}" required />
                @if ($errors->has('buy_price'))
                <span class="text-red-500 text-sm">{{ $errors->first('buy_price') }}</span>
                @endif
            </div>
            <div>
                <label for="sell_price" class="block mb-2 text-sm font-medium text-gray-900">Harga Jual</label>
                <input type="number" id="sell_price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="product name" name="sell_price" value="{{ isset($product) ? $product->sell_price : old('sell_price') }}" required />
                @if ($errors->has('sell_price'))
                <span class="text-red-500 text-sm">{{ $errors->first('sell_price') }}</span>
                @endif
            </div>
            <div class="flex flex-row gap-2 justify-end">
                <button type="submit" class="bg-[{{ isset($product) ? '#F2A007' : '#19427D' }}] text-white px-6 py-2 flex text-md items-center gap-1 rounded">
                    <x-bi-plus class="w-8 h-8" />
                    {{ isset($product) ? 'Edit' : 'Add' }} Data
                </button>
                <button onclick="history.back()" class="text-[#434B6A] px-6 py-2 flex text-md items-center gap-1 rounded">
                    Cancel
                </button>
            </div>
        </form>

    </div>
</div>
@endsection