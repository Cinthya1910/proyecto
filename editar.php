<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link type="text/css" href="bootstrap.min.css" rel="stylesheet">
    <script src="https:/kit.fontawesome.com/bcf1594f44.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica tus productos</title>

<body>
    <style>
        table{
            border-collapse: collapse;
            width: 100%;
            font-family: 'Times New Roman', Times, serif;
            

        }
        th, td{
            text-align: left;
            padding: 1px;
            font-family: 'Times New Roman', Times, serif;
            
        }
        tr:nth-child(even){background-color: #f2f2f2}
        th {
            background-color: #4CAF50;
            color: white;
            font-family: 'Times New Roman', Times, serif;
            
        }
    .main-wrapper{
    
       
        display: flex;
        flex-direction: column;
    
        background-image:url('img/eje.png');
        width: 100%;
        height: 100vh;
        background-size: cover;
        font-family: 'Times New Roman', Times, serif;
        
        
    }
    hr {
        margin-top: 1px;
        margin-bottom: 1px;
        border: 0;
        border-top: 1px solid #eee;
        font-family: 'Times New Roman', Times, serif;


    }
    h2{
        font-size: 50px;
    }
    ::placeholder {
        font-family: 'Times New Roman', Times, serif; 
}
.btn {
        display: inline-block;
        padding: 5px 20px;
        border: none;
        border-radius: 15px; /* Agrega bordes redondeados */
        box-shadow: 0px 2px 10px rgba(0, 0,0, 0.3);
        transition: all 0.3s ease;
        text-decoration: none;
        font-weight: bold;
        color: white;
        background-color: purple; /* Color primario para los botones */
        cursor: pointer;
        font-size: 16px;
    }

    /* Estilos cuando se pasa el cursor sobre los botones */
    .btn:hover {
        transform: translateY(-2px);
        box-shadow: 0px 4px 6px purple;
        font-family: 'Times New Roman', Times, serif;
    }

    /* Estilos específicos para los diferentes tipos de botones */
    .btn-primary {
        background-color: #007bff; /* Color primario para los botones */
        
    }

    .btn-danger {
        background-color: #dc3545; /* Color de peligro para los botones */
        
    }
    .input-container {
        margin-bottom: 1px; /* Agrega espacio entre cada recuadro de input */
      
    }

    .form-control {
        width: 99%;
        padding: 10px;
        font-size: 16px;
        border-radius: 1px;
        border: 2px solid #ccc;
        box-sizing: border-box;
        font-family: 'Times New Roman', Times, serif;
    }



    </style>
    </head>
    <div class="main-wrapper">
    <h2>Modificar productos </h2>
    <br><br>
    <?php
    include("function.php");
    
    $id = $_GET['id'];
    select_id('tabla_demo','id',$id);
    ?>
    <form action="" method="post">
        <div class="col-xs-3">
            <input class="form-control" type="text" value="<?php echo $row->id;?>" name="id" placeholder="ID">
        </div>
        <div class="col-xs-3">
            <input class="form-control" type="text" value="<?php echo $row->producto;?>" name="producto" placeholder="Producto">
        </div>
        <div class="col-xs-3">
            <input class="form-control" type="text" value="<?php echo $row->descripcion;?>" name="descripcion" placeholder="Descripcion">
        </div>
        <div class="col-xs-3">
            <input class="form-control" type="text" value="<?php echo $row->precio;?>" name="precio" placeholder="Precio">
        </div>
        <div class="col-xs-3">
            <input class="form-control" type="text" value="<?php echo $row->cantidad;?>" name="cantidad" placeholder="Cantidad">
        </div>
        
            <input type="submit" name="submit" value="Guardar cambios" class="btn btn.primary">
            <input type="submit" name="submit" value="Volver" class="btn btn.primary">
            
        </div>
    </form>
    
    <?php
    if(isset($_POST['submit'])){
        $field = array("id"=>$_POST['id'], "producto"=>$_POST['producto'], "descripcion"=>$_POST['descripcion'], "precio"=>$_POST['precio'], "cantidad"=>$_POST['cantidad']);
        $tbl = "tabla_demo";
        edit($tbl,$field,'id',$id);
        header("location:entrar.php");
    }
    ?>
</head>

</div>
</body>
</html>