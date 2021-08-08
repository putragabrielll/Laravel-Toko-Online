<!-- Untuk Header -->
@include('admin/templates_admin/header')

<!-- Untuk Sidebar -->
@include('admin/templates_admin/sidebar')

<div class="container-fluid">
    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang">
        <i class="fas fa-plus fa-sm"></i>
        Tambah Data
    </button>
        <!-- Untuk Allert Nambah dan Update Data-->
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <!-- Untuk Allert Hapus Data -->
        @if ($message = Session::get('danger'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{{ $message }}</strong>
            </div>
        @endif

    <table class="table table-bordered">
        <tr>
            <th>NO</th>
            <th>NAMA BARANG</th>
            <th>KETERANGAN</th>
            <th>KATEGORI</th>
            <th>HARGA</th>
            <th>STOK</th>
            <th colspan="3">AKSI</th>
        </tr>

        <?php $no = 1 ?>
        @foreach($barang as $brg)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $brg -> nama_brg }}</td>
                <td>{{ $brg -> keterangan }}</td>
                <td>{{ $brg -> kategori }}</td>
                <td>Rp. {{ number_format($brg->harga)}}</td>
                <td>{{ $brg -> stok }}&nbsp;&nbsp; Kg</td>
                <td><div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div></td>
                <td>
                    <form method="POST" action="{{ url('admin/data_barang') }}/{{ $brg->id }}">
                        {{ csrf_field() }}
                        <a href="{{ url('admin/data_barang') }}/{{ $brg->id }}/edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                    </form>
                </td>
                <td>
                    <form method="POST" action="{{ url('admin/data_barang') }}/{{ $brg->id }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>
</div>

<!-- Untuk Form modal -->
@include('admin/modal/modal')

<!-- Untuk Footer -->
@include('admin/templates_admin/footer')