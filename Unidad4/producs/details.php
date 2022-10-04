<?php
    include '../app/ProductsController.php';
    $producto = new ProductsController();
    $productos = $producto -> getProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../layouts/head.php" ?>
</head>
<body>
    <!-- navbar -->
    <?php include "../layouts/nadvar.php" ?>

    <!-- container -->
    <div class="container-fluid">

        <div class="row">
            <!-- sidebar -->
            <?php include "../layouts/sidebar.php" ?>

            <!-- contenido -->
            <div class="col-lg-10 col-sm-12 bg-white">

                <!--bead-->
                <div class="border-bottom">
                    <div class="row m-2">
                        <div class="col">
                            <h4>Productos</h4>
                        </div>
                        <div class="col">
                            <button class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#createProductModel">Añadir producto</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($productos as $key => $item): ?> 
                        <div class="col-md-3 col-sm-10 p-2 ">
                            <div class="card mb-1 ">
                                <img src="<?php echo $item->cover ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-center"><?php echo $item->name ?></h5>
                                    <h6 class="card-subtitle text-center"><i><?php echo $item->categories[0]->name ?></i></h6>
                                    <p class="card-text" style="text-align: justify;"><?php echo $item->description ?></p>
                                    <div class="row">
                                        <a href="details.php" class="btn btn-info col-12">Detalles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
            </div>
        </div>
    </div>

    <!--Modal-->
    <div class="modal fade" id="createProductModel" tabindex="-1" aria-labelledby="createProductModelLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createProductModelLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php for ($i=0; $i < 6; $i++) {?> 
                    <div class="input-group mb-3">
                      <label class="text-center">
                          Correo electronico
                      </label>
                      <span class="input-group-text" id="basic-addon1">@</span>
                      <input type="text" class="form-control" placeholder="Correo@examp.com" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                <?php } ?> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

    <?php include "../layouts/scripts.php" ?>
    
    <script>
        function remove (target) {
            swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
                });
            } else {
                swal("Your imaginary file is safe!");
            }
            });
        }
    </script>
</body>
</html>