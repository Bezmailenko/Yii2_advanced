<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Projects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Project', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                    'attribute' => 'title',
                'value' => function (\common\models\Project $model) {
                    return Html::a($model->title, ['view', 'id' => $model->id]);
                },
                'format' => 'html',
            ],
            [
                'attribute' => \common\models\Project::RELATION_PROJECT_USERS.'.role',
                'value' => function (\common\models\Project $model) {
                    return join(',', Yii::$app->projectService->getRoles($model, Yii::$app->user->identity));
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'active',
                'filter' => \common\models\Project::STATUS_LABELS,
                'value' => function (\common\models\Project $model) {
                    return \common\models\Project::STATUS_LABELS[$model->active];
                },
            ],
            'description:ntext',
            [
                'attribute' => 'created_by',
                'value' => function (\common\models\Project $model) {
                    return Html::a($model->createdBy->username,
                        ['user/view', 'id' => $model->createdBy->id]);
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'updated_by',
                'value' => function (\common\models\Project $model) {
                    return Html::a($model->updatedBy->username,
                        ['user/view', 'id' => $model->updatedBy->id]);
                },
                'format' => 'html',
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
