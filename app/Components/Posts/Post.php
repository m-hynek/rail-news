<?php declare(strict_types=1);

namespace App\Components\Posts;

use Nette\Utils\DateTime;
use Nette\Utils\Html;

//helper data structure class, so we don't work with backend classes in template
class Post
{
    public string $created;

    /**
     * @param string $category
     * @param DateTime $createdDt
     * @param string $content
     * @param string|null $region
     * @param array|null $links url indexed by news site name
     * @param array|null $profiles url indexed by profile name
     */
    public function __construct(
        public string  $category,
        DateTime       $createdDt,
        public string  $content,
        public ?string $region,
        public ?array  $links,
        ?array         $profiles
    )
    {
        $this->created = static::formatDateTime($createdDt);

        if ($profiles) {
            $this->content = static::addProfileLinks($content, $profiles);
        }
    }

    private static function formatDateTime(DateTime $dateTime): string
    {
        if ($dateTime >= DateTime::from('today')) {
            return 'Today, ' . $dateTime->format('H:i');
        } else if ($dateTime >= DateTime::from('yesterday')) {
            return 'Yesterday, ' . $dateTime->format('H:i');
        }

        //If we want to display last year news, year should be added for last year news, ignoring for now
        return $dateTime->format('d-m H:i');
    }

    /**
     * @param string $content
     * @param array $profiles url indexed by profile name
     * @return string
     */
    private static function addProfileLinks(string $content, array $profiles): string
    {
        foreach ($profiles as $name => $url) {
            $link = Html::el('a target="_blank"')
                ->setText($name)
                ->href($url)
                ->toHtml();
            $content = str_replace($name, $link, $content);
        }
        return $content;
    }
}