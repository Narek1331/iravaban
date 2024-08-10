<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackStoreRequest;
use App\Services\FeedbackService;
use Illuminate\Http\RedirectResponse;

/**
 * Class FeedbackController
 *
 * Handles HTTP requests for feedback.
 */
class FeedbackController extends Controller
{
    protected $feedbackService;

    /**
     * FeedbackController constructor.
     *
     * @param FeedbackService $feedbackService
     */
    public function __construct(FeedbackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }

    /**
     * Store a new feedback.
     *
     * @param FeedbackStoreRequest $request
     * @return RedirectResponse
     */
    public function store(FeedbackStoreRequest $request): RedirectResponse
    {
        try {
            $this->feedbackService->store($request->validated());
            return redirect()->back()->with('success', __('main.Feedback submitted successfully'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }
    }
}
