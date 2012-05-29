<?php

return array(
    'modules' => array(
        'comments' => array(
            //you may override default config for all connecting models
            'defaultModelConfig' => array(
                //only registered users can post comments
                'registeredOnly' => false,
                'useCaptcha' => false,
                //allow comment tree
                'allowSubcommenting' => true,
                //display comments after moderation
                'premoderate' => false,
                //action for postig comment
                'postCommentAction' => 'comments/comment/postComment',
                //super user condition(display comment list in admin view and automoderate comments)
                'isSuperuser' => 'Yii::app()->user->checkAccess("moderate")',
                //order direction for comments
                'orderComments' => 'ASC',
            ),
            //the models for commenting
            'commentableModels' => array(
                //model with individual settings
                'Page' => array(
                    'registeredOnly' => false,
                    'useCaptcha' => false,
                    'allowSubcommenting' => true,
                ),
            //model with default settings
            //'Page',
            ),
            //config for user models, which is used in application
            'userConfig' => array(
                'class' => 'User',
                'nameProperty' => 'username',
                'emailProperty' => 'email',
            ),
        ),
    ),
);