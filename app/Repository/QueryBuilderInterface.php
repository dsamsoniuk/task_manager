<?php

namespace App\Repository;

interface QueryBuilderInterface 
{
    public function select(string $modelName, ...$columns):  \Illuminate\Database\Eloquent\Builder;
}