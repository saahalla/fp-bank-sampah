<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4" style="max-width: 400px;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add price</h6>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('trash/add') ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="category" placeholder="Enter Trash Category" name="category" value="<?= set_value('category') ?>">
                    <?= form_error('category', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control form-control-user" id="price" placeholder="Enter Price" name="price" value="<?= set_value('price') ?>">
                    <?= form_error('price', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Add
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->