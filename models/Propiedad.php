<?php

namespace Model;

class Propiedad extends ActiveRecord {
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 
     'wc', 'parking', 'creado', 'vendedorId'];

     public $id;
     public $titulo;
     public $precio;
     public $imagen;
     public $descripcion;
     public $habitaciones;
     public $wc;
     public $parking;
     public $creado;
     public $vendedorId;

     public function __construct($args = [])
     {
         $this->id = $args['id'] ?? null;
         $this->titulo = $args['titulo'] ?? '';
         $this->precio = $args['precio'] ?? '';
         $this->imagen = $args['imagen'] ?? '';
         $this->descripcion = $args['descripcion'] ?? '';
         $this->habitaciones = $args['habitaciones'] ?? '';
         $this->wc = $args['wc'] ?? '';
         $this->parking = $args['parking'] ?? '';
         $this->creado = date('Y/m/d');
         $this->vendedorId = $args['vendedorId'] ?? '';
     }

     public function validar() {
        if(!$this->titulo){
            self::$errores[] = "Debes añadir un titulo";
        }
        if(!$this->precio){
            self::$errores[] = "Debes añadir un precio";
        }
        if( strlen( $this->descripcion ) < 50) {
            self::$errores[] = "Debes añadir una description al menos de 50 caracteres";
        }
        if(!$this->wc){
            self::$errores[] = "Debes añadir el numero de baños";
        }
        if(!$this->habitaciones){
            self::$errores[] = "Debes añadir el numero de habitaciones";
        }
        if(!$this->parking){
            self::$errores[] = "Debes añadir el numero de parkings";
        }
        if(!$this->vendedorId){
            self::$errores[] = "Debes escoger un vendedor";
        }

        if(!$this->imagen){
            self::$errores[] = "La imagen es obligatoria";
        }
        return self::$errores;
    }
}