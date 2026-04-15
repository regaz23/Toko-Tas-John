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
    <h1 class="text-4xl text-[#434B6A] font-medium">Pengaturan Toko</h1>
    <div class="bg-white rounded overflow-hidden">
        <form class="px-6 py-2 max-w-screen-md flex flex-col gap-4" action="/setting" method="POST">
            @csrf
            <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Toko</label>
                <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Nama Toko" name="name" value="{{ isset($web_title) ? $web_title : old('name') }}" required />
                @if ($errors->has('name'))
                <span class="text-red-500 text-sm">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="flex flex-row gap-2 justify-end">
                <button type="submit" class="bg-[#19427D] text-white px-6 py-2 flex text-md items-center gap-1 rounded">
                    <x-bi-plus class="w-8 h-8" />
                    Update Toko
                </button>
                <button onclick="history.back()" class="text-[#434B6A] px-6 py-2 flex text-md items-center gap-1 rounded">
                    Cancel
                </button>
            </div>
        </form>

    </div>
</div>
@endsection