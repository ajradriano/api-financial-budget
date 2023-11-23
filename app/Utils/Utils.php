<?php

namespace App\Utils;

class Utils
{
    /**
     * Perform the replacement of an accented letter
     * by the corresponding one without an accent.
     * @param $subject
     * @return string
     */
    public static function accentReplacer($subject): string
    {
        return preg_replace(
            array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),
            explode(" ","a A e E i I o O u U n N"),
            $subject
        );
    }

    public static function formatDate($date): string {
        $formattedDate = new \DateTime($date);
        return $formattedDate->format("d-m-Y");
    }

    public static function formatCurrency(float $valor)
    {
        return 'R$ ' . number_format($valor, 2, ',', '.');
    }
}
