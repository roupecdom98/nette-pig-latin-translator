<?php

namespace App\Services\Translation;

class TranslationService
{
    // Pole samohlásek
    private const Vovels = ['a', 'e', 'i', 'o', 'u'];

    /**
     * @param $word
     *
     * @return string
     */
    function translateWordToPigLatin($word): string
    {

        // Pokud slovo začíná samohláskou, přidej "way" na konec
        if (in_array(strtolower($word[0]), self::Vovels)) {
            return $word . 'way';
        }

        // Jinak najdi první samohlásku
        $first_vowel_index = null;

        for ($i = 0; $i < strlen($word); $i++) {
            if (in_array(strtolower($word[$i]), self::Vovels)) {
                $first_vowel_index = $i;
                break;
            }
        }

        // Pokud není v slově žádná samohláska, vrať původní slovo
        if ($first_vowel_index === null) {
            return $word;
        }

        // Přesuň první část slova (před první samohláskou) na konec a přidej "ay"
        $prefix = substr($word, 0, $first_vowel_index);
        $suffix = substr($word, $first_vowel_index);

        return $suffix . $prefix . 'ay';
    }

}
