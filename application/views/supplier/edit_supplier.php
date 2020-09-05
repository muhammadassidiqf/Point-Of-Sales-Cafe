<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="box-body">
        <div class="row">
            <div class="form-group col-md-6 ">
                <form action="<?= base_url('supplier/edit') ?>" method="post">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $supplier['id_supplier'] ?>" readonly>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $supplier['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="<?= $supplier['phone'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="<?= $supplier['address'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" id="description" name="description" value="<?= $supplier['description'] ?>">
                    </div>
                    <input class="btn btn-success" type="submit" name="submit" value="Edit" />
                </form>
            </div>

        </div>

    </div>
    <!-- End of Main Content -->