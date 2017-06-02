<?php


namespace App\Model\Rule;


class CpfCnpjRule
{
    public function __invoke($value, array $context)
    {

        if ($this->validateCpf($value)) {
            return true;
        }
        if ($this->validateCnpj($value)) {
            return true;
        }
        return false;
    }

    private function validateCpf($cpf)
    {
        $cpf = $this->cleanNumber($cpf);
        if (strlen($cpf) != 11) {
            return false;
        }
        $cpfArr = str_split($cpf);
        if (count(array_unique($cpfArr)) == 1) {
            return false;
        }
        $mod1 = $this->calculateModCpf(substr($cpf, 0, 9));
        if ($mod1 != $cpfArr[9]) {
            return false;
        }
        $mod2 = $this->calculateModCpf(substr($cpf, 0, 10));
        if ($mod2 != $cpfArr[10]) {
            return false;
        }
        return true;
    }

    private function calculateModCpf($number)
    {
        $numberArr = array_reverse(str_split($number));
        $length = strlen($number);
        $total = 0;
        for ($i = 2; $i <= $length + 1; $i++) {
            $total += $numberArr[$i - 2] * $i;
        }
        $mod = (($total * 10) % 11);
        $mod = $mod == 10 ? 0 : $mod;
        return $mod;
    }

    private function validateCnpj($cnpj)
    {
        $cnpj = $this->cleanNumber($cnpj);
        if (strlen($cnpj) != 14) {
            return false;
        }
        $verifyingDigit = str_split(substr($cnpj,-2));
        $mod1 = $this->calculateModCnpj(substr($cnpj,0,12));
        if($mod1 !=$verifyingDigit[0])
        {
            return false;
        }
        $mod2 = $this->calculateModCnpj(substr($cnpj,0,13));
        if($mod2 !=$verifyingDigit[1])
        {
            return false;
        }
        return true;
    }

    private function calculateModCnpj($number)
    {
        $weight = $this->generateWeight($number);
        $numberArr = str_split($number);
        $total = 0;
        for ($i = 0; $i < count($weight); $i++) {
            $total += $numberArr[$i] * $weight[$i];
        }
        $mod = ($total % 11);
        $mod = $mod <2 ? 0 : 11-$mod;
        return $mod;
    }

    private function generateWeight($number)
    {
        $weight = [];
        $i = 2;
        while (true) {
            if ($i > 9) {
                $i = 2;
            }
            if ($i > 1) {
                $weight[] = $i;
                $i++;
            }

            if (count($weight) === strlen($number)) {
                break;
            }

        }
        return array_reverse($weight);
    }

    private function cleanNumber($string)
    {
        $string = str_replace(' ', '', $string);
        return preg_replace('/[^0-9]/', '', $string);
    }
}