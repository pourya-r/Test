<?php

if (!empty($_POST["func"])){
    $number1 = $_POST["number1"];
    $number2 = $_POST["number2"];
    $func = $_POST["func"];


    //define calculadora
    $mycalc = new Calculadora($number1, $number2);

    if ($func == "+")  { echo $mycalc-> sumar();
    }elseif ($func == "-"){ echo $mycalc-> restar();
    }elseif ($func == "/"){ echo $mycalc-> dividir();
    }elseif ($func == "*"){ echo $mycalc-> multiplicar();
    }elseif ($func == "%%"){
        echo $mycalc-> par_impar();
    }else{
        echo "ER";

    }

}

class Calculadora {
    private $val1, $val2, $res;
    private function par_impar($res){
    if(($res % 2 ) == 0){
        return "$res    ---> PAR";
    }else{
        return "$res    ---> IMPAR";
    }
}
    public function __construct( $val1, $val2 ) {
        $this->val1 = $val1;
        $this->val2 = $val2;
    }
    public function sumar() {
        return $this->par_impar($this->val1 + $this->val2) ;
    }
    public function restar() {
        return $this->par_impar($this->val1 - $this->val2) ;
    }
    public function multiplicar() {
        return $this->par_impar($this->val1 * $this->val2) ;
    }
    public function dividir() {
        return $this->par_impar($this->val1 / $this->val2) ;
    }

}


?>