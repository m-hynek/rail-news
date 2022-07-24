<?php declare(strict_types=1);

namespace App\Presenters;

use App\Components\Posts\PostsControlFactory;
use Nette\Application\UI\Presenter;
use Nette\ComponentModel\IComponent;

final class RailNewsPresenter extends Presenter
{
    /** @var PostsControlFactory @inject */
    public PostsControlFactory $postsControlFactory;

    protected function createComponentPosts(): IComponent
    {
        return $this->postsControlFactory->create();
    }
}
