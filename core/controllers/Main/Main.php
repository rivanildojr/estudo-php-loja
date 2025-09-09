<?php

    namespace core\controllers\Main;

use core\classes\Helpers\Helpers;

    class Main {
        public function index() {
            $data = [
                'title' => 'Hello World!'
            ];

            Helpers::Layout([
                'components/Header/index',
                'pages/Home/index',
                'components/Footer/index'
            ], $data);
        }

        public function store() {
            echo 'Página da Loja';
        }
    }