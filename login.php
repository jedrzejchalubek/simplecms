<?php

require_once "head.php";

if ($User->isLogged()) {    
    Server::redirect('admin');
} else {
    View::app('login', null, true);
}


