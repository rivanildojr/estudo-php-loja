<?php

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

    // Carregar as classes
    require_once('../vendor/autoload.php');

    // Carregar o sistema de rotas
    require_once('../core/routes.php');