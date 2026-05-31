<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Gate;
use Symfony\Component\HttpFoundation\Response;

final class NewsletterController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('newsletter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsletters = Newsletter::all();

        return view('admin.newsletters.index', compact('newsletters'));
    }
}
