# PHP PIMACO

[![Build Status](https://travis-ci.org/mrprompt/phppimaco.svg?branch=master)](https://travis-ci.org/mrprompt/phppimaco)
[![Latest Stable Version](https://poser.pugx.org/proner/phppimaco/v/stable)](https://packagist.org/packages/proner/phppimaco)
[![Latest Unstable Version](https://poser.pugx.org/proner/phppimaco/v/unstable)](https://packagist.org/packages/proner/phppimaco)
[![Total Downloads](https://poser.pugx.org/proner/phppimaco/downloads)](https://packagist.org/packages/proner/phppimaco)
[![License](https://poser.pugx.org/proner/phppimaco/license.svg)](https://packagist.org/packages/proner/phppimaco)
[![Code Climate](https://codeclimate.com/github/PronerInformatica/phppimaco/badges/gpa.svg)](https://codeclimate.com/github/PronerInformatica/phppimaco)

O PHP PIMACO é um pacote para geração de etiquetas usando a biblioteca <a href="https://github.com/mpdf/mpdf" target="_blank">MPDF</a> para auxiliar a montagem de PDFs com as tuas etiquetas devidamente formatadas e prontas para impressão.

## Dependência

- PHP 5.6 ou superior

## Instalação

Para fazer instalação do PHPPimaco utilize o composer
```php
composer require proner/phppimaco
```
ou adicione isso ao require do seu composer.json
```php
"require":{
    "proner/phppimaco": "dev-master"
}
```

## Primeira impressão
Depois fazer a instalação corretamente você deve seguir os exemplo a baixo para criar as suas etiquetas
```php
<?php
require_once "../vendor/autoload.php";

use Proner\PhpPimaco\Tag;
$tag = new Tag();
$tag->p("TAG 1");
```
Com a etiqueta criada, você deve estanciar o objeto Pimaco passando o código da etiqueta e adicioná-la e no objeto
```php
<?php
use Proner\PhpPimaco\Pimaco;
$pimaco = new Pimaco('6182');
$pimaco->addTag($tag);
$pimaco->output();
```

## Exemplo
```php
<?php
use Proner\PhpPimaco\Tag;
use Proner\PhpPimaco\Pimaco;

$tag = new Tag();
$tag->p("TAG 1");

$pimaco = new Pimaco('6182');
$pimaco->addTag($tag);
$pimaco->output();
```


## Templates Implementados
* 3080
* 3180
* A4056
* A4056R
* A4256
* A4356
* 5580A
* 5580M
* 5580V
* 6080
* 6082
* 6180
* 6280
* 6282
* 62582


## Templates Testados
* 3080
* 6182


## Documentação

Acesse na nossa Wiki para ter acesso a documentação <a href="https://github.com/PronerInformatica/phppimaco/wiki" target="_blank">Wiki</a>
