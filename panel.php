<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario </title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif !important;
        }

        .main {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header {
            text-align: center;
            font-size: 40px;
            font-weight: bold;
            padding: 20px;
            width: 100%;
        }

        .product-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 80%;
            height: 680px;
            margin: 35px;
            border-radius: 30px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }

        .product-header {
            display: flex;
            align-items: center;
            width: 95%;
            height: 50px;
            margin-top: 20px;
        }

        .product-header h3 {
            font-weight: bold;
        }

        .dataTables_wrapper {
            position: relative;
            width: 95% !important;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            padding: 20px;
            border-radius: 10px;
            height: 83%;
            text-align: center !important;
        }

        .dataTables_info {
            position: absolute;
            bottom: 10px;
            left: 10px;
        }

        .dataTables_paginate {
            position: absolute;
            bottom: 10px;
            right: 0px;
        }

        table.dataTable thead>tr>th.sorting,
        table.dataTable thead>tr>th.sorting_asc,
        table.dataTable thead>tr>th.sorting_desc,
        table.dataTable thead>tr>th.sorting_asc_disabled,
        table.dataTable thead>tr>th.sorting_desc_disabled,
        table.dataTable thead>tr>td.sorting,
        table.dataTable thead>tr>td.sorting_asc,
        table.dataTable thead>tr>td.sorting_desc,
        table.dataTable thead>tr>td.sorting_asc_disabled,
        table.dataTable thead>tr>td.sorting_desc_disabled {
            text-align: center;
        }

        td {
            text-align: center;
        }

        .modal-content {
            margin-top: 100px !important;
        }
    </style>
</head>

<body>

    <div class="main">
        <div class="header alert alert-dark" role="alert"> <img src="Images/logo.png" width="280" height="60" /> Inventario TI</div>

        <div class="product-container">

            <div class="product-header mb-2">
                <h3>Listado de Asignación</h3>

                <div class="button-group ml-auto">
                    <button type="button" class="btn btn-success" onclick="exportToExcel()">Exportar a Excel</button>
                    <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#addProductModal">Agregar</button>
                </div>
            </div>

            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProduct" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content mt-5">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProduct">Agregar </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="./endpoint/add-product.php" method="POST">
                                <div class="form-group">
                                    <label for="productName">Colaborador:</label>
                                    <input type="text" class="form-control" id="productName" name="product_name">
                                </div>
                                <div class="form-group">
                                    <label for="productCode">Equipo:</label>
                                    <input type="text" class="form-control" id="productCode" name="product_code">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="quantity">Marca / Serie:</label>
                                            <input type="text" class="form-control" id="quantity" name="quantity">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="price">Accesorios:</label>
                                            <input type="text" class="form-control" id="price" name="price">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary form-control mt-1 mb-1">Guardar Cambios</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="updateProductModal" tabindex="-1" aria-labelledby="updateProduct" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content mt-5">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateProduct">Actualizar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="./endpoint/update-product.php" method="POST">
                                <div class="form-group" hidden>
                                    <label for="updateProductID">ID</label>
                                    <input type="text" class="form-control" id="updateProductID" name="tbl_product_id">
                                </div>
                                <div class="form-group">
                                    <label for="updateProductName">Colaborador:</label>
                                    <input type="text" class="form-control" id="updateProductName" name="product_name">
                                </div>
                                <div class="form-group">
                                    <label for="updateProductCode">Equipo:</label>
                                    <input type="text" class="form-control" id="updateProductCode" name="product_code">
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="updateQuantity">Marca / Serie:</label>
                                            <input type="text" class="form-control" id="updateQuantity" name="quantity">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="updatePrice">Accesorios:</label>
                                            <input type="text" class="form-control" id="updatePrice" name="price">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary form-control mt-1 mb-1">Guardar Cambios</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-hover product-table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Colaborador</th>
                        <th scope="col">Equipo</th>
                        <th scope="col">Marca / Serie</th>
                        <th scope="col">Accesorios</th>
                        <th scope="col">Fecha de Actualización</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include('./conn/conn.php');

                    $stmt = $conn->prepare("SELECT * FROM tbl_product");
                    $stmt->execute();

                    $result = $stmt->fetchAll();

                    foreach ($result as $row) {
                        $productID = $row['tbl_product_id'];
                        $productName = $row['product_name'];
                        $productCode = $row['product_code'];
                        $quantity = $row['quantity'];
                        $price = $row['price'];
                        $date = $row['date'];
                    ?>

                        <tr>
                            <th scope="row" id="productID-<?= $productID ?>"><?= $productID ?></th>
                            <td id="productName-<?= $productID ?>"><?= $productName ?></td>
                            <td id="productCode-<?= $productID ?>"><?= $productCode ?></td>
                            <td id="quantity-<?= $productID ?>"><?= $quantity ?></td>
                            <td id="price-<?= $productID ?>"><?= $price ?></td>
                            <td id="date-<?= $productID ?>"><?= $date ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" style="font-size: 12px;" onclick="updateProduct(<?= $productID ?>)">Editar</button>
                                <button type="button" class="btn btn-danger" style="font-size: 12px;" onclick="deleteProduct(<?= $productID ?>)">Eliminar</button>
                            </td>
                        </tr>

                    <?php
                    }

                    ?>

                </tbody>
            </table>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('.product-table').DataTable();
        });

        function updateProduct(id) {
            $("#updateProductModal").modal("show");

            let updateProductID = $("#productID-" + id).text();
            let updateProductName = $("#productName-" + id).text();
            let updateProductCode = $("#productCode-" + id).text();
            let updateQuantity = $("#quantity-" + id).text();
            let updatePrice = $("#price-" + id).text();

            $("#updateProductID").val(updateProductID);
            $("#updateProductName").val(updateProductName);
            $("#updateProductCode").val(updateProductCode);
            $("#updateQuantity").val(updateQuantity);
            $("#updatePrice").val(updatePrice);
        }

        function deleteProduct(id) {
            if (confirm('Deseas eliminar este producto?')) {
                window.location.href = "./endpoint/delete-product.php?product=" + id;
            }
        }

        function exportToExcel() {
        
            var table = $('.product-table').DataTable();
            var data = table.rows().data().toArray();

            var filteredData = data.map(function(row) {
                return row.slice(0, row.length - 1);
            });

            var ws = XLSX.utils.aoa_to_sheet([
                ['ID', 'Colaborador', 'Equipo', 'Marca / Serie', 'Accesorios', 'Fecha de actualización']
            ].concat(filteredData));

            var wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, 'wiliam r. tinoco');
                     XLSX.writeFile(wb, 'inventario-excel.xlsx');
        }
    </script>
</body>

</html>