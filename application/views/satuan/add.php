<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-success">
                            Form Tambah Satuan
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('satuan') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open(); ?>
                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="nama_satuan">Nama Satuan</label>
                    <div class="col-md-10">
                        <input autocomplete="off" value="<?= set_value('nama_satuan'); ?>" name="nama_satuan" id="nama_satuan" type="text" class="form-control" placeholder="Nama Satuan">
                        <?= form_error('nama_satuan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-10 offset-md-2">
                        <button type="submit" class="btn btn-success btn-icon-split">
                            <span class="icon"><i class="fa fa-save"></i></span>
						<span class="text">Simpan</span>
						</button>
                        <button type="reset" class="btn btn-warning btn-icon-split">
                            <span class="icon"><i class="fa fa-times"></i></span>
						<span class="text">Reset</span>
						</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>