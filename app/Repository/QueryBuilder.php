<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;

class QueryBuilder implements QueryBuilderInterface
{
    public function select(string $modelName, ...$columns): Builder
    {
        return $modelName::select($columns);
    }


}