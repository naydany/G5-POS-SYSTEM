<div class="container">
    <div class="card-header py-3 d-flex justify-content-between ">
        <div class="card-header border-0">
            <a href="/orders" class="btn btn-outline-primary">
                <i class="fas fa-plus"></i> <i class="fas fa-utensils"></i>
                Make A New Order
            </a>
        </div>
        <div class="d-flex">
            <div class="card-header border-0">
                <a href="/path_payment" class="btn btn-outline-primary">
                    <i class="fas fa-plus"></i> <i class="bi bi-currency-dollar"></i>
                    Start to Pay
                </a>
            </div>
        </div>
    </div>
   

    <div class="container mt-3">
        <table class="table table-bordered text-center mt-2 rounded">
            <thead class="text-secondary thead-light">
                <tr>
                    <th class="text-center">Code</th>
                    <th class="text-center">Products</th>
                    <th class="text-center">Total Price</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $payments = getPayments();
                foreach ($payments as $payment) :
                ?>
                    <tr>
                        <td class="text-center"><?= $payment['pay_code'] ?></td>
                        <td class="text-center"><?= $payment['pro_name'] ?></td>
                        <td class="text-center"><?= $payment['pay_totalprice'] ?></td>
                        <td class="text-center"><?= $payment['pay_date'] ?></td>
                        <td class="text-center">
                            <div class="btn-group">

                                <i class="bi bi-credit-card btn btn-lg ml-3 text-success" data-toggle="modal" data-target="#formpayment<?= $payment['pay_id'] ?>" style="font-size: 24px;"></i>

                                <a onclick="return confirm('Do you want to cancel this payment?')" href="controllers/payments/cancel_payment.controller.php?id=<?= $payment['pay_id'] ?>">
                                    <i class="bi bi-x-circle text-danger btn btn-lg ml-3"></i>
                                </a>
                            </div>
                        </td>
                    </tr>


                    <!-- Payment Form -->
                    <div class="modal fade" id="formpayment<?= $payment['pay_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="d-flex justify-content-center modal-content">
                                <div class="card p-5">
                                    <div>
                                        <h4 class="text-danger">Payments</h4>
                                        <hr>
                                    </div>
                                    <form action="controllers/payments/form.payment.controller.php" class='d-flex flex-xl-column' method='post' id="payForm">
                                        <input type="hidden" value="<?= $payment['pay_id'] ?>">

                                        <div class="form-group">
                                            <label for="name">Code</label>
                                            <input type="text" class="form-control" name="code" value="<?= $payment['pay_code'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="product">Product</label>
                                            <input type="text" class="form-control" name="product" value="<?= $payment['pro_name'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="total price">Total Price</label>
                                            <input type="text" class="form-control" name="total_price" value="<?= $payment['pay_totalprice'] ?>$">
                                        </div>

                                        <div class="form-group">
                                            <label>Card</label>
                                            <div class="input-group mb-3">
                                                <select class="custom-select" id="inputGroupSelect01" name="supplier">
                                                    <option selected>Choose card...</option>
                                                    <option>Paypal</option>
                                                    <option>ABA</option>
                                                    <option>AC</option>
                                                    <option>Visa Card</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </tbody>
        <?php endforeach; ?>
        </table>
    </div>
    <?php
    $news = getPayments();
    $ToTal = 0;
    foreach ($news as $new) {
        $ToTal +=  $new['pay_totalprice'];
    }
    ?>
    <h3 class="bg-success border border-primary rounded p-1 pl-4 m-4 text-white">Total : <?php echo $ToTal ?>$</h3>
    <div class="d-flex justify-content-end">
        <div class="align-self-end ">
            <a href="/old_payment" class="btn btn-outline-primary mr-4">
                <i class="fas fa-plus"></i> <i class="bi bi-currency-dollar"></i>
                Start to Pay
            </a>
        </div>
    </div>
</div>
<?php require "views/payments/old_payment.view.php"; ?>
</div>
