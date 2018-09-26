<?php

namespace PFinal\Database\Relations;

use Leaf\Util;
use PFinal\Database\Builder;

class HasMany extends Builder
{
    public $foreignKey = null;
    public $localKey;
    public $localValue;

    public function __invoke()
    {
        $this->where([$this->foreignKey => $this->localValue]);

        return $this->findAll();
    }

    public function appendData($models, $name)
    {
        $ids = Util::arrayColumn($models, $this->localKey);
        $ids = array_unique($ids);

        $this->whereIn($this->foreignKey, $ids);

        $relationData = $this->findAll();

        foreach ($models as $k => $model) {
            $models[$k][$name] = [];
        }

        $models = Util::arrayColumn($models, null, $this->localKey);

        foreach ($relationData as $v) {
            $id = $v[$this->foreignKey];
            $models[$id][$name][] = $v;
        }
    }
}