<?php

namespace App\Services;

class TranslationService
{
    /**
     * @param $word
     *
     * @return string
     */
    public function translateWord($word): string
    {
        $vowels = array('a', 'e', 'i', 'o', 'u');

        if (in_array(strtolower($word[0]), $vowels)) {
            return $word . 'way';
        } else {
            $len = strlen($word);

            for ($i = 0; $i < $len; $i++) {
                if (in_array(strtolower($word[$i]), $vowels)) {
                    return substr($word, $i) . substr($word, 0, $i) . 'ay';
                }
            }
        }
        return $word . 'ay';
    }
}
