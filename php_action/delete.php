<?php


session_start();
require_once("./db_connect.php");

if (isset($_POST['btn-deletar'])) :
   
    $id =  mysqli_escape_string($connect, $_POST['id']);
    
    if(!is_numeric($id) || empty($id) ){
        $_SESSION['mensagem'] = "Erro ao Deleter";
        
        header('Location: ../index.php');
        //echo "ok1";
        die();
    }

    $sql = "DELETE FROM clientes WHERE id = '$id' ";
         
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Deletado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao Deletado";
        header('Location: ../index.php');
    endif;
   

 
endif;
