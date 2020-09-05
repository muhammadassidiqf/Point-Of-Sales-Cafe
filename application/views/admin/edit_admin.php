<div class="container-fluid">

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <!-- Card  -->
    <div class="card mb-3">
        <div class="card-header">

            <a href="<?php echo site_url('admin/') ?>"><i class="fas fa-arrow-left"></i>
                Back</a>
        </div>
        <div class="card-body">

            <form action="<?= site_url('admin/edit') ?>" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $admin['id'] ?>" />

                <div class="form-group">
                    <label for="role">Role ID</label>
                    <input class="form-control" type="text" name="role" placeholder="Role ID" value="<?php echo $admin['role_id'] ?>" required />
                </div>

                <input class="btn btn-success" type="submit" name="submit" value="Save" />
            </form>

        </div>

        <div class="card-footer small text-muted">
            * required fields
        </div>


    </div>


</div>