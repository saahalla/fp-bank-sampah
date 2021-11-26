<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4" style="max-width: 400px;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Sell Trash</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('trash/sell') ?>">
                <div class="form-group">
                    <select class="form-control" name="category" id="category">
                        <?php foreach ($trash_category as $ctg) : ?>
                            <option value="<?= $ctg['id']; ?>"><?= $ctg['category']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?= form_error('category', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control form-control-user" id="weight" placeholder="Enter weight (kg)" name="weight" value="<?= set_value('weight') ?>">
                    <?= form_error('weight', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Sell
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->