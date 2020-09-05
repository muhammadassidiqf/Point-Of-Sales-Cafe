<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div>
        <div>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb3" data-toggle="modal" data-target="#newItemModal">Add new items</a>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($item as $u) : ?>
                        <tr>
                            <th style="width: 5%;"><?= $i; ?></th>
                            <input type="hidden" class="form-control" name="id_item" id="id_item" value="<?= $u->id_item; ?>">
                            <td><?= $u->name; ?></td>
                            <td><?= $u->id_category; ?></td>
                            <td><?= $u->id_unit; ?></td>
                            <td><?= $u->price; ?></td>
                            <td class="text-center" width="160px">
                                <?php echo anchor('item/edit/' . $u->id_item, 'Edit'); ?> |
                                <?php echo anchor('item/delete/' . $u->id_item, 'Delete'); ?>
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
<div class="modal fade" id="newItemModal" tabindex="-1" role="dialog" aria-labelledby="newItemModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newItemModalLabel">Add New items</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('item/add'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name items...">
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
                            <?php foreach ($unit as $u) { ?>
                                <option value="<?= $u['id_unit']; ?>"><?= $u['name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Price items...">
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