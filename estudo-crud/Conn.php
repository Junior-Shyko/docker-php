<?php 

class Conn
{
    private $host;
    private $port;
    private $dbname;
    private $username;
    private $password;
    private $connection;

    public function __construct($host = 'phpdb', $port = 5432, $dbname = 'postgres', $username = 'postgres', $password = 'postgres')
    {
        $this->host = $host;
        $this->port = $port;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;
    }


    public function connect()
    {
        if ($this->connection === null) {
            $dsn = "pgsql:host={$this->host};port={$this->port};dbname={$this->dbname};";

            try {
                $this->connection = new PDO($dsn, $this->username, $this->password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            } catch (PDOException $e) {
                die("Erro ao conectar ao banco de dados: " . $e->getMessage());
            }
        }

        return $this->connection;
    }
   
}
