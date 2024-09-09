<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CheckoutForm extends Form
{
    #[Validate('required', message: 'Please fill out your both names.')]
    #[Validate('min:5', message: 'Please anter a meaningful name.')]
    public $client_name = '';

    #[Validate('required', message: 'Please fill out your mobile number.')]
    public $client_phone = '';

    #[Validate('required', message: 'Please fill out your email.')]
    #[Validate('email', message: 'Please enter a valid email.')]
    public $email = '';

    #[Validate('required', message: 'Please fill out your shipping address.')]
    public $shipping_address = '';

    #[Validate('required', message: 'Please choose payment type.')]
    public $payment_type = '';

    #[Validate('required', message: 'Please fill out your notes.')]
    #[Validate('max:500', message: 'Please order note should not exceed 500 words.')]
    public $notes = '';
}
