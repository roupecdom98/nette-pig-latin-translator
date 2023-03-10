<?php

namespace App\UI\Components\Translation;

use App\Services\Translation\TranslationService;
use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use Nette\Neon\Exception;

class TranslationControl extends Control
{
    private string $translatedWord;

    public function __construct(
        private TranslationService $translationService
    ) { }

    /**
     * @return void
     */
    public function render(): void
    {
        if (isset($this->translatedWord)) {
            $this->template->translatedWord = $this->translatedWord;
        }

        $this->template->render(__DIR__ . '/translation-form.latte');
    }

    /**
     * @return Form
     */
    public function createComponentForm(): Form
    {
        $form = new Form();
        $form->addText('word', 'Slovo k přeložení');
        $form->addSubmit('send', 'Přeložit');
        $form->onSuccess[] = [$this, 'processForm'];

        return $form;
    }

    /**
     * @param Form $form
     * @param array $values
     *
     * @return void
     */
    public function processForm(Form $form, array $values): void
    {
        try {
            if (!empty($values['word'])) {
                $this->translatedWord = $this->translationService->translateWordToPigLatin($values['word']);
            }
        } catch (Exception $e) {
            $form->addError('...');
            return;
        }
    }
}
