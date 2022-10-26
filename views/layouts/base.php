<?php 
    //tutorial 10

    use app\assets\AppAsset;

    /** @var $content string */
    /** @var $this \yii\web\View */

    AppAsset::register($this);
?>

<?php $this->beginContent(viewFile: '@app/views/layouts/clear.php') ?>

<header>    
        Header
</header>

<div class="container">
      <div class="row">
        <div class="col-sm-9">
            <?php echo $content ?> 
        </div>
        <div class="col-sm-3">
            <ul class="list-group">
                <li class="list-group-item">Sidebar Item 1</li>
                <li class="list-group-item">Sidebar Item 2</li>
                <li class="list-group-item">Sidebar Item 3</li>
            </ul>

            <?php if (isset($this->blocks['sidebar'])): ?>
                <hr>
                 <?php echo $this->blocks['sidebar'] ?>
            <?php endif; ?>

        </div>
      </div>
</div>

<footer>
        Footer
</footer>

<?php $this->endContent(); ?>