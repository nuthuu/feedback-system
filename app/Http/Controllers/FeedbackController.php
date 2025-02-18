<?php

namespace App\Http\Controllers;

use App\Models\FeedbackQuestion;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    // Get all feedback questions
    public function getFeedbackQuestions()
    {
        $questions = FeedbackQuestion::all();
        return response()->json($questions);
    }

    // Submit feedback
    public function submitFeedback(Request $request)
    {
        $request->validate([
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|exists:feedback_questions,id',
            'answers.*.choice' => 'required|string',
        ]);

        // Save the feedback
        Feedback::create([
            'user_id' => auth()->user()->id,
            'answers' => json_encode($request->answers),
        ]);

        return response()->json(['message' => 'Feedback submitted successfully!']);
    }
}
