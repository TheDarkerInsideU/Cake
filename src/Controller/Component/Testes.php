<?php
namespace App\Controller\Component;

use Cake\Error\Debugger;

Debugger::setOutputMask([
    'password' => 'xxxxx',
    'awsKey' => 'yyyyy',
]);

class Testes {

    public function debugar($value) {
        debug($value);
    }


}