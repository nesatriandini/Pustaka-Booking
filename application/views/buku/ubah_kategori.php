<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-message" role="alert">Nama Kategori tidak boleh Kosong</div>');
                redirect('buku/ubahkategori/' . $kategori['id']);
            } ?>
            <form action="<?= base_url('buku/ubahKategori'); ?>" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" id="id" value="<?= $kategori['id']; ?>">
                    <label for="kategori" class="form-label">Nama Kategori Buku</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori Buku" value="<?= $kategori['kategori']; ?>">
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-dark col-lg-3 mt-3" value="Kembali" onclick="window.history.go(-1)">
                    <input type="submit" class="btn btn-primary col-lg-3 mt-3" value="Update">
                </div>
            </form>

            
        </div>
    </div>
</div>
</div>