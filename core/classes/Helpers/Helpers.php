<?php

    namespace core\classes\Helpers;

    use Exception;

    /**
     * Classe responsável por auxiliar em diversas funções
     */
    class Helpers {

        public static function Layout($structures, $data = null) {
            if (!is_array($structures)) {
                throw new Exception("A coleção deve ser um array");
            }

            if (!empty($data) && is_array($data)) {
                extract($data);
            }

            foreach ($structures as $structure) {
                include("../core/views/$structure.php");
            }
        }
    }