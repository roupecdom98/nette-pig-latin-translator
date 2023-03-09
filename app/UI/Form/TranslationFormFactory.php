<?php

namespace App\UI\Form;

use App\Services\TranslationService;
use Nette\Forms\Form;

class TranslationFormFactory
{
    public function __construct(
        private TranslationService $translationService
    )
    {}

    public function create(): Form
    {
        $form = new Form();
        $form->addText('word', 'Slovo');
        $form->addSubmit('send', 'Odeslat');

        $form->onSuccess[] = function (Form $form, $data): void {
        };

        return $form;
    }
}
