<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'project_id',
                'label' => 'Project',
                'filter' => Html::activeDropDownList($searchModel, 'project_id',
                    $projectList,
                    [
                            'prompt' => 'Selected project', 'class' => 'form-control form-control-sm'
                    ]),
                'value' => function (\common\models\Task $model) {
                    return Html::a($model->project->title,
                        ['project/view', 'id' => $model->project->id]);
                },
                'format' => 'html',
            ],
            'title',
            'description:ntext',
            'estimation',
            [
                'attribute' => 'executor_id',
                'label' => 'Executor Name',
                'filter' => \common\models\User::getActiveList(),
                'value' => function (\common\models\Task $model) {
                    return Html::a($model->executor->username,
                        ['user/view', 'id' => $model->executor->id]);
                },
                'format' => 'html',
            ],
            'started_at:datetime',
            'completed_at:datetime',
            [
                'attribute' => 'created_by',
                'label' => 'Created Name',
                'filter' => \common\models\User::getActiveList(),
                'value' => function (\common\models\Task $model) {
                    return Html::a($model->createdByName,
                        ['user/view', 'id' => $model->createdById]);
                }
,
                'format' => 'html',
            ],
            'updatedBy.username',
            'created_at:datetime',
            'updated_at:datetime',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {take} {complete}',
                'buttons' => [
                    'take' => function ($url, \common\models\Task $model, $key) {
                        $icon = \yii\bootstrap\Html::icon('hand-right');
                        return Html::a($icon, ['task/take', 'id' => $model->id], ['data' => [
                            'confirm' => 'Берете задачу?',
                            'method' => 'post'
                        ],]);
                    },

                    'complete' => function ($url, \common\models\Task $model) {
                        $icon = \yii\bootstrap\Html::icon('ok');
                        return Html::a($icon, ['task/complete', 'id' => $model->id], ['data' => [
                            'confirm' => 'Завершить задачу?',
                            'method' => 'post',
                        ],]);
                    },
                ],
                'visibleButtons' => [
                    'update' => function (\common\models\Task $model) {
                        return Yii::$app->taskService->canManage($model, Yii::$app->user->identity);
                    },

                    'delete' => function (\common\models\Task $model) {
                        return Yii::$app->taskService->canManage($model, Yii::$app->user->identity);
                    },

                    'take' => function (\common\models\Task $model) {
                        return Yii::$app->taskService->canTake($model, Yii::$app->user->identity);
                    },

                    'complete' => function(common\models\Task $model) {
                        return Yii::$app->taskService->canComplete($model, Yii::$app->user->identity);
                    } ,
                ],
            ],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
