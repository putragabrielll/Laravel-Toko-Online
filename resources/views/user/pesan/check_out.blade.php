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
                        <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                    </ol>
                </nav>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fa fa-shopping-cart"></i>&nbsp;Check Out<h3>
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
                                        <th>Aksi</th>
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
                                            <td>
                                                <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data ?');"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                        <td align="right"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                        <td>
                                            <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success" onclick="return confirm('Anda yakin akan Check Out ?');">
                                                <i class="fa fa-shopping-cart"></i>
                                                Check Out
                                            </a>
                                        </td>
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