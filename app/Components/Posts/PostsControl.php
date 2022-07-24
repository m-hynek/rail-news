<?php declare(strict_types=1);

namespace App\Components\Posts;

use App\Components\SearchForm\SearchFormFactory;
use App\Model\PostModel;
use Nette\Application\UI\Control;
use Nette\Application\UI\Presenter;
use Nette\ComponentModel\IComponent;
use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\GroupedSelection;
use Nette\Database\Table\Selection;

class PostsControl extends Control
{
    /**
     * @var Post[]
     */
    private array $posts;

    public function __construct(
        protected readonly SearchFormFactory $searchFormFactory,
        PostModel                            $postModel
    )
    {
        $this->monitor(Presenter::class, function (Presenter $presenter) use ($postModel) {
            if ($presenter->getParameter("query")) {
                $this->posts = $this->setPostsFromSelection($postModel->searchPosts(urldecode($presenter->getParameter("query"))));
            } else {
                $this->posts = $this->setPostsFromSelection($postModel->getTable());
            }
        });
    }

    public function render(): void
    {
        $template = $this->getTemplate();
        $template->posts = $this->posts;
        $template->render(__DIR__ . '/posts.latte');
    }

    protected function createComponentSearch(): IComponent
    {
        return $this->searchFormFactory->create($this->getPresenter());
    }

    /**
     * @param Selection $postSelection
     * @return Post[]
     */
    private static function setPostsFromSelection(Selection $postSelection): array
    {
        $posts = [];
        foreach ($postSelection as $row) {
            $posts[] = static::buildPost($row);
        }

        return $posts;
    }

    private static function buildPost(ActiveRow $row): Post
    {
        return new Post(
            $row->category->name,
            $row->created_ts,
            $row->content,
            $row->region ? $row->region->name : null,
            ($links = $row->related('post_link'))->count()
                ? static::buildLinks($links)
                : null,
            ($profiles = $row->related('post_profile'))->count()
                ? $profiles->select('profile.name, profile.url')->fetchPairs('name', 'url')
                : null
        );
    }

    /**
     * @param GroupedSelection $groupedSelection
     * @return array url indexed by name
     */
    private static function buildLinks(GroupedSelection $groupedSelection): array
    {
        $links = [];

        foreach ($groupedSelection as $link) {
            $links[$link->news_site->name] = $link->news_site->domain . $link->path;
        }

        return $links;
    }
}