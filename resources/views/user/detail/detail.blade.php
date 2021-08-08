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
                        <li class="breadcrumb-item active" aria-current="page">{{ $detail->nama_brg }}</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Detail Produk</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{url('uploads')}}/{{ $detail->gambar }}" class="rounded mx-auto d-block" alt="..." width="500" height="400">
                            </div>
                            
                            <div class="col-md-6">
                                <u><h3>{{ $detail->nama_brg }}</h3></u>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td>{{ number_format($detail->harga) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td>:</td>
                                            <td>{{ number_format($detail->stok) }}&nbsp;kg</td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td>{{ $detail->keterangan }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kategori</td>
                                            <td>:</td>
                                            <td>{{ $detail->kategori }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <form method="GET" action="{{ url('pesan') }}/{{ $detail->id }}">
                                                @csrf
                                                    <button type="submit" class="btn btn-primary mt-2">
                                                        <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;
                                                        Pesan
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>



                                    </tbody>
                                </table>
                            </div>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Untuk Footer -->
@include('user/templates_user/footer')