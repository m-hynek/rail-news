<?php declare(strict_types=1);

namespace App\Presenters;

use App\Components\Posts\PostsControlFactory;
use App\Components\SearchForm\SearchFormFactory;
use App\Model\PostModel;
use Nette\Application\UI\Presenter;
use Nette\ComponentModel\IComponent;

final class RailNewsPresenter extends Presenter
{
    /** @var PostsControlFactory @inject */
    public PostsControlFactory $postsControlFactory;

    /** @var SearchFormFactory @inject */
    public SearchFormFactory $searchFormFactory;

    /** @var PostModel @inject */
    public PostModel $postModel;

    protected function createComponentPosts() : IComponent
    {
        return $this->postsControlFactory->create();
    }
}
