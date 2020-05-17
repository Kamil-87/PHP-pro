<?php

namespace App\controllers;

use App\entities\Feedback;
use App\repositories\FeedbackRepository;

class FeedbackController extends Controller
{

    public function allAction()
    {
        $feedback = $this->getRepository('Feedback')->getAll();
        return $this->render(
            'feedback',
            [
                'title' => $this->app->getConfig('title'),
                'menu' => $this->getMenu(),
                'feedback' => $feedback,
            ]
        );

    }

    public function insertAction()
    {

    }
}
