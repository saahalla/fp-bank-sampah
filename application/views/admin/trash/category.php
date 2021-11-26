<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Trash Price</h6>
        </div>
        <div class="card-body">

            <a class="btn btn-primary mb-4" href="<?= base_url('trash/add') ?>">Add Category</a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($trash_category as $ctg) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $ctg['category'] ?></td>
                                <td><?= 'Rp.' . number_format($ctg['price'], 2, ",", ".") . '/kg' ?></td>
                                <td>
                                    <a class="btn btn-sm text-info" href="<?= base_url('trash/edit?id=' . $ctg['id']) ?>"><i class="fas fa-fw fa-edit"></i>Edit</a>
                                    <a class="btn btn-sm text-danger" href="<?= base_url('trash/delete?id=' . $ctg['id']) ?>"><i class="fas fa-fw fa-trash"></i>Delete</a>
                                </td>

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