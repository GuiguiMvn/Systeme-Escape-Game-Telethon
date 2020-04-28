<?php

function login($d){
    global $PDO;
    $req = $PDO->prepare('SELECT * FROM users WHERE login = :login AND password = :password');
    $req->execute($d);
    $data = $req->fetchAll();
    print_r($data);
}


function init_php_session() : bool
{
    if (!session_id())
    {
        session_start();
        session_regenerate_id();
        return true;
    }
    return false;
}

function clean_php_session() : void
{
 
    session_destroy();
    
}

function is_loged() : bool
{
    if(isset($_SESSION['login']))
    {
            return true;
    }
return false;
    
} 

function is_admin() : bool
{
    if(is_loged())
    {
        if(isset($_SESSION['roles_id']) && $_SESSION['roles_id'] == 1){
            return true;
        }
       
    }
     return false;
}

function is_superviseur() : bool
{
    if(is_loged())
    {
        if(isset($_SESSION['roles_id']) && $_SESSION['roles_id'] == 2){
            return true;
        }
       
    }
     return false;
}
