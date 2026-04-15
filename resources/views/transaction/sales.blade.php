@extends("home")

@section("home_content")
    @csrf
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
        <h1 class="text-4xl text-[#434B6A] font-medium">Transaksi Penjualan</h1>
        <button class="bg-[#19427D] text-white px-6 py-2 flex text-md items-center gap-1 rounded self-start"
            id="checkout-btn">
            <x-bi-bag class="w-4 h-4" />
            Checkout
        </button>
        <div class="bg-white rounded overflow-hidden">
            <div class="bg-[#434B6A] p-3 flex flex-row gap-2 items-center">
                <x-bi-box class="" fill="#FFF" />
                <h4 class="text-white">Data Products</h4>
            </div>
            <div class="px-6 pb-4">
                <table class="myTable display responsive nowrap">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga Jual</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $prod)
                            <tr>
                                <td>{{$prod->name}}</td>
                                <td>{{$prod->category->name}}</td>
                                <td>Rp. {{number_format($prod->sell_price, 2, ",", ".")}}</td>
                                <td>
                                    <button class="bg-[#97CF8A] text-white px-2 py-1 rounded addToCart" data-id="{{$prod->id}}"
                                        data-name="{{$prod->name}}" data-category="{{$prod->category->name}}"
                                        data-price="{{$prod->sell_price}}" id="addToCart-{{$prod->id}}"
                                        data-stock="{{$prod->stock}}">Add to cart</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div style="background-color: rgba(0,0,0,0.2);"
        class="w-full h-full absolute top-0 left-0 flex flex-row justify-center items-center p-2 hidden z-[10]"
        id="cart-modal">
        <div class="bg-white w-full max-w-screen-lg p-4">
            <div class="bg-[#434B6A] p-3 flex flex-row gap-2 items-center">
                <x-bi-cart class="" fill="#FFF" />
                <h4 class="text-white">Shopping Cart</h4>
            </div>
            <div class="px-6 pb-4">
                <table id="cart-table" class="display responsive nowrap">
                    <thead>
                        <tr>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th style="width: 10%;">Jumlah</th>
                            <th>Harga</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="cart-data">
                        <tr>
                            <td>Product 1</td>
                            <td>Category 1</td>
                            <td><input type="number" value="1" class="w-full border-none text-center" /></td>
                            <td>200</td>
                            <td>
                                <a class="bg-[#E3342F] text-white px-2 py-1 rounded">Remove</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Product 2</td>
                            <td>Category 2</td>
                            <td><input type="number" value="1" class="w-full border-none text-center" /></td>
                            <td>150</td>
                            <td>
                                <a class="bg-[#E3342F] text-white px-2 py-1 rounded">Remove</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <p>Total yang harus dibayarkan: <span id="total-price"></span></p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 w-full">
                <div>
                    <label for="input-price" class="block mb-2 text-sm font-medium text-gray-900">Masukan uang</label>
                    <input type="number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Masukan uang" id="input-price" />
                </div>
                <div>
                    <label for="cashback" class="block mb-2 text-sm font-medium text-gray-900">Total pengembalian</label>
                    <input type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Total pengembalian" disabled id="cashback" />
                </div>
            </div>
            <div class="flex flex-row justify-end mt-4 gap-4">
                <button class="bg-[#19427D] text-white px-6 py-2 flex text-md items-center gap-1 rounded" id="close-modal">
                    Close
                </button>
                <button class="bg-[#97CF8A] text-white px-6 py-2 flex text-md items-center gap-1 rounded" id="pay-btn">
                    Pay
                </button>
            </div>
        </div>
    </div>
@endsection

