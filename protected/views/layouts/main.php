<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">

    <!--blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-material-design.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ripples.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Javascript-->
    <script style="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
    <script style="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.min.js"></script>
    <script style="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.js"></script>
    <script style="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/material.js"></script>
    <script style="javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/ripples.js"></script>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <script>
        $(function () {
            $.material.init();
        });
    </script>
</head>

<body>


<div class="navbar navbar-custom">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#w0-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logohome.png"
                                         width="70%"></a>
        </div>
        <div id="w0-collapse" class="navbar-collapse collapse navbar-responsive-collapse navbar-right">
            <?php $this->widget('zii.widgets.CMenu', array('htmlOptions' => array('id' => 'w1', 'class' => 'nav navbar-nav'),
                'items' => array(
                    array('label' => 'Home', 'url' => array('/')),
                    array('label' => 'Create', 'url' => array('//create')),
                    array('label' => 'Contact', 'url' => array('/index/contact')),
                    array('label' => 'Login', 'url' => array('/index/login'), 'visible' => Yii::app()->user->isGuest),
                    array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/index/logout'), 'visible' => !Yii::app()->user->isGuest)
                ),
            ));
            ?>
        </div>
    </div>
</div>


<div id="page">
    <?php if (isset($this->breadcrumbs)): ?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
            'links' => $this->breadcrumbs,
        )); ?>

    <?php endif ?>

    <?php echo $content; ?>

    <div class="clear"></div>

    <div id="footer">

    </div>

</div>
</body>
</html>
