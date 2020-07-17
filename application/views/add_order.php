<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Order</title>
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
                        Form Add Order
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('index.php/order/store') ?>" method="post">
                            <div class="form-group">
                                <label for="">Produk</label>
                                <input type="text" name="product" class="form-control" placeholder="Product">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" placeholder="Jumlah">
                            </div>
                            <div class="form-group">
                                <label for="">Total</label>
                                <input type="number" name="total" class="form-control" placeholder="Total">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
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