<?php

    $nombre = "Pepito";     //string
    $edad = 15;             //integer
    $precio = 19.99;        //float
    $esActivo = true;        //Boolean

    echo "<h1>Bienvenido a la clase de PHP, $nombre</h1>";
    echo "<p>Edad: $edad años</p>";
    echo "<p>Precio: $precio</p>";
    echo "<p>Activo:" .($esActivo ? 'si' : 'no'). "</p>";
    echo "<hr>";

    //condicionales
    if( $edad>= 18){
        echo "$nombre es mayor de edad";
    }else{
        echo "$nombre es menor de edad";
    }

    //Bucles
    for($i=1;$i<=5;$i++){
        echo "<p>Iteración numero: $i</p>";
    }

    $contador=0;
    while ($contador<=5){
        echo $contador;
        $contador++;
    }

    //Arrays
    $frutas=["Manzana", "Pera", "Cereza", "Durazno"];
    
    echo "<h2>Recorrer Array</h2>";
    foreach($frutas as $fruta){
        echo "<p>Fruta: $fruta</p>";
    }

    //Funciones
    function sumar($a,$b){
        return $a + $b;
    }

    function resta($a,$b){
        return $a - $b;
    }

    function multiplicar($a,$b){
        return $a * $b;
    }

    function dividir($a,$b){
        return $a / $b;
    }

    $num1=2;
    $num2=3;
    $suma=sumar($num1,$num2);
    echo "<p>La suma de $num1 y $num2 es: $suma</p>";

    //clases
    class Persona{
        public $nombre;
        public $edad;

        public function __construct($nombre,$edad)
        {
            $this->nombre=$nombre;
            $this->edad=$edad;
        }
        public function saludar(){
            return "Hola mi nombre es $this->nombre y tengo $this->edad años";
        }
    }

    //Ejercicio
    $nume1=10;
    $nume2=5;
    $operación= 'multiplicar';
    if($operación=='sumar'){
        echo "<p>La suma de $nume1 y $nume2 es:  </p>". sumar($nume1,$nume2);
    }elseif($operación=="resta"){
        echo "<p>La resta $nume1 y $nume2 es: </p>". resta($nume1,$nume2);
    }elseif($operación=="multiplicar"){
        echo "<p>La multiplicación $nume1 y $nume2 es: </p>". multiplicar($nume1,$nume2);
    }elseif($operación=="dividir"){
        echo "<p>La División $nume1 y $nume2 es: </p>". dividir($nume1,$nume2);
    }else{
        echo "<p>La operación es incorrecta</p>";
    }

    //definir variables
    $modelo="Ferrari";
    $motor="Serial 1.2.45.7";
    $velocidad="0";
    $incremento="50";
    $decremento="20";

    //definir fuciones
    function  ascelerar($velocidad, $incremento){
        return $velocidad + $incremento;
    }

    function frenar($incremento, $decremento){
        return $incremento - $decremento;
    }

    //crear la clase
    class Vehiculo{
        public $modelo;
        public $motor;
        public $velocidad;
    }

    echo "<p>el modelo es: $modelo El motor es: $motor la velocidad es: $velocidad </p>";
    echo "<p>El automovil ha acelerado a : ". ascelerar($velocidad, $incremento)."Km/h </p>";
    echo "<p>el modelo es: $modelo El motor es: $motor la velocidad es: </p>". ascelerar($velocidad, $incremento);
    echo "<p>El automovil ha frenado y su velocidad es: </p>". frenar($incremento, $decremento);
    echo "<p>el modelo es: $modelo El motor es: $motor la velocidad es: </p>". frenar($incremento, $decremento);