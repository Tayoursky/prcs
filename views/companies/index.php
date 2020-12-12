<?php



/* @var $this yii\web\View */
/* @var $searchModel app\forms\CompaniesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use app\models\Companies;
use yii\bootstrap4\Html;
use yii\grid\GridView;

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
            $isAdmin = (Yii::$app->user->identity ? (Yii::$app->user->identity->role == 'admin') : false);
            if ($isAdmin) {
               echo Html::a('Create Companies', ['create'], ['class' => 'btn btn-success']);
            }
        ?>

    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'name',
                'value' => function (Companies $model) {
                    return Html::a(Html::encode($model->name), ['view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            'inn',
            'name_boss',
            'address:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
                'buttons' => [
                    'update' =>  function($url,$model) {
                        return Html::a('<i class="fas fa-edit"></i>', $url, [
                            'title' => 'update'
                        ]);
                    },
                    'view' =>  function($url,$model) {
                        return Html::a('<i class="fas fa-eye"></i>', $url, [
                            'title' => 'view'
                        ]);
                    },
                    'delete' => function($url,$model) {
                        return Html::a('<i class="fas fa-trash"></i>', $url, [
                            'title' => 'delete',
                        ]);
                    }
                ],
                'visible' => $isAdmin,
            ],
        ],
    ]); ?>

    <?php \yii\widgets\Pjax::end(); ?>
</div>
