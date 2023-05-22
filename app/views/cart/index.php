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
      <table class="table">
          <thead>
              <tr>
                  <th scope="col">No</th>
                  <th scope="col">Produk</th>
                  <th scope="col">Nama produk</th>
                  <th scope="col">jumlah</th>
                  <th scope="col">Harga</th>
                  <th scope="col">Aksi</th>
              </tr>
          </thead>
          <tbody>
              <?php
                $total = 0;
                $no = 1;
                foreach ($data['cart'] as $buku) {
                ?>
                  <tr>
                      <th scope="row"><?php echo $no++ ?></th>
                      <td><img src="<?= base_url; ?>/dist/img/<?= $buku['gambar'] ?>" alt="sate" width="150"></td>
                      <td><?= $buku['judul'] ?></td>
                      <td><?= $buku['jumlah'] ?></td>
                      <td><?= $buku['harga'] ?></td>
                      <td>
                          <a href="<?= base_url; ?>/cart/hapus/<?= $buku['id_cart'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                      </td>
                  </tr>

              <?php
                    $total = $buku['jumlah'] * $buku['harga'] + $total;
                }
                ?>
          </tbody>
      </table>
      <!-- <a href="<?= base_url; ?>/payment" class="btn btn-success">Checkout</a> -->
      <fieldset class="col-sm-6">
      </fieldset>
      <h3 class="col-sm-6">Total Harga : <?= $total ?></h3>
      <div class="snipcart-details agileinfo_single_right_details">
          <form action="<?= base_url; ?>/cart/addDetailCart" method="post">
              <fieldset>
                  <input type="hidden" name="id_cart" value="<?= $buku['id_cart'] ?>">
                  <input type="hidden" name="id_buku" value="<?= $buku['id'] ?>">
                  <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
              </fieldset>

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