<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div>
        <div>
            <?= form_error('category', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb3" data-toggle="modal" data-target="#newCategoryModal">Add new Categories</a>
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($category as $c) : ?>
                        <input type="hidden" name="id" value="<?php echo $c->id_category ?>" readonly />
                        <tr>
                            <th class="text-center" style="width: 5%;"><?= $i; ?></th>
                            <td width="150" class="text-center">
                                <?= $c->name; ?>
                            </td>
                            <td width="50" class="text-center">
                                <?php echo anchor('category/edit/' . $c->id_category, 'Edit'); ?> |
                                <?php echo anchor('category/delete/' . $c->id_category, 'Delete'); ?>
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
<div class="modal fade" id="newCategoryModal" tabindex="-1" role="dialog" aria-labelledby="newCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newCategoryModalLabel">Add New Categories</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('category/add'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name Categories">
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