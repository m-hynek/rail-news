<?php declare(strict_types=1);

namespace App\Model;

use Nette\Database\Table\Selection;

class PostModel extends BaseModel
{
    protected static function getTableName() : string
    {
        return 'post';
    }

    //todo: expand search scope
    public function searchPosts($query) : Selection
    {
        return $this->getTable()
            ->where('MATCH(content) AGAINST(? IN NATURAL LANGUAGE MODE)', $query);
    }
}