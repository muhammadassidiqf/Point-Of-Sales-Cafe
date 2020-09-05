<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div>
        <div>
            <?= form_error('supplier', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb3" data-toggle="modal" data-target="#newSupplierModal">Add new Supplier</a>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($supplier as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $s->name; ?></td>
                            <td><?= $s->phone; ?></td>
                            <td><?= $s->address; ?></td>
                            <td><?= $s->description; ?></td>
                            <td>
                                <?php echo anchor('supplier/edit/' . $s->id_supplier, 'Edit'); ?> |
                                <?php echo anchor('supplier/delete/' . $s->id_supplier, 'Delete'); ?>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="newSupplierModal" tabindex="-1" role="dialog" aria-labelledby="newSupplierModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSupplierModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('supplier/add'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name...">
                    </div>
                    <div class="form-group">
                        <label for="useremail">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Number Phone...">
                    </div>
                    <div class="form-group">
                        <label for="useremail">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address...">
                    </div>
                    <div class="form-group">
                        <label for="useremail">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Description...">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>