@section("script")
    <script>
        const cartData = document.querySelector("#cart-data");
        const cartModal = document.querySelector("#cart-modal");
        const totalPrice = document.querySelector("#total-price");
        const inputPrice = document.querySelector("#input-price");
        const cashback = document.querySelector("#cashback");
        const payBtn = document.querySelector("#pay-btn");
        let cartTable;
        let total = 0;
        let cart = [];
        document.querySelectorAll(".addToCart").forEach(el => {
            const id = el.getAttribute("data-id");
            const name = el.getAttribute("data-name");
            const category = el.getAttribute("data-category");
            const price = el.getAttribute("data-price");
            const stock = el.getAttribute("data-stock");
            el.addEventListener("click", () => {
                if (!cart.includes(id)) {
                    const data = {
                        id,
                        name,
                        category,
                        price,
                        stock,
                        total: 1
                    }
                    cart.push(data);
                    el.innerHTML = "Added"
                }
            })
        })

        const fillTotalPrice = () => {
            const price = cart.reduce((a, b) => a + parseInt(b.price * b.total), 0);
            totalPrice.innerHTML = rupiah(price);
            total = price;
        }

        const handleRemoveData = (dataId) => {
            cart = cart.filter(data => parseInt(data.id) !== parseInt(dataId));
            document.querySelector(`#addToCart-${dataId}`).innerHTML = "Add to cart";
            if (cart[0]) {
                renderCartContent();
            } else {
                cartModal.classList.add("hidden");
            }
        }

        const changetty = (ttyId, price, index) => {
            const ttyEl = document.querySelector("#tty-" + ttyId);
            const priceEl = document.querySelector(`#price-${ttyId}`);
            const max = ttyEl.getAttribute("max");
            if (ttyEl.value > parseInt(max)) {
                ttyEl.value = max;
            }

            if (ttyEl.value < 1) {
                ttyEl.value = 1;
            }
            priceEl.innerHTML = rupiah(price * ttyEl.value);


            cart[index].total = ttyEl.value;
            fillTotalPrice()
        }

        const renderCartContent = () => {
            if (cartTable) {
                cartTable.destroy();
            }
            let data = ``;
            cart.forEach((dat, index) => {
                data += `
                        <tr id="data-${dat.id}">
                            <td>${dat.name}</td>
                            <td>${dat.category}</td>
                            <td><input type="number" value="1" class="w-full border-none text-center" id="tty-${dat.id}" onchange="changetty(${dat.id}, ${dat.price}, ${index})" min="1" max="${dat.stock}" /></td>
                            <td id="price-${dat.id}">${rupiah(dat.price)}</td>
                            <td>
                                <button class="bg-[#E3342F] text-white px-2 py-1 rounded remove-data" onclick="handleRemoveData(${dat.id})">Remove</button>
                            </td>
                        </tr>
                `
            });

            cartData.innerHTML = data;
            cartTable = new DataTable("#cart-table", {
                responsive: true,
                searching: false,
                layout: {
                    topStart: {
                        buttons: ['print']
                    }
                }
            })
            fillTotalPrice();
        }

        const checkoutBtn = document.querySelector("#checkout-btn");
        checkoutBtn.addEventListener("click", () => {
            if (!cart[0]) {
                alert("Minimal ada 1 produk yang dipilih");
                return;
            }
            renderCartContent();
            cartModal.classList.remove("hidden");
        })

        const closeModalBtn = document.querySelector("#close-modal");
        closeModalBtn.addEventListener("click", () => {
            cartModal.classList.add("hidden");
        })


        const rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            }).format(number);
        }

        inputPrice.addEventListener("change", e => {
            cashback.value = rupiah(e.target.value - total);
        });

        payBtn.addEventListener("click", () => {
            if (total > inputPrice.value) {
                alert("Uang yang dimasukan kurang!");
                return;
            }

            fetchData();
        });

        const fetchData = async () => {
            try {
                const result = await fetch('/transaction/sales/store', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'url': '/payment',
                        "X-CSRF-Token": document.querySelector('input[name=_token]').value
                    },
                    body: JSON.stringify({
                        cart
                    })
                });

                const response = await result.json();

                if (!result.ok || response.status === "error") {
                    alert("Gagal: " + (response.message || "Ada suatu error yang terjadi"));
                    return;
                }

                alert("Transaksi berhasil dibuat!");
                payBtn.setAttribute("disabled", true);
                closeModalBtn.addEventListener("click", () => window.location.reload())
            } catch (error) {
                alert("Ada suatu error yang terjadi");
            }
        }
    </script>
@endsection