<?php
//echo Yii::app()->request->baseUrl. '/source/images/gallery/';exit;
?>

<div class="space"></div>
<div class="form col-xs-12 bg-white">
    <div class="row bg-white">
        <?php $form = $this->beginWidget('CActiveForm', array(
            'id' => 'login-form',
            'method' => 'POST',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        )); ?>
        <?php if (Yii::app()->user->hasFlash('_error_')): ?>
            <div class="col-md-12">
                <div class="alert alert-danger">
                    <button data-dismiss="alert" class="close"></button>
                    <?php echo Yii::app()->user->getFlash('_error_'); ?>
                </div>
            </div>
        <?php endif; ?>


        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <?php echo $form->label($model, 'Current Password' . '<span style="color: #ff0000"> *</span>', array('class' => 'control-label')); ?>
                    <?php echo $form->passwordField($model, 'currentPassword', array(
                        'type' => 'text',
                        'size' => 40,
                    )); ?>
                    <?php echo $form->error($model, 'currentPassword'); ?>
                </div>
            </div>
            <div class="space"></div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <?php echo $form->label($model, 'New Password' . '<span style="color: #ff0000"> *</span>', array('class' => 'control-label')); ?>
                    <?php echo $form->passwordField($model, 'newPassword', array(
                        'type' => 'text',
                        'size' => 40,
                    )); ?>
                    <?php echo $form->error($model, 'newPassword'); ?>
                </div>
            </div>
            <div class="space"></div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <?php echo $form->label($model, 'Repeat New Password' . '<span style="color: #ff0000"> *</span>', array('class' => 'control-label')); ?>
                    <?php echo $form->passwordField($model, 'newPasswordRepeat', array(
                        'type' => 'text',
                        'size' => 40,
                    )); ?>
                    <?php echo $form->error($model, 'newPasswordRepeat'); ?>
                </div>

            </div>
            <div class="space"></div>
        </div>
        <div class="col-md-12">
            <?php echo CHtml::button(Yii::t('common', 'Save'), array(
                'type' => 'submit',
            )); ?>
        </div>
        <div class="space"></div>
        <?php $this->endWidget(); ?>
    </div>
</div>

