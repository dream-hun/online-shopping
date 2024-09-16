<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CheckoutForm extends Form
{
    #[Validate('required', message: 'Please fill out your full name.')]
    #[Validate('min:5', message: 'Please enter a meaningful name.')]
    public $client_name = '';

    #[Validate('required', message: 'Please fill out your mobile number.')]
    public $client_phone = '';

    #[Validate('required', message: 'Please fill out your email.')]
    #[Validate('email', message: 'Please enter a valid email.')]
    public $email = '';

    #[Validate('required', message: 'Please fill out your shipping address.')]
    public $shipping_address = '';

    #[Validate('required', message: 'Please choose a payment type.')]
    public $payment_type = '';

    #[Validate('required', message: 'Please choose one delivery method.')]
    public $delivery_method = '';

    #[Validate('nullable')]
    #[Validate('max:500', message: 'Order note should not exceed 500 characters.')]
    public $notes = '';
}
