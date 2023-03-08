<?php
    // Interfaz Abstracta de la fábrica de muebles
interface MueblesAbstractFactory {
    public function crearMesa(): Mesa;
    public function crearSilla(): Silla;
}

// Clase concreta de la fábrica de muebles de estilo moderno
class MueblesModernosFactory implements MueblesAbstractFactory {
    public function crearMesa(): Mesa {
        return new MesaModernista();
    }
    
    public function crearSilla(): Silla {
        return new SillaModerna();
    }
}

// Clase concreta de la fábrica de muebles de estilo clásico
class MueblesClasicosFactory implements MueblesAbstractFactory {
    public function crearMesa(): Mesa {
        return new MesaBarroca();
    }
    
    public function crearSilla(): Silla {
        return new SillaVictoriana();
    }
}

// Interfaz abstracta de la mesa
interface Mesa {
    public function obtenerEstilo(): string;
}

// Clase concreta de la mesa modernista
class MesaModernista implements Mesa {
    public function obtenerEstilo(): string {
        return "Mesa modernista";
    }
}

// Clase concreta de la mesa barroca
class MesaBarroca implements Mesa {
    public function obtenerEstilo(): string {
        return "Mesa barroca";
    }
}

// Interfaz abstracta de la silla
interface Silla {
    public function obtenerEstilo(): string;
}

// Clase concreta de la silla moderna
class SillaModerna implements Silla {
    public function obtenerEstilo(): string {
        return "Silla moderna";
    }
}

// Clase concreta de la silla victoriana
class SillaVictoriana implements Silla {
    public function obtenerEstilo(): string {
        return "Silla victoriana";
    }
}

// Cliente que utiliza la fábrica de muebles para crear los objetos
class Cliente {
    private $mueblesFactory;
    
    public function __construct(MueblesAbstractFactory $mueblesFactory) {
        $this->mueblesFactory = $mueblesFactory;
    }
    
    public function obtenerMesa(): Mesa {
        return $this->mueblesFactory->crearMesa();
    }
    
    public function obtenerSilla(): Silla {
        return $this->mueblesFactory->crearSilla();
    }
}

// Ejemplo de uso
$clienteModerno = new Cliente(new MueblesModernosFactory());
$mesaModerna = $clienteModerno->obtenerMesa();
$sillaModerna = $clienteModerno->obtenerSilla();
echo "Cliente moderno compró una {$mesaModerna->obtenerEstilo()} y una {$sillaModerna->obtenerEstilo()}." . PHP_EOL;

$clienteClasico = new Cliente(new MueblesClasicosFactory());
$mesaBarroca = $clienteClasico->obtenerMesa();
$sillaVictoriana = $clienteClasico->obtenerSilla();
echo "Cliente clásico compró una {$mesaBarroca->obtenerEstilo()} y una {$sillaVictoriana->obtenerEstilo()}." . PHP_EOL;


?>