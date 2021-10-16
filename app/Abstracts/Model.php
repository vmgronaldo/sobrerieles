<?php


namespace App\Abstracts;


use GeneaLabs\LaravelModelCaching\CachedBelongsToMany;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model as BaseModel;

abstract class Model extends BaseModel
{
    use Cachable;
    protected $cacheCooldownSeconds = 600;

    protected function newBelongsToMany(Builder $query, BaseModel $parent, $table, $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey, $relationName = null)
    {
        return new CachedBelongsToMany($query, $parent, $table, $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey, $relationName);
    }
    public function scopeNoCache($query){
        $this->disableModelCaching();
        return $query;
    }
}
