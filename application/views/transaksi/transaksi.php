<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div>
        <div>
            <?= form_error('unit', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col" class="text-center">Date</th>
                        <th scope="col" class="text-center">Kasir</th>
                        <th scope="col" class="text-center">Product</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="text-center">Qty</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($transaksi as $t) : ?>
                        <tr>
                            <th style="width: 5%;"><?= $i; ?></th>
                            <td class="text-center"><?= $t['date']; ?></td>
                            <td class="text-center"><?= $t['transaksi_id']; ?></td>
                            <td class="text-center"><?= $t['product']; ?></td>
                            <td class="text-center"><?= $t['harga']; ?></td>
                            <td class="text-center"><?= $t['qty']; ?></td>
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