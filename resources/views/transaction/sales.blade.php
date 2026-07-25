@extends("home")

@section("home_content")
@csrf
<div class="animate-fade-up">

    {{-- Flash messages --}}
    @if (session('success'))
    <div class="alert alert-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </svg>
        <span><strong>Berhasil!</strong> {{ session('success') }}</span>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-error">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
        </svg>
        <span><strong>Error!</strong> {{ session('error') }}</span>
    </div>
    @endif

    {{-- Page header --}}
    <div class="page-header">
        <div class="page-header-left">
            <h1 class="page-title">Transaksi Penjualan</h1>
            <p class="page-subtitle">Pilih produk dan lakukan checkout</p>
        </div>
        <button id="checkout-btn" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            Checkout
        </button>
    </div>

    {{-- Product table --}}
    <div class="card">
        <div class="card-header">
            <div class="card-header-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </div>
            <span class="card-header-title">Daftar Produk Tersedia</span>
        </div>
        <div class="card-body" style="overflow-x:auto;">
            <table class="myTable display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $prod)
                    <tr>
                        <td><span style="font-family:monospace;font-size:12px;color:var(--text-muted);">{{ sprintf("B%04d", $prod->id) }}</span></td>
                        <td><strong>{{ $prod->name }}</strong></td>
                        <td>{{ $prod->category->name }}</td>
                        <td>{{ number_format($prod->sell_price, 0, ',', '.') == 0 ? 'Rp 0' : 'Rp ' . number_format($prod->sell_price, 0, ',', '.') }}</td>
                        <td>
                            <span style="font-weight:600;color:{{ $prod->stock < 5 ? 'var(--danger)' : 'var(--success)' }}">
                                {{ $prod->stock }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm addToCart"
                                data-id="{{ $prod->id }}"
                                data-name="{{ $prod->name }}"
                                data-category="{{ $prod->category->name }}"
                                data-price="{{ $prod->sell_price }}"
                                data-stock="{{ $prod->stock }}"
                                id="addToCart-{{ $prod->id }}">
                                + Tambah
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>

{{-- ══════════════════ CART MODAL ══════════════════ --}}
<div id="cart-modal" style="display:none;position:fixed;inset:0;background:rgba(15,18,35,.6);backdrop-filter:blur(4px);z-index:200;align-items:center;justify-content:center;padding:16px;">
    <div style="background:var(--surface);border-radius:var(--radius);box-shadow:var(--shadow-md);width:100%;max-width:760px;max-height:90vh;overflow:hidden;display:flex;flex-direction:column;animation:fadeSlideUp .25s ease both;">

        {{-- Modal header --}}
        <div style="display:flex;align-items:center;justify-content:space-between;padding:18px 20px;border-bottom:1px solid var(--border);">
            <div style="display:flex;align-items:center;gap:10px;">
                <div class="card-header-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </div>
                <span style="font-size:15px;font-weight:600;color:var(--text);">Keranjang Belanja</span>
            </div>
            <button id="close-modal" style="background:none;border:none;cursor:pointer;padding:4px;color:var(--text-muted);" title="Tutup">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </button>
        </div>

        {{-- Cart table --}}
        <div style="overflow-y:auto;flex:1;padding:16px 20px;">
            <table id="cart-table" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No Produk</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th style="width:100px">Jumlah</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="cart-data"></tbody>
            </table>
        </div>

        {{-- Footer: total + bayar --}}
        <div style="padding:16px 20px;border-top:1px solid var(--border);background:var(--surface-alt);">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:14px;">
                <span style="font-size:13px;color:var(--text-muted);">Total Pembayaran</span>
                <span id="total-price" style="font-size:20px;font-weight:700;color:var(--text);"></span>
            </div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-bottom:14px;">
                <div class="form-group" style="margin:0;">
                    <label class="form-label">Uang yang diterima</label>
                    <input type="number" id="input-price" class="form-control" placeholder="Masukkan jumlah uang..." />
                </div>
                <div class="form-group" style="margin:0;">
                    <label class="form-label">Kembalian</label>
                    <input type="text" id="cashback" class="form-control" placeholder="Otomatis terhitung" disabled
                           style="background:var(--surface-alt);color:var(--success);font-weight:600;" />
                </div>
            </div>
            <div style="display:flex;justify-content:flex-end;gap:8px;">
                <button id="close-modal-2" class="btn btn-ghost">Batal</button>
                <button id="pay-btn" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 0 2H3a1 1 0 0 1-1-1z"/>
                    </svg>
                    Bayar Sekarang
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section("script")
<script>
    const cartData    = document.querySelector("#cart-data");
    const cartModal   = document.querySelector("#cart-modal");
    const totalPrice  = document.querySelector("#total-price");
    const inputPrice  = document.querySelector("#input-price");
    const cashback    = document.querySelector("#cashback");
    const payBtn      = document.querySelector("#pay-btn");

    let cartTable;
    let total = 0;
    let cart  = [];

    const rupiah = n => new Intl.NumberFormat("id-ID", {
        style: "currency", currency: "IDR",
        minimumFractionDigits: 0, maximumFractionDigits: 0
    }).format(n);

    // Add to cart
    document.querySelectorAll(".addToCart").forEach(el => {
        const { id, name, category, price, stock } = el.dataset;
        const prodNo = `B${String(id).padStart(4, '0')}`;
        el.addEventListener("click", () => {
            if (!cart.find(c => c.id === id)) {
                cart.push({ id, name, category, price, stock, total: 1, prodNo });
                el.textContent = "✓ Ditambahkan";
                el.style.background = "var(--success)";
                el.disabled = true;
            }
        });
    });

    const fillTotalPrice = () => {
        total = cart.reduce((a, b) => a + parseInt(b.price) * parseInt(b.total), 0);
        totalPrice.textContent = rupiah(total);
    };

    const handleRemoveData = (dataId) => {
        cart = cart.filter(d => d.id !== String(dataId));
        const btn = document.querySelector(`#addToCart-${dataId}`);
        if (btn) { btn.textContent = "+ Tambah"; btn.style.background = ""; btn.disabled = false; }
        if (cart.length) { renderCartContent(); }
        else { cartModal.style.display = "none"; }
    };

    const changetty = (ttyId, price, index) => {
        const ttyEl   = document.querySelector("#tty-" + ttyId);
        const priceEl = document.querySelector("#price-" + ttyId);
        const max = parseInt(ttyEl.getAttribute("max"));
        if (parseInt(ttyEl.value) > max) ttyEl.value = max;
        if (parseInt(ttyEl.value) < 1)   ttyEl.value = 1;
        priceEl.textContent = rupiah(price * ttyEl.value);
        cart[index].total   = ttyEl.value;
        fillTotalPrice();
    };

    const renderCartContent = () => {
        if (cartTable) { cartTable.destroy(); cartTable = null; }
        cartData.innerHTML = cart.map((d, i) => `
            <tr id="data-${d.id}">
                <td><span style="font-family:monospace;font-size:12px;color:var(--text-muted);">${d.prodNo}</span></td>
                <td><strong>${d.name}</strong></td>
                <td>${d.category}</td>
                <td>
                    <input type="number" value="${d.total}" min="1" max="${d.stock}"
                        id="tty-${d.id}"
                        onchange="changetty(${d.id}, ${d.price}, ${i})"
                        style="width:70px;padding:4px 8px;border:1.5px solid var(--border);border-radius:var(--radius-sm);text-align:center;font-family:inherit;font-size:13px;" />
                </td>
                <td id="price-${d.id}" style="font-weight:600;">${rupiah(d.price * d.total)}</td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="handleRemoveData(${d.id})">Hapus</button>
                </td>
            </tr>
        `).join('');

        cartTable = new DataTable("#cart-table", {
            responsive: true, searching: false, paging: false, info: false
        });
        fillTotalPrice();
    };

    // Checkout button
    document.querySelector("#checkout-btn").addEventListener("click", () => {
        if (!cart.length) { showToast('error', 'Peringatan', 'Pilih minimal 1 produk terlebih dahulu.'); return; }
        renderCartContent();
        cartModal.style.display = "flex";
    });

    // Close modal
    const closeModal = () => { cartModal.style.display = "none"; };
    document.querySelector("#close-modal").addEventListener("click",   closeModal);
    document.querySelector("#close-modal-2").addEventListener("click", closeModal);
    cartModal.addEventListener("click", e => { if (e.target === cartModal) closeModal(); });

    // Cashback
    inputPrice.addEventListener("input", e => {
        const val = parseInt(e.target.value) || 0;
        cashback.value = val >= total ? rupiah(val - total) : "Uang kurang!";
        cashback.style.color = val >= total ? "var(--success)" : "var(--danger)";
    });

    // Pay
    payBtn.addEventListener("click", async () => {
        if (total > parseInt(inputPrice.value || 0)) {
            showToast('error', 'Peringatan', 'Uang yang dimasukkan kurang!'); return;
        }
        try {
            const result = await fetch('/transaction/sales/store', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-Token': document.querySelector('input[name=_token]').value
                },
                body: JSON.stringify({ cart })
            });
            const response = await result.json();
            if (!result.ok || response.status === "error") {
                showToast('error', 'Gagal', "Gagal: " + (response.message || "Terjadi kesalahan.")); return;
            }
            showToast('success', 'Berhasil', 'Transaksi berhasil!');
            payBtn.disabled = true;
            document.querySelector("#close-modal").addEventListener("click", () => location.reload());
        } catch {
            showToast('error', 'Error', 'Terjadi kesalahan koneksi.');
        }
    });
</script>
@endsection

