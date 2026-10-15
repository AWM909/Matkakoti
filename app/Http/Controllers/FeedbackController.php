<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public const CATEGORIES = [
        'sivut' => 'Sivusto',
        'majoitus' => 'Majoitus',
        'muu' => 'Muu ajankohtainen asia',
    ];

    public function create()
    {
        return view('feedback.create', ['categories' => self::CATEGORIES]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['nullable', 'email', 'max:255'],
            'category' => ['required', 'in:' . implode(',', array_keys(self::CATEGORIES))],
            'message' => ['required', 'string', 'min:5', 'max:2000'],
        ]);

        Feedback::create($data);

        return redirect()->route('feedback.create')->with('success', 'Kiitos palautteesta!');
    }
}
