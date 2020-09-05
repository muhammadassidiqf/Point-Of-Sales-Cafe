<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="box-body">
        <div class="row">
            <div class="form-group col-md-6 ">
                <form action="<?= base_url('item/edit') ?>" method="post">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?= $item['id_item'] ?>" readonly>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= $item['name'] ?>" required>
                        <small class="form-text text-danger"><?= form_error('name'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" class="form-control">
                            <option value="">- Pilih -</option>
                            <?php foreach ($category as $c) : ?>
                                <option value="<?= $c['id_category']; ?>"><?= $c['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <select name="unit" class="form-control">
                            <option value="">- Pilih -</option>
                            <?php foreach ($unit as $u) : ?>
                                <option value="<?= $u['id_unit']; ?>"><?= $u['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?= $item['price'] ?>" required>
                        <small class=" form-text text-danger"><?= form_error('price'); ?></small>
                    </div>
                    <input class="btn btn-success" type="submit" name="submit" value="Edit" />
                </form>
            </div>

        </div>

    </div>
    <!-- End of Main Content -->