@extends("home")

@section("home_content")
<div class="px-2 py-6 flex flex-col gap-4">
    <h1 class="text-4xl text-[#434B6A] font-medium">Data Kategori</h1>
    <div class="bg-white rounded overflow-hidden">
        <div class="bg-[#434B6A] p-3 flex flex-row gap-2 items-center">
            <x-bi-box class="" fill="#FFF" />
            <h4 class="text-white">{{ isset($category) ? 'Edit' : 'Add' }} Kategori</h4>
        </div>
        <form class="px-6 py-2 max-w-screen-md" action="/category/{{ isset($category) ? 'update/' . $category->id : 'store' }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900">Category name</label>
                <input type="text" id="category_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Category name" name="category_name" value="{{ isset($category) ? $category->name : old('category_name') }}" required />
                @if ($errors->has('category_name'))
                    <span class="text-red-500 text-sm">{{ $errors->first('category_name') }}</span>
                @endif
            </div>
            <div class="flex flex-row gap-2 justify-end">
                <button type="submit" class="bg-[{{ isset($category) ? '#F2A007' : '#19427D' }}] text-white px-6 py-2 flex text-md items-center gap-1 rounded">
                    <x-bi-plus class="w-8 h-8" />
                    {{ isset($category) ? 'Edit' : 'Add' }} Data
                </button>
                <button onclick="history.back()" class="text-[#434B6A] px-6 py-2 flex text-md items-center gap-1 rounded">
                    Cancel
                </button>
            </div>
        </form>

    </div>
</div>
@endsection