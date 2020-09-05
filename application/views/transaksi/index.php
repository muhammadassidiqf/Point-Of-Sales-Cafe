    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php echo form_open('transaksi', array('class' => 'form-horizontal')); ?>
                        <div class="form-group">
                            <label for="product">Product</label>
                            <select name="name" class="form-control">
                                <option value="">- Pilih -</option>
                                <?php foreach ($item as $i) : ?>
                                    <option value="<?= $i['name'] ?>"><?= $i['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="text" name="qty" placeholder="QTY" class="form-control">
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | <?php echo anchor('transaksi/selesai_belanja', 'Selesai', array('class' => 'btn btn-success btn-sm')) ?>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /. PANEL  -->
            </div>


            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Product</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    $total = 0;
                                    foreach ($detail as $r) { ?>
                                        <tr class="gradeU">
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $r->product . ' - ' . anchor('transaksi/hapusitem/' . $r->id_transaksi, 'Hapus', array('style' => 'color:red;')) ?></td>
                                            <td><?php echo $r->qty ?></td>
                                            <td>Rp. <?php echo number_format($r->harga, 2) ?></td>
                                            <td>Rp. <?php echo number_format($r->qty * $r->harga, 2) ?></td>
                                        </tr>
                                    <?php $total = $total + ($r->qty * $r->harga);
                                        $no++;
                                    } ?>
                                    <tr class="gradeA">
                                        <td colspan="4">T O T A L</td>
                                        <td>Rp. <?php echo number_format($total, 2); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /. TABLE  -->
                    </div>
                </div>
            </div>
        </div>
    </div>