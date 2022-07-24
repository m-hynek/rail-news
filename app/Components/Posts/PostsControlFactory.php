<?php declare(strict_types=1);

namespace App\Components\Posts;

use App\Components\SearchForm\SearchFormFactory;
use App\Model\PostModel;

class PostsControlFactory
{
    public function __construct(
        private readonly PostModel         $model,
        private readonly SearchFormFactory $searchFormFactory
    )
    {
    }

    public function create(string|null $query = null): PostsControl
    {
        return new PostsControl($this->searchFormFactory, $this->model);
    }
}