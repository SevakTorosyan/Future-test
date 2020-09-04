<?php

namespace app\controllers;

use app\actions\CreateCommentAction;
use app\actions\GetCommentsAction;
use app\models\Comment;
use yii\web\Controller;

/**
 * Class CommentController
 * @package app\controllers
 */
class CommentController extends Controller
{
    /** @var string $modelClass */
    public $modelClass = Comment::class;

    /**
     * @return array
     */
    public function actions()
    {
        return [
            'create' => [
                'class' => CreateCommentAction::class,
            ],
            'get' => [
                'class' => GetCommentsAction::class,
            ],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}
