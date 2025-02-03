<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'feedback' => 'required',
        ]);

        $feedback = new Feedback();
        $feedback->user_id = auth()->user()->id;
        $feedback->feedback = $request->feedback;
        $feedback->save();

        return response()->json(['message' => 'Feedback submitted successfully.']);
    }

    public function history()
    {
        $feedback = Feedback::where('user_id', auth()->user()->id)->get();
        return response()->json($feedback);
    }
}

