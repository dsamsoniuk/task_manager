<?php

namespace App\Service\Asserts;

use Exception;

class Constrains implements ConstrainsInterface{
    /**
     * Create constrain requiremants
     * @param array $asserts
     * @return string
     */
    public function add(...$asserts): string  {
        foreach ($asserts as $assert) {
            if ($assert instanceof AssertInterface === false) {
                throw new Exception('Wrong assert');
            }
        }
        return implode('|', $asserts);
    }
    public static function create(...$asserts): string  {
        foreach ($asserts as $assert) {
            if ($assert instanceof AssertInterface === false) {
                throw new Exception('Wrong assert');
            }
        }
        return implode('|', $asserts);
    }
}