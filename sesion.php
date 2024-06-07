<?php

  $conn = mysqli_connect("localhost", "root", "", "demo");

    $stmt = $conn->prepare("SELECT id, nombre, usuario, contra, nivel FROM otro WHERE usuario = ?");
  
 
    
    $usuario = $_POST['usrnm'];
    $contra = $_POST['pass']; 

    $stmt->bind_param("s", $usuario);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        
        $key=$_POST['pass'];
        $pasBD= $row['contra'];
        if ($key == $pasBD) {
            session_start();
            $_SESSION['conectado'] = true;
            $_SESSION['usrnm'] = $usuario;
            $_SESSION['usr_lvl']=$row['nivel'];
            $_SESSION['pass'] = $row['contra'];

            if($row['nivel'] == '1'){
            header("location: entrar.php");
            }elseif ($row['nivel'] == '2'){
                header("location: empleados.php");
            }

            
            exit();
        } else {
            echo "Error de contraseña";
            echo "<br>";
            echo "<a href='index.php'>Volver a intentar</a>";
        }
    } else {
        echo "Error de Usuario";
        echo "<br>";
        echo "<a href='index.php'>Volver a intentar</a>";
    }

    $stmt->close();
    $conn->close();

?>
