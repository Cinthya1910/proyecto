<!DOCTYPE html>
    <html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="boostrap.min.css">
    <script src="https://kit.fontawesome.com/bcf1594f44,js" crossorgin="anonymous"></script>

    <title>Inventario</title>
    <style>
    table{
        border-collapse: collapse;
        width: 98%;
        font-family: 'Times New Roman', Times, serif;
       
    }
    th, td {
        color: black;
        padding: 2px;
        font-family: 'Times New Roman', Times, serif;

    }
    tr:nth-child(even){background-color: #BA95BF}
    th {
    background-color: #9865A6;
    color: black;
    font-family: 'Times New Roman', Times, serif;
    }
    .main-wrapper{
        width: 100%; 
        padding: 10px;
        margin: auto;
        background-image:url('img/eje.png');
        width: 100%;
        height: 100vh;
        background-size: cover;
        font-family: 'Times New Roman', Times, serif;

    }
    hr{
        margin-top: 2px;
        margin-bottom: 2px;
        border: 0;
        border.top: 1px solid purple;
        font-family: 'Times New Roman', Times, serif;
    }
    h2{
        display: flex;
        font-size: 50px;
        align-content: center;
        align-items: center;
        flex-direction: column;
        color: black;
        font-family: 'Times New Roman', Times, serif;
    }   

    .btn {
        display: inline-block;
        padding: 5px 20px;
        border: none;
        border-radius: 5px;
        box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
        transition: all 0.3s ease;
        text-decoration: none;
        font-weight: bold;
        color: white;
        background-color: purple;
        font-family: 'Times New Roman', Times, serif;
    }

    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.3);
    }

    .btn-primary {
        background-color: purple;
    }

    .btn-danger {
        background-color: #dc3545;
    }
    .form-control {
        width: 90%;
        padding: 10px;
        font-size: 16px;
        border-radius: 1px;
        border: 2px solid #ccc;
        box-sizing: border-box;
        font-family: 'Times New Roman', Times, serif;
    }
    
    </style>
</head>
<body>
    <div class="main-wrapper">
    <h2>Inventario </h2>
<center>
<form action="" method="post">
    <div class="col-xs-3">
        <input class="form-control" name="producto" type="text" placeholder="Producto" required = "required">
    </div>
    <div class="col-xs-3">
        <input class="form-control" name="descripcion" type="text" placeholder="Descripcion" required = "required">
    </div>
    <div class="col-xs-3">
        <input class="form-control" name="precio" type="text" placeholder="Precio" required = "required">
    </div>
    <div class="col-xs-3">
        <input class="form-control" name="cantidad" type="text" placeholder="Cantidad" required = "required">
    </div>
    <div class="col-xs-3">
        <input type="submit" name="submit" class="btn btn-success" value="Agregar producto">
    </div>
</form>
</center>



<table border="1" width="100%">
    <tr>
        <th width="30px%">ID</th>
        <th width="45px">Producto</th>
        <th width="35px">Descripcion</th>
        <th width="35px">Precio</th>
        <th width="5px">Cantidad</th>
        <th width="15px">Opciones</th>
    </tr>
    <?php
    include("function.php");

    if(isset($_POST['submit'])){
        $field = array("producto"=>$_POST['producto'],"descripcion"=>$_POST['descripcion'],"precio"=>$_POST['precio'], "cantidad"=>$_POST['cantidad']);
        $tbl = "tabla_demo";
        insert($tbl,$field);
} ?>
<?php 
    @$sql = "SELECT * FROM tabla_demo";
    $result = db_query($sql);
    while($row = mysqli_fetch_object($result)){
    ?>
    <tr>
        <td><?php echo $row->id; ?></td>
        <td><?php echo $row->producto; ?></td>
        <td><?php echo $row->descripcion; ?></td>
        <td><?php echo $row->precio; ?></td> 
        <td><?php echo $row->cantidad; ?></td>  
        <td>
              <a class="btn btn-primary" href="editar.php?id=<?php echo $row->id; ?>">
            <i class="fa fa-pencil" aria-hidden="true"></i> Editar
            </a>

            <a class="btn btn-danger" href="borrar.php?id=<?php echo $row->id; ?>">
            <i class="fa fa-trash" aria-hidden="true"></i> Eliminar
            </a>
    
        </td>
        </tr>

<?php } ?>
</table>
<a class="btn btn-primary" href="index.php?id=<?php echo $row->id; ?>">
            <i class="fa fa-pencil" aria-hidden="true"></i> Regresar
            </a>
</body>
</html>
