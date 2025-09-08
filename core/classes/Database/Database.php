<?php

    namespace core\classes\Database;

    use Exception;
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
            if (!preg_match('/^SELECT/i', $sql)) {
                throw new Exception('Base de dados - Não é uma instrução SELECT.');
            }

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

        public function insert($sql, $params = null) {
            if (!preg_match('/^INSERT/i', $sql)) {
                throw new Exception('Base de dados - Não é uma instrução INSERT.');
            }

            $this->connect();

            try {
                $stmt = $this->connection->prepare($sql);

                !empty($params) ? $stmt->execute($params) : $stmt->execute();
            } catch (PDOException $e) {
                return false;
            } finally {
                $this->disconnect();
            }
        }

        public function update($sql, $params = null) {
            if (!preg_match('/^UPDATE/i', $sql)) {
                throw new Exception('Base de dados - Não é uma instrução UPDATE.');
            }

            $this->connect();

            try {
                $stmt = $this->connection->prepare($sql);

                !empty($params) ? $stmt->execute($params) : $stmt->execute();
            } catch (PDOException $e) {
                return false;
            } finally {
                $this->disconnect();
            }
        }

        public function delete($sql, $params = null) {
            if (!preg_match('/^DELETE/i', $sql)) {
                throw new Exception('Base de dados - Não é uma instrução DELETE.');
            }

            $this->connect();

            try {
                $stmt = $this->connection->prepare($sql);

                !empty($params) ? $stmt->execute($params) : $stmt->execute();
            } catch (PDOException $e) {
                return false;
            } finally {
                $this->disconnect();
            }
        }

        public function statement($sql, $params = null) {
            if (preg_match('/^(SELECT|INSERT|UPDATE|DELETE)/i', $sql)) {
                throw new Exception('Base de dados - Não é uma instrução válida.');
            }

            $this->connect();

            try {
                $stmt = $this->connection->prepare($sql);

                !empty($params) ? $stmt->execute($params) : $stmt->execute();
            } catch (PDOException $e) {
                return false;
            } finally {
                $this->disconnect();
            }
        }
    }