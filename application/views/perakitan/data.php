<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-success">
                    <i class="fas fa-fw fa-cogs"></i> Data Perakitan
                </h4>
            </div>
            <?php if (is_admin()) : ?>
            <div class="col-auto">
                <a href="<?= base_url('perakitan/add') ?>" class="btn btn-sm btn-success btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Perakitan
                    </span>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive" id="dataTable">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th>ID Perakitan</th>
                    <th>Nama Lift</th>
                    <th>Komponen</th>
                    <th>Transaksi</th>
                    <th>Nama Karyawan</th>
                    <th>Desain</th>
                    <?php if (is_admin()) : ?>
                        <th width="5%">Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($perakitan) :
                    foreach ($perakitan as $p) :
                        ?>
                        <tr>
                            <td class="text-center"><?= $no++; ?></td>
                            <td><?= $p['id_perakitan']; ?></td>
                            <td><?= $p['nama_lift']; ?></td>
                            <td><?= $p['komponen']; ?></td>
                            <td><?= $p['id_barang_keluar']?></td>
                            <td><?= $p['nama']?></td>
                            <td>
                                <a href="<?= base_url(); ?>upload/<?= $p["desain"] ?>"><img width="50px" height="50px" src="<?= base_url(); ?>upload/<?= $p["desain"] ?>"></a> 
                            </td>
                            <?php if (is_admin()) : ?>
                            <td class="text-center">
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('perakitan/delete/') . $p['id_perakitan'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                            <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>