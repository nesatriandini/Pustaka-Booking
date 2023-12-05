<div class="container-fluid">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="row">
    <div class="col-lg-12">
      
      <!--<a href="" class="btn btn-primary mb-3" datatoggle="modal" data-target="#kategoriBaruModal"><i class="fas fafile-alt"></i> Tambah Kategori</a>-->

      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Buku</button><br><br>

      <?php if(validation_errors()){?>
        <div class="alert alert-danger" role="alert">
          <?= validation_errors();?>
        </div>
      <?php }?>
  <div class="table-responsive">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">No</th>
          <th scope="col">Judul</th>
          <th scope="col">Pengarang</th>
          <th scope="col">Penerbit</th>
          <th scope="col">Tahun Terbit</th>
          <th scope="col">ISBN</th>
          <th scope="col">Stok</th>
          <th scope="col">Di Pinjam</th>
          <th scope="col">Di Booking</th>
          <th scope="col">Gambar</th>
          <th scope="col">Pilihan</th>
        </tr>
      </thead>
      <tbody>

        <?php
          $a = 1;
          foreach ($buku as $b) { ?>
        <tr>
          <th scope="row"><?= $a++; ?></th>
          <td><?= $b['judul_buku']; ?></td>
          <td><?= $b['pengarang']; ?></td>
          <td><?= $b['penerbit']; ?></td>
          <td><?= $b['tahun_terbit']; ?></td>
          <td><?= $b['isbn']; ?></td>
          <td><?= $b['stok']; ?></td>
          <td><?= $b['dipinjam']; ?></td>
          <td><?= $b['dibooking']; ?></td>
          <td>
            <img src="<?= base_url('./assets/img/upload/' . $b['image']) ?>" class="card-img w-50" alt="img user">
          </td>
          <td>
            <a href="<?= base_url('buku/ubahBuku/') . $b['id'] ?>" class="badge badge-info"><i class="fas fa-edit"></i> Ubah</a>
            <a href="<?= base_url('buku/hapusbuku/').$b['id'];?>" onclick="return confirm('Kamu yakin akan menghapus');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
          </td>
        </tr>
        <?php } ?>
        
      </tbody>
    </table>
    </div>
    </div>
  </div>
</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Tambah Buku</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="<?= base_url('buku'); ?>" method="post" enctype="multipart/form-data">

        <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" id="judul_buku" placeholder="Masukan Judul Buku" name="judul_buku">
              </div>
              <div class="form-group">
                <select name="id_kategori" class="formcontrol form-control-user">
                  <option value="">Pilih Kategori</option>
                  <?php
                  foreach ($kategori as $k) { ?>
                  <option value="<?= $k['id'];?>"><?= $k['kategori'];?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="pengarang" placeholder="Masukan Pengarang Buku" name="pengarang">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="penerbit" placeholder="Masukan Penerbit Buku" name="penerbit">
              </div>
              <div class="form-group">
                <select name="tahun_terbit" class="form-control form-control-user">
                  <option value="">Pilih Tahun</option>
                  <?php
                  for ($i=date('Y'); $i > 1000 ; $i--) { ?>
                  <option value="<?= $i;?>"><?= $i;?></option>
                  <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="isbn" placeholder="Masukan ISBN" name="isbn">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="stok" placeholder="Masukan Stok" name="stok">
              </div>
              
              <div class="form-group">
                <label for="image">Upload Image</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="image" name="image">
                  <label class="custom-file-label" for="image">Choose file</label>
                </div>
              </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-ban"></i> Close</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>