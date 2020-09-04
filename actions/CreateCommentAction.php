<?php

namespace app\actions;

use app\models\Comment;
use Throwable;
use Yii;
use yii\base\Action;

/**
 * Class CreateCommentAction
 * @package app\actions
 */
class CreateCommentAction extends Action
{
    /**
     * @return string
     */
    public function run()
    {
        try {
            $requestData = Yii::$app->request->post();
            if ($requestData) {
                $comment = new Comment();
                if (isset($requestData['username'])) {
                    $comment->setUsername($requestData['username']);
                }
                if (isset($requestData['text'])) {
                    $comment->setText($requestData['text']);
                }
                $comment->save();
            }
            return $this->controller->goBack();
        } catch (Throwable $error) {
            var_dump($error->getMessage());
            die();
        }
    }
}
