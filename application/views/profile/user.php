<div class="card p-2 shadow-sm border-bottom-primary">
    <div class="card-header bg-white">
        <h4 class="h5 align-middle m-0 font-weight-bold text-success">
            <i class="fas fa-fw fa-users"></i> <?= userdata('nama'); ?>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 mb-4 mb-md-0">
                <img src="<?= base_url() ?>assets/img/avatar/<?= userdata('foto'); ?>" alt="" class="img-thumbnail rounded mb-2">
                
            </div>
            <div class="col-md-10">
                <table class="table">
                    <tr>
                        <th width="200">Username</th>
                        <td><?= userdata('username'); ?></td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td><?= userdata('email'); ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Telepon</th>
                        <td><?= userdata('no_telp'); ?></td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td class="text-capitalize"><?= userdata('role'); ?></td>
                    </tr>
					<tr>
					<td>
					<a style="width:150px" href="<?= base_url('profile/setting'); ?>" class="btn btn-sm btn-block btn-success"><i class="fa fa-edit"></i> Edit Profile</a>
					</td><td>
					<a style="width:150px" href="<?= base_url('profile/ubahpassword'); ?>" class="btn btn-sm btn-block btn-success"><i class="fa fa-lock"></i> Ubah Password</a>
					</td>
					</tr>
                </table>
            </div>
        </div>
    </div>
</div>