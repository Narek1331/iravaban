<?php

namespace App\Repositories;

use App\Models\Feedback;

/**
 * Class FeedbackRepository
 *
 * Handles the data access logic for feedback.
 */
class FeedbackRepository
{
    /**
     * Create a new feedback.
     *
     * @param array $data
     * @return Feedback
     */
    public function create(array $data): Feedback
    {
        return Feedback::create($data);
    }
}
