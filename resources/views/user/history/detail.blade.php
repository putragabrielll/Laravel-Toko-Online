<!-- Untuk Header -->
@include('user/templates_user/header')

<!-- Untuk Sidebar -->
@include('user/templates_user/sidebar')
    @include('layouts.app')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <a href="{{ url('/history') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i>&nbsp;&nbsp;
                        Kembali
                    </a>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-2">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/history') }}">Riwayat Pemesanan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                    </ol>
                </nav>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3>Sukses Check Out</h3>
                        <h6>Pesanan anda sudah sukses dicheck out selanjutnya untuk pembayaran silahkan transfer di rekening <strong>Bank BRI Nomer Rekening : 00023-857664-666</strong> dengan nominal : <strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></h6>
                    </div>
                </div>

                <div class="card mt-2">
                    <div class="card-header">
                        <h3><i class="fa fa-shopping-cart"></i>&nbsp;Detail Pemesanan<h3>
                    </div>
                    <div class="card-body">
                        @if(!empty($pesanan))
                            <h6 align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</h6>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Gambar</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah</th>
                                        <th class="text-center">Harga</th>
                                        <th class="text-center">Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($pesanan_details as $pesanan_detail)
                                        <tr>
                                            <td>{{ $no++ }}</th>
                                            <td>
                                                <img src="{{ url('uploads') }}/{{ $pesanan_detail -> model_barang -> gambar }}" width="100" height="80" alt="...">
                                            </td>
                                            <td>{{ $pesanan_detail -> model_barang -> nama_brg }}</td>
                                            <td>{{ $pesanan_detail -> jumlah }}</td>
                                            <td align="right">Rp. {{ number_format($pesanan_detail -> model_barang -> harga ) }}</td>
                                            <td align="right">Rp. {{ number_format($pesanan_detail -> jumlah_harga) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                        <td align="right"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" align="right"><strong>Kode Unik :</strong></td>
                                        <td align="right"><strong>Rp. {{ number_format($pesanan->kode) }}</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" align="right"><strong>Total yang Harus di Bayar :</strong></td>
                                        <td align="right"><strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
            
        </div>
    </div>

<!-- Untuk Footer -->
@include('user/templates_user/footer')