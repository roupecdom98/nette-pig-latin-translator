<?php

declare(strict_types=1);

namespace App\Presenters;

use App\UI\Form\TranslationFormFactory;
use Nette;
use Nette\Forms\Form;


final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    public function __construct(
        private TranslationFormFactory $translationFormFactory
    )
    { }

    protected function createComponentTranslationForm(): Form
    {
        $form = $this->translationFormFactory->create();
        return $form;
    }

    public function renderDefault(): void
    {
//        $this->createComponentTranslationForm()->render();
        $this->template->form = $this->createComponentSignInForm();
    }
}
