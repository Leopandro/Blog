<?php

namespace app\controllers;

use app\models\Post;
use yii\data\Pagination;
use Yii;
use yii\web\Controller;
use app\models\PostForm;

class PostController extends Controller
{
    public $defaultAction = 'index';

    public function actionIndex()
    {
        $model = new PostForm();
        if (!Yii::$app->user->isGuest)
        {
            if ($model->load(Yii::$app->request->post()) && $model->validate())
            {
                if ($model->send())
                {

                }
            }
        }
        else if ($model->load(Yii::$app->request->post()))
        {
            Yii::$app->session->setFlash('error', 'Необходимо зерегестрироваться');
            Yii::error('Необходимо зерегестрироваться');
        }
        $query = Post::find();
        $pagination = new Pagination([
            'defaultPageSize' => '5',
            'totalCount' => $query->count()
        ]);
        $posts = $query->orderBy(['date' => SORT_DESC ])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'model' => $model,
            'posts' => $posts,
            'pagination' => $pagination
        ]);
    }

}
