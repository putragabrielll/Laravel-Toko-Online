<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT PRODUK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{ url('data_barang')}}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="form-group">
                <label>Nama Barang</label>
                <input id="nama_brg" type="text" name="nama_brg" class="form-control" required="">
                <span class="text-danger" id="nama_brgErrors"></span>
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <select id="keterangan" name="keterangan" class="custom-select mb-3" required="">
                    <option selected>Select Menu</option>
                    <option value="Air Tawar">Air Tawar</option>
                    <option value="Air Laut">Air Laut</option>
                </select>
                <span class="text-danger" id="keteranganErrors"></span>
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <br />
                <input type="radio" name="kategori" value="Konsumsi" checked>Konsumsi<br />
                <input type="radio" name="kategori" value="Hias">Hias<br />
                <span class="text-danger" id="kategoriErrors"></span>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input id="harga" type="text" name="harga" class="form-control" required="">
                <span class="text-danger" id="hargaErrors"></span>
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input id="stok" type="text" name="stok" class="form-control" required="">
                <span class="text-danger" id="stokErrors"></span>
            </div>

            <div class="form-group">
                <label>Gambar Produk</label>
                <input id="gambar" type="file" name="gambar" class="form-control" required="">
                <span class="text-danger" id="gambarErrors"></span>
            </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
    
  </div>
</div>