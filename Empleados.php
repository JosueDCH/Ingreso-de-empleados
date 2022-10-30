<?php


class Empleados
{

	//Coneexion 

	private $conn;
	private $tablename = "registro";

	public $idemple;
	public $pais;
	public $nombres;
	public $apellidos;
	public $fecha_nacimiento;
	public $sexo;
    public $estado_civil;

    // Construuctor de Clase
    
    public function __construct($db)
    {
    	$this->conn = $db;
    }

    // Crear un empleados
        public function creatEmple(){
            $sqlQuery = "INSERT INTO
                        ". $this->tablename ."
                    SET
                    idemple = :idemple, 
                    pais = :pais, 
                    nombres = :nombres, 
                    apellidos = :apellidos, 
                    fecha_nacimiento = :fecha_nacimiento,
                    sexo = :sexo, 
                    estado_civil = :estado_civil";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->idemple=htmlspecialchars(strip_tags($this->idemple));
            $this->pais=htmlspecialchars(strip_tags($this->pais));
            $this->nombres=htmlspecialchars(strip_tags($this->nombres));
            $this->apellidos=htmlspecialchars(strip_tags($this->apellidos));
            $this->fecha_nacimiento=htmlspecialchars(strip_tags($this->fecha_nacimiento));
            $this->sexo=htmlspecialchars(strip_tags($this->sexo));
            $this->estado_civil=htmlspecialchars(strip_tags($this->estado_civil));
          
        
            $stmt->bindParam(":idemple", $this->idemple);
            $stmt->bindParam(":pais", $this->pais);
            $stmt->bindParam(":nombres", $this->nombres);
            $stmt->bindParam(":apellidos", $this->apellidos);
            $stmt->bindParam(":fecha_nacimiento", $this->fecha_nacimiento);
            $stmt->bindParam(":sexo", $this->sexo);
            $stmt->bindParam(":estado_civil", $this->estado_civil);
        

            if ($stmt->execute()) {
                return true;
            }

            return false;
        }



}

?>