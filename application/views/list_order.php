<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .row {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        List Data Order
                        <div class="btn-group float-right">
                            <a href="<?= base_url('index.php/order/create') ?>" class="btn btn-success">Tambah</a>
                            <a href="<?= base_url('index.php/order/form_export') ?>" class="btn btn-primary" target="_blank">Export</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Tanggal</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach($orders->result_array() as $data) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['product'] ?></td>
                                    <td><?= $data['tanggal'] ?></td>
                                    <td><?= $data['jumlah'] ?></td>
                                    <td class="text-left"><?= 'Rp. '.number_format($data['total'], 2, ',' , '.') ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Script -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>