<?php

namespace App\Classes;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Phone
{
    public static function phoneNumber($numb)
    {
        if (!is_numeric(substr($numb, 0, 1))  && !is_numeric(substr($numb, 1, 1))) {
            return $numb;
        }

        $chars = array(' ', '(', ')', '-', '.', '+');
        $numb = str_replace($chars, "", $numb);

        if (Auth::user()->username == 'HK34') {  // Bogotá 2-3-3-4
            $numb = '+' . substr($numb, 0, 2) . '.' . substr($numb, 2, 3) . '.' . substr($numb, 5, 3) . '.' . substr($numb, 8, 4);
        } elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK42') { // México
            $numb = '+' . substr($numb, 0, 2) . '.' . substr($numb, 2, 2) . '.' . substr($numb, 4, 4) . '.' . substr($numb, 8, 4);
        } elseif (Auth::user()->username == 'HK46' || Auth::user()->username == 'HK41') { // UK
            $numb = '+' . substr($numb, 0, 2) . '.' . substr($numb, 2, 2) . '.' . substr($numb, 4, 4) . '.' . substr($numb, 8, 4);
        } else {
            $numb = substr($numb, 0, 3) . '.' . substr($numb, 3, 3) . '.' . substr($numb, 6, 4);
        }

        return $numb;
    }

    public static function phoneNumber_2($numb_2)
    {
        if (!is_numeric(substr($numb_2, 0, 1))  && !is_numeric(substr($numb_2, 1, 1))) {
            return $numb_2;
        }

        $chars = array(' ', '(', ')', '-', '.', '+');
        $numb_2 = str_replace($chars, "", $numb_2);

        if (Auth::user()->username == 'HK34' && substr($numb_2, 0, 2) === '57') {  // Bogotá 2-3-3-4
            $numb_2 = '+' . substr($numb_2, 0, 2) . '.' . substr($numb_2, 2, 3) . '.' . substr($numb_2, 5, 3) . '.' . substr($numb_2, 8, 4);
        } elseif ((Auth::user()->username == 'HK35' || Auth::user()->username == 'HK42') && strlen($numb_2) !== 10) { // México
            $numb_2 = '+' . substr($numb_2, 0, 2) . '.' . substr($numb_2, 2, 2) . '.' . substr($numb_2, 4, 4) . '.' . substr($numb_2, 8, 4);
        } elseif ((Auth::user()->username == 'HK46' || Auth::user()->username == 'HK41') && strlen($numb_2) !== 10) { // UK
            $numb_2 = '+' . substr($numb_2, 0, 2) . '.' . substr($numb_2, 2, 2) . '.' . substr($numb_2, 4, 4) . '.' . substr($numb_2, 8, 4);
        } else {
            $numb_2 = substr($numb_2, 0, 3) . '.' . substr($numb_2, 3, 3) . '.' . substr($numb_2, 6, 4);
        }

        return $numb_2;
    }

    public static function cellNumber($numbcell)
    {
        if (!is_numeric(substr($numbcell, 0, 1))  && !is_numeric(substr($numbcell, 1, 1))) {
            return $numbcell;
        }

        $chars = array(' ', '(', ')', '-', '.', '+');
        $numbcell = str_replace($chars, "", $numbcell);

        if (Auth::user()->username == 'HK34') {  // Bogotá 2-3-3-4
            $numbcell = '+' . substr($numbcell, 0, 2) . '.' . substr($numbcell, 2, 3) . '.' . substr($numbcell, 5, 3) . '.' . substr($numbcell, 8, 4);
        } elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK42') { // México
            $numbcell = '+' . substr($numbcell, 0, 2) . '.' . substr($numbcell, 2, 2) . '.' . substr($numbcell, 4, 4) . '.' . substr($numbcell, 8, 4);
        // } elseif (Auth::user()->username == 'HK46' || Auth::user()->username == 'HK41') { // UK
        //     $numbcell = '+' . substr($numbcell, 0, 2) . '.' . substr($numbcell, 2, 4) . '.' . substr($numbcell, 6, 6);
        } elseif ((Auth::user()->username == 'HK46' || Auth::user()->username == 'HK41') && strlen($numbcell) !== 10) { // UK
            $numbcell = '+' . substr($numbcell, 0, 2) . '.' . substr($numbcell, 2, 2) . '.' . substr($numbcell, 4, 4) . '.' . substr($numbcell, 8, 4);
        } else {
            $numbcell = substr($numbcell, 0, 3) . '.' . substr($numbcell, 3, 3) . '.' . substr($numbcell, 6, 4);
        }

        return $numbcell;
    }

    public static function cellNumber_2($numbcell_2)
    {

        if (!is_numeric(substr($numbcell_2, 0, 1))  && !is_numeric(substr($numbcell_2, 1, 1))) {
            return $numbcell_2;
        }

        $chars = array(' ', '(', ')', '-', '.', '+');
        $numbcell_2 = str_replace($chars, "", $numbcell_2);

        if ((Auth::user()->username == 'HK34')) {  // Bogotá 2-3-3-4
            $numbcell_2 = '+' . substr($numbcell_2, 0, 2) . '.' . substr($numbcell_2, 2, 3) . '.' . substr($numbcell_2, 5, 3) . '.' . substr($numbcell_2, 8, 4);
        } elseif ((Auth::user()->username == 'HK35' || Auth::user()->username == 'HK42') && strlen($numbcell_2) !== 10) { // México
            $numbcell_2 = '+' . substr($numbcell_2, 0, 2) . '.' . substr($numbcell_2, 2, 2) . '.' . substr($numbcell_2, 4, 4) . '.' . substr($numbcell_2, 8, 4);
            // } elseif ((Auth::user()->username == 'HK46' || Auth::user()->username == 'HK41') && strlen($numbcell_2) !== 10) { // UK
            //     $numbcell_2 = '+' . substr($numbcell_2, 0, 2) . '.' . substr($numbcell_2, 2, 4) . '.' . substr($numbcell_2, 6, 6);
        } elseif ((Auth::user()->username == 'HK46' || Auth::user()->username == 'HK41') && strlen($numbcell_2) !== 10) { // UK
            $numbcell_2 = '+' . substr($numbcell_2, 0, 2) . '.' . substr($numbcell_2, 2, 2) . '.' . substr($numbcell_2, 4, 4) . '.' . substr($numbcell_2, 8, 4);
        } else {
            $numbcell_2 = substr($numbcell_2, 0, 3) . '.' . substr($numbcell_2, 3, 3) . '.' . substr($numbcell_2, 6, 4);
        }

        return $numbcell_2;
    }

    public static function faxNumber($numbfax)
    {

        if (!is_numeric(substr($numbfax, 0, 1))  && !is_numeric(substr($numbfax, 1, 1))) {
            return $numbfax;
        }

        $chars = array(' ', '(', ')', '-', '.', '+');
        $numbfax = str_replace($chars, "", $numbfax);

        if (Auth::user()->username == 'HK34') {  // Bogotá 2-3-3-4
            $numbfax = '+' . substr($numbfax, 0, 2) . '.' . substr($numbfax, 2, 3) . '.' . substr($numbfax, 5, 3) . '.' . substr($numbfax, 8, 4);
        } elseif (Auth::user()->username == 'HK35' || Auth::user()->username == 'HK42') { // México
            $numbfax = '+' . substr($numbfax, 0, 2) . '.' . substr($numbfax, 2, 2) . '.' . substr($numbfax, 4, 4) . '.' . substr($numbfax, 8, 4);
        } elseif (Auth::user()->username == 'HK46' || Auth::user()->username == 'HK41') { // UK
            $numbfax = '+' . substr($numbfax, 0, 2) . '.' . substr($numbfax, 2, 2) . '.' . substr($numbfax, 4, 4) . '.' . substr($numbfax, 8, 4);
        } else {
            $numbfax = substr($numbfax, 0, 3) . '.' . substr($numbfax, 3, 3) . '.' . substr($numbfax, 6, 4);
        }

        return $numbfax;
    }

    public static function faxNumber_2($numbfax_2)
    {

        if (!is_numeric(substr($numbfax_2, 0, 1))  && !is_numeric(substr($numbfax_2, 1, 1))) {
            return $numbfax_2;
        }

        $chars = array(' ', '(', ')', '-', '.', '+');
        $numbfax_2 = str_replace($chars, "", $numbfax_2);

        if (Auth::user()->username == 'HK34' && substr($numbfax_2, 0, 2) === '57') {  // Bogotá 2-3-3-4
            $numbfax_2 = '+' . substr($numbfax_2, 0, 2) . '.' . substr($numbfax_2, 2, 3) . '.' . substr($numbfax_2, 5, 3) . '.' . substr($numbfax_2, 8, 4);
        } elseif ((Auth::user()->username == 'HK35' || Auth::user()->username == 'HK42') && strlen($numbfax_2) !== 10) { // México
            $numbfax_2 = '+' . substr($numbfax_2, 0, 2) . '.' . substr($numbfax_2, 2, 2) . '.' . substr($numbfax_2, 4, 4) . '.' . substr($numbfax_2, 8, 4);
        } elseif ((Auth::user()->username == 'HK46' || Auth::user()->username == 'HK41') && strlen($numbfax_2) !== 10) { // UK
            $numbfax_2 = '+' . substr($numbfax_2, 0, 2) . '.' . substr($numbfax_2, 2, 2) . '.' . substr($numbfax_2, 4, 4) . '.' . substr($numbfax_2, 8, 4);
        } else {
            $numbfax_2 = substr($numbfax_2, 0, 3) . '.' . substr($numbfax_2, 3, 3) . '.' . substr($numbfax_2, 6, 4);
        }

        return $numbfax_2;
    }
}