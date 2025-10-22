<?php

namespace App\Service\Asserts;

class AssertUnique implements AssertInterface {

    public function __construct(
        private string $table, 
        private string $column = '', 
        private string $ignore = '', 
        private string $idColumn = ''
    ){}
    public function __tostring(): string{
        $constrain = [];
        if ($this->table){
            $constrain[] = $this->table;
        }
        if ($this->column){
            $constrain[] = $this->column;
        }
        if ($this->ignore){
            $constrain[] = $this->ignore;
        }
        if ($this->idColumn){
            $constrain[] = $this->idColumn;
        }
        return $constrain === [] ? '' : sprintf('unique:%s', implode(',', $constrain));
    }
}