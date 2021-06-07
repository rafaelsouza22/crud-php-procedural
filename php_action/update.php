<?php
session_start();
require_once("./db_connect.php");
function clear($input)
{
    global $connect;
    // slq
    $var = mysqli_escape_string($connect, $input);
    // xss
    $var = htmlspecialchars($var);
    return $var;
}
if (isset($_POST['btn-editar'])) :
    $nome = clear($_POST['nome']);
    $sobrenome = clear($_POST['sobrenome']);
    $email = clear($_POST['email']);
    $idade =  clear($_POST['idade']);
    $id =  clear($_POST['id']);
    
  
    if(!is_numeric($idade) || empty($idade) || empty($nome) || empty($sobrenome) || empty($email)){
        $_SESSION['mensagem'] = "Erro ao Atualizar";
        
        header('Location: ../index.php');
        die();
       
    }

    $sql = "UPDATE clientes SET nome ='$nome' , sobrenome = '$sobrenome', email = '$email', idade = '$idade' WHERE id = '$id' ";
         
    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem'] = "Atualizar com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem'] = "Erro ao Atualizar";
        header('Location: ../index.php');
    endif;
   

 
endif;
