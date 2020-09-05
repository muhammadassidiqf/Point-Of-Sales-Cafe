<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div>
        <div>
            <?= form_error('customer', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb3" data-toggle="modal" data-target="#newCustomerModal">Add new Customer</a>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($customer as $c) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $c->id_customer ?>">
                            <td><?php echo $c->name ?></td>
                            <td><?php echo $c->gender ?></td>
                            <td><?php echo $c->phone ?></td>
                            <td><?php echo $c->address ?></td>
                            <td>
                                <?php echo anchor('customer/edit/' . $c->id_customer, 'Edit'); ?> |
                                <?php echo anchor('customer/delete/' . $c->id_customer, 'Delete'); ?>
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
<div class="modal fade" id="newCustomerModal" tabindex="-1" role="dialog" aria-labelledby="newCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newCustomerModalLabel">Add New Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('customer/add'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name..." required>
                    </div>
                    <div class="form-group">
                        <label for="useremail">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="-">- Pilih -</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="useremail">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Number Phone..." required>
                    </div>
                    <div class="form-group">
                        <label for="useremail">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address..." required>
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