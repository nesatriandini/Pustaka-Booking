<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <h3><?= $judul; ?></h3>
    <div class="row">
        <div class="col-lg-6">
             
            
             <?= form_open_multipart('buku/ubahBuku/' . $buku['id']); ?>

                
                <div class="form-group">
                    <label for="judul_buku" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control" id="judul_buku" value="<?= $buku['judul_buku']; ?>" name="judul_buku" placeholder="masukan judul buku">
                     <?= form_error('judul_buku','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                <label for="kategori" class="form-label">Kategori Buku</label>
                    <select name="kategori" class="form-control form-control-user">
                        
                        <?php foreach ($kategori as $k) { ?>
                            <option value="<?= $k['id'];?>"><?= $k['kategori'];?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="pengarang" class="form-label">Pengarang</label>
                    <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= $buku['pengarang']; ?>">
                    <?= form_error('pengarang','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="penerbit" class="form-label">Penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $buku['penerbit']; ?>">
                     <?= form_error('penerbit','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <!-- <div class="form-group">
                    <label for="tahun_terbit" class="form-label">tahun_terbit</label>
                    <input type="text" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= $buku['tahun_terbit']; ?>">
                     <?= form_error('tahun_terbit','<small class="text-danger pl-3">', '</small>'); ?>
                </div> -->
                <div class="form-group">
                    <label for="isbn" class="form-label">Tahun Terbit</label>
                    <select name="tahun_terbit" class="form-control form-control-user">
                        <option><?= $buku['tahun_terbit']; ?></option>
                        <?php for ($i=date('Y'); $i > 1000 ; $i--) { ?>
                            <option value="<?= $i;?>"><?= $i;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="isbn" class="form-label">Nomor ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" value="<?= $buku['isbn']; ?>">
                     <?= form_error('isbn','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="text" class="form-control" id="stok" name="stok" value="<?= $buku['stok']; ?>">
                     <?= form_error('stok','<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
                <div class="form-group row">
                <div class="col-sm-2">Gambar</div>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-3">
                                <img src="<?= base_url('./assets/img/upload/') . $buku['image']; ?>" class="img-thumbnail" alt="">
                            </div>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <label class="custom-file-label" for="image"><?= $buku['image']; ?></label>
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-dark" value="Kembali" onclick="window.history.go(-1)">Kembali</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            <?= form_close(); ?>

            
        </div>
    </div>
</div>
</div>