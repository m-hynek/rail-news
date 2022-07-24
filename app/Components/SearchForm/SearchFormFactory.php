<?php

namespace App\Components\SearchForm;

use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;

class SearchFormFactory
{
    public function create(Presenter $presenter): Form
    {
        $form = new Form;
        $form->addText('query', 'Search railway news...');
        $form->onSuccess[] = function (Form $form, $data) use ($presenter): void {
            $presenter->redirect('this', ['query' => $data['query']]);
        };
        return $form;
    }
}