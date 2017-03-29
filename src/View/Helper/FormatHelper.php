<?php
/**
 * Created by PhpStorm.
 * User: Fernando Henrique
 * Date: 29/12/2015
 * Time: 18:13
 */

namespace App\View\Helper;


use Cake\View\Helper;

class FormatHelper extends Helper
{
    private $months = [
        'Jan' => 'Janeiro',
        'Feb' => 'Fevereiro',
        'Mar' => 'Março',
        'Apr' => 'Abril',
        'May' => 'Maio',
        'Jun' => 'Junho',
        'Jul' => 'Julho',
        'Aug' => 'Agosto',
        'Nov' => 'Novembro',
        'Sep' => 'Setembro',
        'Oct' => 'Outubro',
        'Dec' => 'Dezembro'
    ];
    private $weeks = [
        'Sun' => 'Domingo',
        'Mon' => 'Segunda-Feira',
        'Tue' => 'Terca-Feira',
        'Wed' => 'Quarta-Feira',
        'Thu' => 'Quinta-Feira',
        'Fri' => 'Sexta-Feira',
        'Sat' => 'Sábado'
    ];
    public function currency($number)
    {
        return number_format($number, '2', ',', '.');
    }

    public function date($dateString, $separator = '/')
    {
        return date('d' . $separator . 'm' . $separator . 'Y', strtotime(str_replace('/','-',$dateString)));
    }

    public function dateTime($dateTimeString, $separator = '/')
    {
        return date('d' . $separator . 'm' . $separator . 'Y H:i:s', strtotime(str_replace('/','-',$dateTimeString)));
    }

    public function time($timeString)
    {
        return date('H:i:s', strtotime($timeString));
    }

    public function getMonthName($date)
    {
        $mes = date('M',strtotime(str_replace('/','-',$date)));
        return $this->months[$mes];
    }

    public function getWeekName($date)
    {
        $week = date('D',strtotime(str_replace('/','-',$date)));
        return $this->weeks[$week];
    }

    public function cpf($cpf)
    {
        return $this->mask($cpf,'999.999.999-99');
    }
    public function cnpj($cnpj)
    {
        return $this->mask($cnpj,'99.999.999/9999-99');
    }
    public function cpfCnpj($cpfCnpj)
    {
        if(strlen($cpfCnpj)==0)
        {
            return '-';
        }
        if(strlen($cpfCnpj)<=11)
        {
            return $this->mask($cpfCnpj,'999.999.999-99');
        }
        return $this->mask($cpfCnpj,'99.999.999/9999-99');
    }
    public function phone($phone)
    {
        if(strlen($phone)<7)
        {
            throw new \Exception('Telefone inválido');
        }
        if(strlen($phone)==7)
        {
            return $this->mask($phone,'(99)999-9999');
        }
        if(strlen($phone)==8)
        {
            return $this->mask($phone,'(99)9999-9999');
        }
        if(strlen($phone)==9)
        {
            return $this->mask($phone,'(99)9999-99999');
        }
        if(strlen($phone)==10)
        {
            return $this->mask($phone,'(99)99999-99999');
        }

    }
    public function mask($input, $mask)
    {
        $result = '';
        $insert = 0;
        for ($i = 0; $i < strlen($mask); $i++) {
            if (!$this->checkSpecialCharacter($mask[$i])) {

                $result .= isset($input[$i - $insert])?$input[$i - $insert]:'';
                continue;
            }
            $result .= $mask[$i];
            $insert++;
        }
        return $result;
    }

    private function checkSpecialCharacter($char)
    {
        $options = ["options" => ["regexp" => "/[A-Za-z0-9]/"]];
        $result = filter_var($char, FILTER_VALIDATE_REGEXP, $options);
        return empty($result);
    }

    public function getMonthsPeriod($begin, $end)
    {

        $interval = new \DateInterval('P1M');
        $daterange = new \DatePeriod($begin, $interval ,$end);
        $total = 0;
        foreach ($daterange as $item) {
            $total++;
        }
        return $total;
    }
    public function escapeScriptTag($html)
    {
        return preg_replace('#<script(.*?)>(.*?)</script>#is', '', $html);
    }
}