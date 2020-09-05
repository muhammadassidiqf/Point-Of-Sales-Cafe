<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="box-body">
        <div class="row">
            <div class="form-group col-md-6 ">
                <form action="<?= base_url('customer/edit') ?>" method="post">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $customer['id_customer'] ?>" readonly>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $customer['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option value="">- Pilih -</option>
                            <option value="-">-</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= $customer['phone'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?= $customer['address'] ?>" required>
                    </div>
                    <input class="btn btn-success" type="submit" name="submit" value="Edit" />
                </form>
            </div>

        </div>

    </div>
    <!-- End of Main Content -->