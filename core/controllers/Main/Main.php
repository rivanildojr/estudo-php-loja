<?php

    namespace core\controllers\Main;

use core\classes\Store\Store;

    class Main {
        public function index() {
            $data = [
                'title' => APP_NAME . ' ' . APP_VERSION,
                'clientes' => ['joao', 'ana', 'pedro', 'maria']
            ];

            Store::Layout([
                'layouts/Header/index',
                'components/Header/index',
                'pages/Home/index',
                'components/Footer/index',
                'layouts/Footer/index'
            ], $data);
        }

        public function store() {
            echo 'Página da Loja';
        }
    }