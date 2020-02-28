# Guía de estilo de programación

En este documento se presentan las reglas de estilo que deben seguir todos los desarrolladores para todos los componentes del proyecto. 

## Tabla de contenidos
* [Archivos PHP](#archivos-php)
* [Nombramiento](#nombramiento)
* [Utilización de operadores](#utilización-de-operadores)
* [Variables](#variables)
* [Constantes](#constantes)
* [Ciclos](#ciclos)
    * [For](#ciclos-for)
    * [While](#ciclos-while)
    * [Do-while](#ciclos-do-while)
    * [For Each](#ciclos-for-each)
* [Condicionales](#condicionales)
* [Sentencia switch](#sentencia-switch)
* [Clases](#clases)
* [Funciones](#funciones)


## Archivos PHP

Todos los archivos con extensión `.php` deben comenzar con el tag `<?php` y ***NUNCA*** se debe combinar diferentes lenguajes de programación en un solo archivo (por ejemplo, en un documento `.html` no debe haber código PHP).

## Nombramiento

Las variables, clases, funciones, etc deberán nombrarse en **inglés** y de manera clara que permita identificar cual es la función de cada elemento. 

## Utilización de operadores

Al realizar asignaciones de variables, operaciones matemáticas o cualquier otro proceso que requiera utilizar operadores se debe dejar un espacio entre las variables o números y el operador. A continuación, se muestran algunos ejemplos de esto:

```php
$num1 = 15;
$num2 = 30;
$sum = $num1 + num2;
$bool = ($num1 >= $num2) && ($sum < 100);
```

## Variables

El nombre de las variables debe ser claro y debe dar a entender cual es su objetivo, además debe utilizar camel case y debe comenzar con letra minúscula.

Por ejemplo, para declarar una variable que tenga como objetivo llevar cuenta de las personas que están al interior de un recinto:

```php 
$numPeople = 10;
```

## Constantes

para declarar una constante en el proyecto debe nombrarse en mayúscula sostenida como se muestra a continuación:

```php
const CONSTANT = valorConstante
```

## Ciclos

A continuación, se presenta la estructura básica que deben seguir los ciclos.

### Ciclos for

Los ciclos for deben seguir la siguiente estructura, donde después de la palabra reservada `for` se deja un espacio, al igual que después de cada punto y coma y después de cerrar el paréntesis:

```php
for (inicialización; condición; incremento) {
    // código a ejecutar
}
```

Por ejemplo, para hacer un ciclo que imprima los números del 0 al 9:

```php
for ($i = 0; i < 10; i++) {
    echo $i;
}
```

### Ciclos while

La estructura de los while, al igual que los demás ciclos, es similar a la del ciclo for:

```php
while (condición) {
    // código a ejecutar
}
```

Por ejemplo, para hacer un ciclo que cuente el número de personas hasta llegar a 50:

```php
$numPeople = 0;

while ($numPeople < 50) {
    $numPeople++;
    echo "Actualmente hay $numPeople personas";
}
```

### Ciclos do-while

```php
do {
    // código a ejecutar
}
while (condición);
```

Ejemplo:

```php
$counter = 0;

do {
    echo "Valor del contador do while: $counter";
    ++$counter;
}
while ($counter <= 10);
```

## Ciclos for each

```php
foreach (arreglo as valor) {
    // código a ejecutar
}
```

Ejemplo:

```php
$array = array(1, 2, 3, 4, 5);

foreach ($array as $value) {
    echo $value;
} 
```

## Condicionales

La estructura básica de un condicional es:

```php
if (condición) {
    // código a ejecutar
}
```

En caso de existir varios condicionales alternativos:

```php
if (condición) {

}
elseif (condición) {
    // código a ejecutar
}
else {
    // código a ejecutar
}
```
## Sentencia switch

La estructura de una sentencia switch case es:

```php 
switch (expresión) {
    case valor1:
        // código a ejecutar
        break;
    case valor2:
        // código a ejecutar
        break;
    default:
        // código a ejecutar
        break;
}
```

## Clases

El nombre de las clases debe comenzar con una mayúscula y debe utilizar camel case, siguiendo la estructura:

```php
class ClassName {
    // contenido de la clase
}
```

## Funciones

Las funciones deben ser nombradas utilizando camel case y **NO** deben comenzar con letra mayúscula.

```php
function functionName() {
    // código a ejecutar
}
```

Un ejemplo de una función que reciba como argumentos 2 números y los sume:

```php
function sum($num1, $num2) {
    $sum = $num1 + $num2;
    return $sum;
}
```