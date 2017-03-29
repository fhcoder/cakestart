<?php
/**
 * Created by PhpStorm.
 * User: Fernando Henrique
 * Date: 26/07/2016
 * Time: 10:52
 */

namespace App\Controller\Component;


use Cake\Controller\Component;

class FormatComponent extends Component
{
    public function cleanString($string) {
        $string = str_replace(' ', '-', $string);
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    }

    public function cleanNumber($string) {
        $string = str_replace(' ', '', $string);
        return preg_replace('/[^0-9]/', '', $string);
    }

    public function formatToCurrency($input)
    {
        return number_format($input, 2, ',', '.');
    }

    public function formatToDate($input)
    {
        return date('d/m/Y', strtotime($input));
    }

    public function formatToDateTime($input)
    {
        return date('d/m/Y H:i:s', strtotime($input));
    }
    public function formatDateTimeToSql($date)
    {
        return date('Y-m-d H:i:s', strtotime(str_replace('/','-',$date)));
    }
    public function formatDateToSql($date)
    {
        return date('Y-m-d', strtotime(str_replace('/','-',$date)));
    }

    public function formatCurrencyToSql($input)
    {
        if ($input) {
            return str_replace(',', '.', str_replace('.', '', str_replace('R$','',$input)));
        }
        return 0;
    }
    public function search($search)
    {
        return '%'.$search.'%';
    }
}