<?php
$a = "Acesta este conținutul original.";
$b = &$a; // $b este o referință la $a

echo $a; // Acesta este conținutul original.
echo $b; // Acesta este conținutul original.

$b = "Acesta este conținutul nou."; // Modificăm conținutul prin referință

echo $a; // Acesta este conținutul nou.
echo $b; // Acesta este conținutul nou.
?>

<!-- 
Explicație
Crearea variabilei originale: $a = "Acesta este conținutul original.";

Am definit o variabilă $a și i-am atribuit un șir de caractere.
Crearea unei referințe: $b = &$a;

Am creat o referință către variabila $a și am stocat-o în $b. 
Acum, $a și $b se referă la aceeași locație de memorie.
Accesarea și modificarea:

Când afișăm $a și $b, ambele vor afișa "Acesta este conținutul original.".
Modificând $b, de fapt modificăm conținutul variabilei la care se referă, 
astfel încât atât $a, cât și $b vor reflecta noul conținut.
*-->