<?php
    
    namespace App\Http\Livewire;
    
    use Livewire\Component;
    
    class Test extends Component
    {
        public $showModal = false;
        
        public $data = [
            'name' => null,
            'surname' => null,
        ];
        
        public function render()
        {
            return view('livewire.test');
        }
    }
