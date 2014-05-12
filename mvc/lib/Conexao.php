<?php
class Conexao extends PDO {

    private $dsn = 'mysql:host=localhost;dbname=formulario_acic';
    private $user = 'root';
    private $password = 'teste';
    private static $instancia;

    function __construct() {
        try {
            parent::__construct($this->dsn, $this->user, $this->password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Conexão falhou. Erro: " . $e->getMessage();
            exit;
        }
    }
	
    public static function getInstance() {
        if (null === self::$instancia) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

}
