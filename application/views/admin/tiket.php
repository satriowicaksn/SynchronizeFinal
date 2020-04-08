<div class="col-lg-12">
	<?= $this->session->flashdata('notif'); ?>
	<div class="card">
		<div class="card-body">
			<div class="card-title">
				<h4>Tiket</h4>
			</div>
      <br>
      <div class="mb-3">
        <button class="btn btn-block btn-warning col-3 ml-3" data-toggle="modal" data-target="#tambah_data"><i
            class="fa fa-fw fa-plus-circle"></i> Tambah Tiket</button>
			</div>
      <br>
			<div class="table-responsive">
				<table class="table table-hover text-center">
					<thead>
						<tr>
							<th>#</th>
							<th>Tiket</th>
              <th>Harga</th>
              <th>Stok</th>
							<th class="text-center">Hapus</th>
						</tr>
					</thead>
					<tbody>

						<?php $no=1; foreach($tiket as $t) { ?>
						<tr>
							<th><?= $no++; ?></th>
							<td><?= $t->kelas; ?></td>
              <td>pp</td>
              <td>56</td>
							<td class="text-center"><a class="btn btn-sm btn-warning"
									href="<?=base_url('admin/admin/delete_admin');?>/<?= $t->id_tiket ?>"><i class="fa fa-fw fa-edit"></i></a>
                  <a class="btn btn-sm btn-danger"
    									href="<?=base_url('admin/admin/delete_admin');?>/<?= $t->id_tiket ?>"
    									onClick="return confirm('Yakin?');"><i class="fa fa-fw fa-trash"></i></a>

                </td>
							<!-- <td class="text-center"><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDelete"><i class="fa fa-fw fa-trash"></i></button></td> -->
						</tr>
						<?php } ?>

					</tbody>
				</table>
			</div>
		</div>

	</div>
	<!-- /# card -->
</div>
<!-- MODAL TAMBAH FOTO -->
<div id="tambah_data" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
	aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-fw fa-star"></i> Tambah Tiket</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php echo form_open("index.php/admin/galeri/tambah", array('enctype'=>'multipart/form-data')); ?>
				<h5 class="mb-3 text-danger">* Data ini akan ditampilkan sesuai dengan di halaman
					web</h5>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Kelas Tiket <b
  							class="text-danger">*</b></label>
                <div class="col-sm-10">
                  <input type="text" name="kelas" class="form-control">
                </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Harga Tiket <b
                class="text-danger">*</b></label>
                <div class="col-sm-10">
                  <input type="text" name="harga" class="form-control">
                </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Stok Tiket <b
                class="text-danger">*</b></label>
                <div class="col-sm-10">
                  <input type="text" name="stok" class="form-control">
                </div>
          </div>
				<input type="submit" class="btn btn-danger btn-block" name="submit" value="SIMPAN">


				<?php echo form_close(); ?>

			</div>
		</div>
	</div>
</div>
<!-- END MODAL -->


<!-- MODAL HAPUS -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Hapus Admin</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<b>*Anda yakin akan menghapus akun admin ?</b>
			</div>
			<div class="modal-footer">

				<a href="<?= base_url('admin/admin/delete_admin'); ?>/<?= $a->id_admin ?>" class="btn btn-danger">Hapus</a>
			</div>
		</div>
	</div>
</div>
<!-- END MODAL HAPUS -->
