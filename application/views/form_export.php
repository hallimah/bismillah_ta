<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Export</title>
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
                        Form Export
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('index.php/order/export') ?>" method="post" target="_blank">
                            <div class="form-group">
                                <label for="">Tanggal Awal</label>
                                <input type="date" name="tanggal_awal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Akhir</label>
                                <input type="date" name="tanggal_akhir" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Buka Laporan</button>
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