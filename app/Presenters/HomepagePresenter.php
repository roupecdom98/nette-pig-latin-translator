<?php

declare(strict_types=1);

namespace App\Presenters;

use App\UI\Components\Translation\TranslationControl;
use App\UI\Components\Translation\TranslationControlFactory;
use Nette;

final class HomepagePresenter extends Nette\Application\UI\Presenter
{
    public function __construct(
        private TranslationControlFactory $translationControlFactory
    ) { }

    /**
     * @return TranslationControl
     */
    protected function createComponentTranslationForm(): TranslationControl
    {
        return $this->translationControlFactory->create();
    }
}
