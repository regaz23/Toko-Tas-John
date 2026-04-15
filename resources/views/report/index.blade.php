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
    <h1 class="text-4xl text-[#434B6A] font-medium">Report</h1>
    <div class="bg-white rounded overflow-hidden">
        <div class="bg-[#434B6A] p-3 flex flex-row gap-2 items-center">
            <x-bi-box class="" fill="#FFF" />
            <h4 class="text-white">Data Report</h4>
        </div>
        <div class="px-6 pb-4">
            <table id="report-table" class="display responsive nowrap">
                <thead>
                    <tr>
                        <th>No Produk</th>
                        <th>No Transaksi</th>
                        <th>Nama Product</th>
                        <th>Category</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Stock Terjual</th>
                        <th>User</th>
                        <th>Dibuat pada</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $tran)
                    <tr>
                        <td>{{sprintf("B%04d", $tran->id);}}</td>
                        <td>{{sprintf("T%04d", $tran->product->id);}}</td>
                        <td>{{$tran->product->name}}</td>
                        <td>{{$tran->product->category->name}}</td>
                        <td>Rp. {{number_format($tran->product->sell_price, 2, ",", ".")}}</td>
                        <td>Rp. {{number_format($tran->product->buy_price, 2, ",", ".")}}</td>
                        <td>{{$tran->count}}</td>
                        <td>{{$tran->user->name}}</td>
                        <td>{{$tran->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <table id="report-sec-table" class="display responsive nowrap">
                <thead>
                    <tr>
                        <th>Total Produk Terjual</th>
                        <th>Total harga jual</th>
                        <th>Total harga beli</th>
                        <th>Keuntungan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$total_sell}}</td>
                        <td>Rp. {{number_format($total_sell_price, 2, ",", ".")}}</td>
                        <td>Rp. {{number_format($total_buy_price, 2, ",", ".")}}</td>
                        <td>Rp. {{number_format($totalBenefit, 2, ",", ".")}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section("script")
<script>
    new DataTable("#report-table", {
        responsive: true,
        layout: {
            topStart: {
                buttons: ['excel', 'print']
            }
        }
    });

    new DataTable("#report-sec-table", {
        responsive: true,
        searching: false,
        ordering: false,
        bInfo: false,
        bPaginate: false
    });
</script>
@endsection