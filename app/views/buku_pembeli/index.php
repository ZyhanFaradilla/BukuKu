  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>BukuKu</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-sm-12">
          <?php
          Flasher::Message();
          ?>
        </div>
      </div>

      <form action="<?= base_url; ?>/buku_pembeli/cari" method="post">
        <div class="row mb-3">
          <div class="col-lg-6">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="" name="key">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
              </div>
            </div>

          </div>
        </div>
      </form>
      <?php foreach ($data['buku'] as $row) : ?>
        <div class="media mt-3">
          <img class="align-self-center mr-3" src="<?= base_url; ?>/dist/img/<?php echo $row['gambar']; ?>" alt="Generic placeholder image">
          <div class=" media-body">
            <h5 class="mt-0" value="<?= $row['id']; ?>"><?= $row['judul']; ?></h5>
            <h6 class="mt-0"> Pengarang : <?= $row['pengarang']; ?></h6>
            <h6 class="mt-0"> Penerbit : <?= $row['penerbit']; ?></h6>
            <h6 class="mt-0"> Tahun Terbit : <?= $row['tahun']; ?></h6>
            <span class="badge badge-secondary">Rp.<?php echo number_format($row['harga']); ?></span></h3>
          </div>
          <div class="snipcart-details agileinfo_single_right_details">
            <form action="<?= base_url; ?>/buku_pembeli/addCart" method="post">
              <fieldset>
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="hidden" name="id_user" value="2">
                <input type="hidden" name="jumlah" value="1">
                <input type="submit" name="submit" value="Add to cart" class="btn btn-primary">
              </fieldset>
            </form>
          </div>
        </div>
      <?php
      endforeach; ?>
  </div>

  <!-- /.card-body -->
  <div class="card-footer">
    Footer
  </div>
  <!-- /.card-footer-->
  </div>
  <!-- /.card -->

  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->