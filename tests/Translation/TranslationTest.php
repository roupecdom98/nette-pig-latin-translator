<?php
namespace Translation;

require __DIR__ . '/../bootstrap.php';

use App\Services\Translation\TranslationService;
use Tester\Assert;
use Tester\TestCase;

/** @testCase */
class TranslationTest extends TestCase
{
    public function testTranslation()
    {
        $translationService = new TranslationService();
        Assert::same('ellcomeway', $translationService->translateWordToPigLatin('Wellcome'));
        Assert::same('ananabay', $translationService->translateWordToPigLatin('Banana'));
        Assert::same('implesay', $translationService->translateWordToPigLatin('Simple'));
        Assert::same('onesthay', $translationService->translateWordToPigLatin('Honest'));
        Assert::same('explainway', $translationService->translateWordToPigLatin('Explain'));
    }
}

(new TranslationTest())->run();
