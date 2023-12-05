<div class="container-fluid">
  <?= $this->session->flashdata('pesan'); ?>
  <div class="row">
    <div class="col-lg-12">
      
      <!--<a href="" class="btn btn-primary mb-3" datatoggle="modal" data-target="#kategoriBaruModal"><i class="fas fafile-alt"></i> Tambah Kategori</a>-->

     

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
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Foto</th>
          <th scope="col">Tanggal Bergabung</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; 
         foreach ($anggota as $g) { ?>
          <tr>
            <th scope="row"><?= $no++; ?></th>
            <td><?= $g['nama']; ?></td>
            <td><?= $g['email']; ?></td>
            <td><img class="img-profile" width="50" src="<?= base_url('assets/img/profile/') . $g['image']; ?>"></td>
            
            <td><?= date('d F Y', $g['tanggal_input']); ?></td>
            <td>
              <?php if ($g['email'] == $this->session->userdata('email')) : ?>
                <small>Tidak ada aksi</small>
              <?php else : ?>
                  <a href="<?= base_url('user/hapusUser/').$g['id'];?>" onclick="return confirm('Kamu yakin akan menghapus');" class="badge badge-danger"><i class="fas fa-trash"></i> Hapus</a>
              <?php endif; ?>
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

