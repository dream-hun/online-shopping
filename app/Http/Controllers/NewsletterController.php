<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $newsletter = new Newsletter;
        $newsletter->email = $request->email;
        $newsletter->save();

        return redirect()->back()->with('success', 'Thank you for subscribing with us, we will notify you for Any product we publish on our site');
    }
}
