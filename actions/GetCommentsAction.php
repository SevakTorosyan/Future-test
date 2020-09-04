<?php

namespace app\actions;

use app\models\Comment;
use yii\base\Action;
use yii\data\Pagination;

/**
 * Class GetCommentsAction
 * @package app\actions
 */
class GetCommentsAction extends Action
{
    public const MAX_COMMENTS_LIMIT = 3;

    /**
     * @return string
     */
    public function run()
    {
        $commentsQuery = Comment::find()->orderBy(['created_at' => SORT_DESC]);
        $pages = new Pagination(['totalCount' => $commentsQuery->count()]);
        $pages->setPageSize(self::MAX_COMMENTS_LIMIT);
        $comments = $commentsQuery->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->controller->render('index', [
            'comments' => $comments,
            'pages' => $pages,
        ]);
    }
}
