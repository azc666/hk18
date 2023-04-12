<?php

namespace App\Http\Livewire;

use Spatie\Browsershot\Browsershot;

use Livewire\Component;

class Testes extends Component
{
    public function mount()
    {
        $pathToImage = public_path('assets/proofs/hk99/testes666.jpg');

        // Browsershot::url('https://orderportal.biz/categories')
        Browsershot::url('http://hk14.test/product/101')
        ->setIncludePath('$PATH:/usr/bin')
        ->dismissDialogs()
        // ->waitUntilNetworkIdle()
        // ->setDelay(500)
        ->setOption('args', ['--disable-web-security'])
        ->authenticate('hk99', bcrypt('123123123'))
        // ->noSandbox()
        ->clip(50, 100, 550, 350)
        ->save($pathToImage);
    }

    public function render()
    {
        return view('livewire.testes');
    }
}
