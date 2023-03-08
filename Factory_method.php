<?php
abstract class CamionDelivery {
    protected $capacidad;
    protected $empresa;
  
    public function __construct($capacidad, $empresa) {
      $this->capacidad = $capacidad;
      $this->empresa = $empresa;
    }
  
    abstract public function entregar($paquete);
  }
  
  class CamionPequeno extends CamionDelivery {
    public function entregar($paquete) {
      echo "Entregando paquete {$paquete} en un camión pequeño de la empresa {$this->empresa} (capacidad: {$this->capacidad})\n";
    }
  }
  
  class CamionGrande extends CamionDelivery {
    public function entregar($paquete) {
      echo "Entregando paquete {$paquete} en un camión grande de la empresa {$this->empresa} (capacidad: {$this->capacidad})\n";
    }
  }
  
  class CamionFactory {
    public static function crearCamion($tipo, $capacidad, $empresa) {
      switch ($tipo) {
        case 'pequeno':
          return new CamionPequeno($capacidad, $empresa);
          break;
        case 'grande':
          return new CamionGrande($capacidad, $empresa);
          break;
        default:
          throw new Exception("Tipo de camión desconocido");
          break;
      }
    }
  }
    $camion1 = CamionFactory::crearCamion('pequeno', 10, 'MiEmpresa');
    $camion2 = CamionFactory::crearCamion('grande', 20, 'OtraEmpresa');

    $camion1->entregar("paquete1");
    $camion2->entregar("paquete2");

?>