<!-- Untuk Header -->
@include('admin/templates_admin/header')

<!-- Untuk Sidebar -->
@include('admin/templates_admin/sidebar')

<div class="container-fluid">
    <h3><i class="fas fa-edit"></i>EDIT DATA BARANG</h3>
    <form action="{{ url('admin/data_barang')}}/{{ $barang->id }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">

        <div class="for-group">
            <label>Nama Barang</label>
            <input type="text" name="nama_brg" class="form-control" value="{{ $barang->nama_brg }}">
        </div>

        <div class="for-group">
            <label>Keterangan</label>
            <select name="keterangan" class="custom-select mb-3" value="{{ $barang->keterangan }}">
                <option value="Air Tawar">Air Tawar</option>
                <option value="Air Laut">Air Laut</option>
            </select>
        </div>

        <div class="for-group">
            <label>Kategori</label>
            <select name="kategori" class="custom-select mb-3" value="{{ $barang->kategori }}">
                <option value="Konsumsi">Konsumsi</option>
                <option value="Hias">Hias</option>
            </select>
        </div>

        <div class="for-group">
            <label>Harga</label>
            <input type="text" name="harga" class="form-control" value="{{ $barang->harga }}">
        </div>

        <div class="for-group">
            <label>Stok</label>
            <input type="text" name="stok" class="form-control" value="{{ $barang->stok }}">
        </div>

        <button type="submit" class="btn btn-primary btn-sm mt-3">Update</button>

    </form>
</div>

<!-- Untuk Footer -->
@include('admin/templates_admin/footer')