<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">My Transaction</h6>
            <button class="btn border border-primary">Saldo: <?= 'Rp' . number_format($saldo, 2, ",", "."); ?></button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Category</th>
                            <th>Weight</th>
                            <th>Price (/kg)</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($transaction as $trx) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $trx['name'] ?></td>
                                <td><?= $trx['category'] ?></td>
                                <td><?= $trx['weight'] . ' kg' ?></td>
                                <td><?= 'Rp.' . number_format($trx['price'], 2, ",", ".") . '/kg' ?></td>
                                <td><?= 'Rp.' . number_format($trx['total_price'], 2, ",", ".") ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->