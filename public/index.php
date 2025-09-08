<?php

    use core\classes\Database\Database;
    use core\classes\Helpers\Helpers;

    // abrir a sessão
    session_start();

    /**
     * Carregar o config
     * Carregar classes
     * Carregar o sistema de rotas
     *  - mostrar loja
     *  - mostrar carrinho
     *  - mostrar o backoffice, etc
     */

    // Carregar o config
    require_once('../config.php');

    // Carregar as classes
    require_once('../vendor/autoload.php');

    $database = new Database();
    $helpers = new Helpers();

    $helpers->teste();

    echo 'Hello World!';