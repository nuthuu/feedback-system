<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedbackController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('reset-password', [AuthController::class, 'resetPassword']);

Route::middleware('auth:api')->group(function () {
    Route::post('feedback', [FeedbackController::class, 'store']);
    Route::get('feedback-history', [FeedbackController::class, 'history']);
    Route::middleware('auth:api')->get('/feedback-questions', [FeedbackController::class, 'getFeedbackQuestions']);
    Route::middleware('auth:api')->post('/submit-feedback', [FeedbackController::class, 'submitFeedback']);
});
