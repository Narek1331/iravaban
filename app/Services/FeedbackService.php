<?php

namespace App\Services;

use App\Repositories\FeedbackRepository;
use App\Models\Feedback;
use Illuminate\Http\Request;

/**
 * Class FeedbackService
 *
 * Handles business logic related to feedback.
 */
class FeedbackService
{
    protected $feedbackRepository;

    /**
     * FeedbackService constructor.
     *
     * @param FeedbackRepository $feedbackRepository
     */
    public function __construct(FeedbackRepository $feedbackRepository)
    {
        $this->feedbackRepository = $feedbackRepository;
    }

    /**
     * Store a new feedback.
     *
     * @param array $data
     * @return Feedback
     */
    public function store(array $data): Feedback
    {
        return $this->feedbackRepository->create($data);
    }
}
