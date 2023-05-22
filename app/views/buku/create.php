  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-4">
            <h1>Halaman Buku</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title']; ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="<?= base_url; ?>/buku/simpanbuku" method="POST" enctype="multipart/form-data">
          <div class="card-body row col-12">
            <div class="form-group">
              <label>Judul</label>
              <input type="text" class="form-control col-11" placeholder="masukkan judul..." name="judul" required>
            </div>
            <div class="form-group">
              <label>Penerbit</label>
              <input type="text" class="form-control col-11" placeholder="masukkan penerbit..." name="penerbit" required>
            </div>
            <div class="form-group">
              <label>Pengarang</label>
              <input type="text" class="form-control col-11" placeholder="masukkan pengarang..." name="pengarang" required>
            </div>
            <div class="form-group">
              <label>Tahun</label>
              <input type="number" class="form-control col-11" placeholder="masukkan tahun..." name="tahun" required>
            </div>
            <div class="form-group">
              <label>Kategori</label>
              <select class="form-control col-11" name="kategori_id" required>
                <option value="">Pilih</option>
                <?php foreach ($data['kategori'] as $row) : ?>
                  <option value="<?= $row['id']; ?>"><?= $row['nama_kategori']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="number" class="form-control col-11" placeholder="masukkan harga..." name="harga" required>
            </div>
            <div class="form-group row col-9">
              <label>Keterangan</label>
              <input type="text" class="form-control col-12" placeholder="masukkan keterangan..." name="keterangan" required>
            </div>
            <div class="form-group">
              <label>Gambar</label>
              <input type="file" class="form-control col-10" name="gambar" style="height: 30px; color: white; background-color: dodgerblue;">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->