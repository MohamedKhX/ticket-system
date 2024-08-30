<?php

namespace App\Livewire\Forms;

use App\Models\Airline;
use App\Models\CustomerMessage;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Customer extends Component
{
    #[Validate('required|min:3')]
    public string $name;

    #[Validate('required|email')]
    public string $email;

    #[Validate('required|numeric')]
    public string $phone_number;

    #[Validate('required')]
    public int|string $airline_id = 1;

    #[Validate('required|min:3')]
    public string $message;

    public function submit()
    {
        $message = new CustomerMessage();

        $message->name = $this->name;
        $message->email = $this->email;
        $message->phone = $this->phone_number;
        $message->airline_id = $this->airline_id;
        $message->message = $this->message;

        $message->save();

        session()->flash('success', 'تم بعت الرسالة بنجاح!');

        $this->name = '';
        $this->email = '';
        $this->phone_number = '';
        $this->airline_id = '';
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.forms.customer', [
            'airlines' => Airline::all(),
        ]);
    }
}
