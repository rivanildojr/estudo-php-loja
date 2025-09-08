<?php

    namespace core\classes\Database;

    use PDO;
    use PDOException;

    /**
     * Classe responsável pela conexão com o banco de dados
     */
    class Database {

        private $connection;

        /**
         * Função de conexão com o banco de dados
         */
        private function connect() {
            $this->connection = new PDO(
                'mysql:' .
                'host=' . MYSQL_HOST . ';' .
                'dbname=' . MYSQL_DATABASE . ';' .
                'charset=' . MYSQL_CHARSET,
                MYSQL_USER,
                MYSQL_PASS,
                array(PDO::ATTR_PERSISTENT => true)
            );

            // Configura o modo de erro do PDO
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        }

        /**
         * Função de desconexão com o banco de dados
         */
        private function disconnect() {
            $this->connection = null;
        }

        /**
         * Função de seleção de dados
         */
        public function select($sql, $params = null) {
            $this->connect();

            $result = null;

            try {
                $stmt = $this->connection->prepare($sql);

                !empty($params) ? $stmt->execute($params) : $stmt->execute();

                $result = $stmt->fetchAll(PDO::FETCH_CLASS);
            } catch (PDOException $e) {
                return false;
            } finally {
                $this->disconnect();
            }

            return $result;
        }
    }