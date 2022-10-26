<?php 
    //tutorial 10

    use app\assets\AppAsset;

    /** @var $content string */
    /** @var $this \yii\web\View */

    AppAsset::register($this);
?>

<?php $this->beginContent(viewFile: '@app/views/layouts/clear.php') ?>

<div class="container">
        <?php echo $content ?>
</div>

<?php $this->endContent(); ?>