<?php declare(strict_types=1);

namespace App\Model;

use Nette\Database\Explorer;
use Nette\Database\Table\Selection;

abstract class BaseModel
{
    public function __construct(
        protected readonly Explorer $explorer,
    )
    {}

    abstract protected static function getTableName() : string;

    public function getTable(): Selection
    {
        return $this->explorer->table(static::getTableName());
    }


}