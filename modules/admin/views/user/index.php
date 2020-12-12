<?php

use app\models\User;
use yii\bootstrap4\Html;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\forms\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered'
        ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'username',
                'value' => function (User $model) {
                        return Html::a(Html::encode($model->username), ['view', 'id' => $model->id]);
                },
                'format' => 'raw',
            ],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
            'email:email',
            //'verification_token',
            [
                'filter' => User::getRolesArray(),
                'attribute' => 'role',
                'value' => 'rolesName',
            ],
            [
                'filter' => User::getStatusesArray(),
                'attribute' => 'status',
                'value' => 'statusName',
            ],
            //'created_at',
            //'updated_at',

            [
                'class' => ActionColumn::class,
                'buttons' => [
                    'update' =>  function($url,$model) {
                        return Html::a('<i class="fas fa-edit"></i>', $url, [
                            'title' => Yii::t('app', 'update')
                        ]);
                    },
                    'view' =>  function($url,$model) {
                        return Html::a('<i class="fas fa-eye"></i>', $url, [
                            'title' => Yii::t('app', 'view')
                        ]);
                    },
                    'delete' => function($url,$model) {
                        return Html::a('<i class="fas fa-trash"></i>', $url, [
                            'title' => Yii::t('app', 'delete')
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
