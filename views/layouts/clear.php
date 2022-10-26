<?php 
    //tutorial 10

    use app\assets\AppAsset;

    /** @var $content string */
    /** @var $this \yii\web\View */

    AppAsset::register($this);
?>

<?php $this->beginPage() ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-sacale=1.0, minumum-s">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php echo $this->registerCsrfMetaTags() ?>

    <title>Document</title>

    <?php echo $this->head() ?>
</head>
<body>
    <?php echo $this->beginBody() ?>


    <div class="container">
        <?php echo $content ?>
    </div>


    <?php echo $this->endBody() ?>
</body>
</html>

<?php echo $this->endPage() ?>