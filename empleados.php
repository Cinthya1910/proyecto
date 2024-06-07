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
        width: 100%;
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

<br>
<?php
    include("function.php");
    if(isset($_POST['submit'])){
        $field = array("producto"=>$_POST['producto'],"descripcion"=>$_POST['descripcion'],"precio"=>$_POST['precio'], "cantidad"=>$_POST['cantidad']);
        $tbl = "tabla_demo";
        insert($tbl,$field);
    }
?>

<table border="1" width="100%">
    <tr>
        <th width="30px%">ID</th>
        <th width="85px">Producto</th>
        <th width="85px">Descripcion</th>
        <th width="85px">Precio</th>
        <th width="85px">Cantidad</th>

    </tr>
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
  
        
    </tr>
<?php } ?>
</table>
<a class="btn btn-primary" href="index.php?id=<?php echo $row->id; ?>">
            <i class="fa fa-pencil" aria-hidden="true"></i> Regresar
            </a>
</div>
</body>
</html>
