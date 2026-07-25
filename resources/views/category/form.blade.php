@extends("home")

@section("home_content")
    <div class="animate-fade-up" style="max-width: 520px;">

        <div class="page-header">
            <div class="page-header-left">
                <h1 class="page-title">{{ isset($category) ? 'Edit Kategori' : 'Tambah Kategori' }}</h1>
                <p class="page-subtitle">
                    {{ isset($category) ? 'Perbarui nama kategori' : 'Tambahkan kategori produk baru' }}
                </p>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <div class="card-header-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M4.5 2A1.5 1.5 0 0 0 3 3.5v9A1.5 1.5 0 0 0 4.5 14h7a1.5 1.5 0 0 0 1.5-1.5v-7l-4-4H4.5zm0 1H9v3.5a.5.5 0 0 0 .5.5H13v5.5a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5z" />
                    </svg>
                </div>
                <span class="card-header-title">{{ isset($category) ? 'Form Edit Kategori' : 'Form Kategori Baru' }}</span>
            </div>

            <div class="card-body">
                <form action="/category/{{ isset($category) ? 'update/' . $category->id : 'store' }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="form-label" for="category_name">Nama Kategori</label>
                        <input type="text" id="category_name" name="category_name" class="form-control"
                            placeholder="Masukkan nama kategori..."
                            value="{{ isset($category) ? $category->name : old('category_name') }}" required />
                        @if ($errors->has('category_name'))
                            <p class="form-error">{{ $errors->first('category_name') }}</p>
                        @endif
                    </div>

                    <div class="form-actions">
                        <button type="button" onclick="history.back()" class="btn btn-ghost">Batal</button>
                        <button type="submit" class="btn {{ isset($category) ? 'btn-warning' : 'btn-primary' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                viewBox="0 0 16 16">
                                <path
                                    d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                            </svg>
                            {{ isset($category) ? 'Simpan Perubahan' : 'Tambah Kategori' }}
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection