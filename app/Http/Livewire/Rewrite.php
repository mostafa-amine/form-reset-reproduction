<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\Openai;
use App\Services\OpenaiService;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Concerns\InteractsWithForms;

class Rewrite extends Component implements HasForms
{

    use InteractsWithForms;

   // Text tone
   public $text_tone = [
    'formal' => 'Text Formal',
    'casual' => 'Text Casual',
    'persuasive' => 'Text Persuasive',
    'emotive' => 'Text Emotive',
   ];
   public $selected_t_tones = [];

   // Text Structure
   public $text_structure = [
    'concise' => 'Text concise',
    'coherent' => 'Text coherent',
    'logical' => 'Text logical'
   ];
   public $selected_t_structure = [];

   // Text Focus
   public $t_focus =  '';

   // Correcting errors or mistakes
   public $text_errors = [
    'spelling' => 'Correct spelling',
    'grammar' => 'Correct grammar',
    'punctuation' => 'Correct punctuation',
   ];
   public $selected_f_errors = [];

   // User Input
   public $user_input = '';

   // User Output
   public $user_output = '';

   // Result Status
   public $result_status = true;

   // Rewritng Tasks
   public $tasks = '';

   // Wizard Skippable
   public $skippable = false;


    protected function getFormSchema(): array
    {
        return [
            Wizard::make([
                Step::make('Your Text ')
                ->description('Write The Text To rewrite')
                ->schema([
                    Textarea::make('user_input')
                    ->label('Text')
                    ->required()
                ]),

                Step::make('Rewriting Tasks')
                ->description('Specify Your Text Rewriting Tasks')
                ->schema([
                    // Text Tone
                    Select::make('selected_t_tones')
                    ->multiple()
                    ->placeholder('Select Text Tones')
                    ->label('Text Tones')
                    ->options($this->text_tone)
                    ->searchable(),

                    // Text Structure
                    Select::make('selected_t_structure')
                    ->multiple()
                    ->placeholder('Select Text Structure')
                    ->label('Text Structure')
                    ->options($this->text_structure)
                    ->searchable(),

                    // Text Focus
                    TextInput::make('t_focus')
                    ->label('Text Focus'),

                    // Correct Errors
                    Select::make('selected_f_errors')
                    ->multiple()
                    ->placeholder('Select Erros types to fix')
                    ->label('Correct Errors')
                    ->options($this->text_errors)
                    ->searchable(),
                ]),
            ])
            ->submitAction(new HtmlString('<button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-700"> Generate </button>'))
            ->skippable($this->skippable),

        ];
    }

    public function rewritngTasks()
    {

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
