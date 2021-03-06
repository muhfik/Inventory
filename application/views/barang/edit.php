<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-success">
                            Form Edit Barang
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('barang') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('', [], ['stok' => 0, 'id_barang' => $barang['id_barang']]); ?>
                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="nama_barang">Nama Barang</label>
                    <div class="col-md-10">
                        <input autocomplete="off" value="<?= set_value('nama_barang', $barang['nama_barang']); ?>" name="nama_barang" id="nama_barang" type="text" class="form-control" placeholder="Nama Barang">
                        <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="koordinat_id">Koordinat Barang</label>
                    <div class="col-md-10">
                        <div class="input-group">
                            <select name="koordinat_id" id="koordinat_id" class="custom-select">
                                <option value="" selected disabled>Pilih Koordinat Barang</option>
                                <?php foreach ($koordinat as $j) : ?>
                                    <option <?= $barang['koordinat_id'] == $j['id_koordinat'] ? 'selected' : ''; ?> <?= set_select('koordinat_id', $j['id_koordinat']) ?> value="<?= $j['id_koordinat'] ?>"><?= $j['koordinat'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-success" href="<?= base_url('koordinat/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('koordinat_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 text-md-right" for="satuan_id">Satuan Barang</label>
                    <div class="col-md-10">
                        <div class="input-group">
                            <select name="satuan_id" id="satuan_id" class="custom-select">
                                <option value="" selected disabled>Pilih Satuan Barang</option>
                                <?php foreach ($satuan as $s) : ?>
                                    <option <?= $barang['satuan_id'] == $s['id_satuan'] ? 'selected' : ''; ?> <?= set_select('satuan_id', $s['id_satuan']) ?> value="<?= $s['id_satuan'] ?>"><?= $s['nama_satuan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-success" href="<?= base_url('satuan/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('satuan_id', '<small class="text-danger">', '</small>'); ?>
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