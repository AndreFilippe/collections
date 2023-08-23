<?php

//#0001 o php ira converter float e boolean para int
$array = array(
    1    => "a",
    "1"  => "b",
    1.5  => "c",
    true => "d",
);

if ($array[1] !== "d") throw new Exception("#0001", 400);

//#0002 o php aceita string e int como indice ao mesmo tempo
$array = array(
    "foo" => "bar",
    "bar" => "foo",
    100   => -100,
    -100  => 100,
);

if (
    $array["foo"] !== "bar" ||
    $array["bar"] !== "foo" ||
    $array[100]  !== -100 ||
    $array[-100] !== 100
) {
    throw new Exception("#0002", 400);
}

//#0003 o php aceita desestruturar array
$array = ['foo', 'bar', 'baz'];

[$a, $b, $c] = $array;

if ($a !== 'foo' || $b !== 'bar' || $c !== 'baz') throw new Exception("#0003", 400);

//#0004 o php aceita desestruturar array com chaves no foreach
$array = [
    [1, 'John'],
    [2, 'Jane'],
];

foreach ($array as [$id, $name]) {
    if (array_search($id, [1, 2]) === false) throw new Exception("#0004", 400);
    if (array_search($name, ['John', 'Jane']) === false) throw new Exception("#0004", 400);
}

//#0005 o php aceita desestruturar array ignorando valores
$array = ['foo', 'bar', 'baz'];
[,, $baz] = $array;

if ($baz !== 'baz') throw new Exception("#0005", 400);

//#0006 o php permite fácil seleção do elemento correto de uma forma indexada numericamente dado que os índices podem ser especificados
$array = ['foo' => 1, 'bar' => 2, 'baz' => 3];
// Atribui o elemento de índice 'baz' na variável $three
['baz' => $three] = $array;
if ($three !== 3) throw new Exception("#0006", 400);

$array = ['foo', 'bar', 'baz'];
// Atribui o elemento de índice 2 na variável $baz
[2 => $baz] = $array;
if ($baz !== 'baz') throw new Exception("#0006", 400);

//#0007 Desconstrução de arrays podem ser utilizados para trocar duas variáveis.
$a = 1;
$b = 2;

[$b, $a] = [$a, $b];

if ($a !== 2 || $b !== 1) throw new Exception("#0007", 400);

//TODO https://www.php.net/manual/pt_BR/language.types.array.php#language.types.array.casting
//.............................................

echo "\033[0;32m OK \n";
