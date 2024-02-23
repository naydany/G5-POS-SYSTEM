<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow ">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
            <a href="/form_create" class="btn btn-primary">Create Product</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Code</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        require "database/database.php";
                        require "models/item.model.php";

                        $products = getItem();
                        // print_r($products);
                        foreach ($products as $pro) :
                        ?>
                            <tr>
                                <td><?= $pro['pro_id'] ?></td>
                                <td><?= $pro['pro_name'] ?></td>
                                <td><?= $pro['pro_code'] ?></td>
                                <td><?= $pro['pro_img'] ?></td>
                                <td><?= $pro['pro_price'] ?></td>
                                <td><?= $pro['cate_id'] ?></td>
                                <td><?= $pro['pro_quantity'] ?></td>
                                <td>
                                    <a href="" class="btn btn-success">Update</a>
                                </td>
                                <td>
                                    <a href="../../controllers/items/delete_item.controller.php?id=<?= $pro['pro_id'] ?>" class="btn btn-danger">Delete</a>
                                </td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->