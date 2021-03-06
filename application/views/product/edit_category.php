<div class="container-fluid">

    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>

    <!-- Card  -->
    <div class="card mb-3">
        <div class="card-header">

            <a href="<?php echo site_url('category/') ?>"><i class="fas fa-arrow-left"></i>
                Back</a>
        </div>
        <div class="card-body">

            <form action="<?= site_url('category/edit') ?>" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $category['id_category'] ?>" />

                <div class="form-group">
                    <label for="name">Name*</label>
                    <input class="form-control <?php echo form_error('name') ? 'is-invalid' : '' ?>" type="text" name="name" placeholder="Category name" value="<?php echo $category['name'] ?>" required />
                </div>

                <input class="btn btn-success" type="submit" name="submit" value="Save" />
            </form>

        </div>

        <div class="card-footer small text-muted">
            * required fields
        </div>


    </div>


</div>