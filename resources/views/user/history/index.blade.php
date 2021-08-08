<!-- Untuk Header -->
@include('user/templates_user/header')

<!-- Untuk Sidebar -->
@include('user/templates_user/sidebar')
    @include('layouts.app')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <a href="{{ url('/home') }}" class="btn btn-warning">
                        <i class="fa fa-arrow-left"></i>&nbsp;&nbsp;
                        Kembali
                    </a>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mt-2">
                        <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Riwayat Pemesanan</li>
                    </ol>
                </nav>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fa fa-history"></i>&nbsp;Riwayat Pemesanan<h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Jumlah Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach($pesanans as $pesanan)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $pesanan->tanggal }}</td>
                                        <td>
                                            @if($pesanan->status == 1)
                                                Sudah Pesan & Belum Bayar
                                            @else
                                                Sudah Di Bayar
                                            @endif
                                        </td>
                                        <td>Rp. {{ number_format($pesanan->jumlah_harga+$pesanan->kode) }}</td>
                                        <td>
                                            <a href="{{ url('history') }}/{{ $pesanan->id }}" class="btn btn-primary"><i class="fa fa-info"></i>&nbsp;&nbsp;Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

<!-- Untuk Footer -->
@include('user/templates_user/footer')