<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;

class Rewrite extends Component implements HasForms
{

    use InteractsWithForms;

   public $name = '';
   public $email = '';
   public $password = '';
   public $passwordConfirmation = '';



   protected function getFormSchema(): array
   {
    return [
        TextInput::make('name'),
        TextInput::make('email'),
        TextInput::make('password'),
        TextInput::make('passwordConfirmation')
    ];
   }

   public function register()
   {
    dd($this->form->getState());
   }


    public function render()
    {
        return view('livewire.rewrite');
    }
}
