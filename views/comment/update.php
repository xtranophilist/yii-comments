<?php
$this->breadcrumbs = array(
    Yii::t('app', $model->owner_name),
    Yii::t('app', 'Comments') => array('/comments'),
    Yii::t('app', 'Edit'),
);
if (!isset($this->menu) || $this->menu === array())
    $this->menu = array(
        array('label' => Yii::t('app', 'Delete'), 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->comment_id), 'confirm' => 'Are you sure you want to delete this item?')),);
?>

<h1> <?php echo Yii::t('app', 'Edit Comment'); ?></h1>
<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'comment-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,
            ));

    echo $form->errorSummary($model);
    ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'creator_id'); ?>
        <?php echo $form->dropDownList($model, 'creator_id', array_merge(array('0' => 'None'), CHtml::listData(User::model()->findAll(), 'id', 'username'))); ?>
        <?php echo $form->error($model, 'creator_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'user_name'); ?>
        <?php echo $form->textField($model, 'user_name', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'user_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'user_email'); ?>
        <?php echo $form->textField($model, 'user_email', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'user_email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'comment_text'); ?>
        <?php echo $form->textArea($model, 'comment_text', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'comment_text'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'status'); ?>
        <?php echo $form->dropDownList($model, 'status', array('0' => 'Pending', '1' => 'Active', '2' => 'Trashed')); ?>
        <?php echo $form->error($model, 'status'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'parent_comment_id'); ?>
        <?php
        //show all comments but current one
        $allModels = Comment::model()->findAll();
        foreach ($allModels as $key => $aModel) {
            if ($aModel->comment_id == $model->comment_id)
                unset($allModels[$key]);
        }
        echo $form->dropDownList($model, 'parent_comment_id', CHtml::listData($allModels, 'comment_id', 'comment_id'), array('prompt' => 'None'));
        ?>
        <?php echo $form->error($model, 'parent_comment_id'); ?>
    </div>

    <?php
    echo CHtml::submitButton(Yii::t('app', 'Save'));
    echo CHtml::Button(Yii::t('app', 'Cancel'), array(
        'submit' => 'javascript:history.go(-1)'));
    $this->endWidget();
    ?>
</div> <!-- form -->