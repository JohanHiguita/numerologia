<?php



  if (isset($_POST['first_name'],$_POST['mid_name'],$_POST['apellido1'],$_POST['apellido2'])) {
    $nombre1=$_POST['first_name'];
    $nombre2=$_POST['mid_name'];
    $apellido1=$_POST['apellido1'];
    $apellido2=$_POST['apellido2'];

    /*$fullNameArray=[
      "primerNombre"=>$nombre1,
      "segundoNombre"=>$nombre2,
      "primerApellido"=>$apellido1,
      "segundoApellido"=>$apellido2
    ];*/

    $numNombre1=get_Number($nombre1);
    $numNombre2=get_Number($nombre2);
    $numApellido1=get_Number($apellido1);
    $numApellido2=get_Number($apellido2);

    //suma de digitos
    $numNombre1=addDigits($numNombre1);
    $numNombre2=addDigits($numNombre2);
    $numApellido1=addDigits($numApellido1);
    $numApellido2=addDigits($numApellido2);

    $numNombreCompleto=$numNombre1+$numNombre2+$numApellido1+$numApellido2;
    $numNombreCompleto=addDigits($numNombreCompleto);
    //armar array con los 4 numeros
    $numbers=[
      "Nombre1"=>$numNombre1,
      "Nombre2"=>$numNombre2,
      "Apellido1"=>$numApellido1,
      "Apellido2"=>$numApellido2,
      "NombreCompleto"=>$numNombreCompleto,
    ];
    echo json_encode($numbers);
    //echo $numName;
  }


  function get_Number($word){
    $lettersValues=[
      "a"=>1, "j"=>1,"s"=>1,
      "b"=>2, "k"=>2,"t"=>2,
      "c"=>3, "l"=>3,"u"=>3,
      "d"=>4, "m"=>4,"v"=>4,
      "e"=>5, "n"=>5,"ñ"=>5,"w"=>5,
      "f"=>6, "o"=>6,"x"=>6,
      "g"=>7, "p"=>7,"y"=>7,
      "h"=>8, "q"=>8,"z"=>8,
      "i"=>9, "r"=>9,
    ];
    $number=0;
    $wordArray = str_split($word);
    foreach ($wordArray as $letter) {
      $number=$number+$lettersValues[$letter];
    }
    //return $number;
    return $number;
  }

  function addDigits($num){
    $digitsArray=str_split($num);
    $sum=0;
    foreach ($digitsArray as $dig) {
      $sum=$sum + intval($dig);
    }
    while ($sum >= 10) {
      $sumArray=str_split($sum);
      $sum=0;
      foreach ($sumArray as $dig) {
        $sum=$sum + intval($dig);
      }
    }

    return $sum;
  }


 ?>
