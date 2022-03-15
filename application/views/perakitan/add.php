<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-success">
                            Form Input Perakitan
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('perakitan') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open_multipart('Perakitan/simpan_perakitan'); ?>
                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="id_perakitan">ID Perakitan</label>
                    <div class="col-md-10">
                        <input readonly value="<?= set_value('id_perakitan', $id_perakitan); ?>" name="id_perakitan" id="id_perakitan" type="text" class="form-control" placeholder="ID Perakitan">
                        <?= form_error('id_perakitan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="nama_lift">Nama Lift</label>
                    <div class="col-md-10">
                        <input autocomplete="off" value="<?= set_value('nama_lift'); ?>" name="nama_lift" id="nama_lift" type="text" class="form-control" placeholder="Nama Lift">
                        <?= form_error('nama_lift', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="barang_id">Komponen</label>
                    <div class="col-md-10">
                        <div class="input-group">
                            <select name="komponen[]" id="komponen" class="custom-select"  multiple>
                            <option value="" disabled required >--Pilih Komponen--</option>
                                <?php foreach ($barang as $b) : ?>
                                    <option <?= set_select('barang_id', $b['nama_barang']) ?> value="<?= $b['nama_barang'] ?>"><?= $b['nama_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('barang_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="barang_keluar_id">Transaksi</label>
                    <div class="col-md-10">
                        <div class="input-group">
                            <select name="barang_keluar_id" id="barang_keluar_id" class="custom-select">
                                <option value="" selected disabled>Pilih Transaksi</option>
                                <?php foreach ($barangkeluar as $bk) : ?>
                                    <option <?= set_select('barang_keluar_id', $bk['id_barang_keluar']) ?> value="<?= $bk['id_barang_keluar'] ?>"><?= $bk['id_barang_keluar'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('barang_keluar_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>   
                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="user_id">Operator</label>
                    <div class="col-md-10">
                        <div class="input-group">
                            <select name="user_id" id="user_id" class="custom-select">
                                <option value="" selected disabled>Pilih Operator</option>
                                <?php foreach ($users as $user) : ?>
                                    <option <?= set_select('user_id', $user['id_user']) ?> value="<?= $user['id_user'] ?>"><?= $user['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('user_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="desain">Desain</label>
                    <div class="col-md-10">
                        <input autocomplete="off" value="<?= set_value('desain'); ?>" name="desain" id="desain" type="file" class="form-control" placeholder="Desain">
                        <?= form_error('desain', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col offset-md-2">
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