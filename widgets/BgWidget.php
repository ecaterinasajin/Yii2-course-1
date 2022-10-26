<?php

    namespace app\widgets;

    use yii\base\Widget;
    use yii\helpers\Html;

use function PHPSTORM_META\argumentsSet;

    class BgWidget extends Widget
    {
        public $bgColor = 'red';

        public function init()
        {
            parent::init();
            ob_start();
        }

        public function run()
        {
            parent::run();
            $output = ob_get_clean();

            //return Html::tag(name:'div', content:$output);

            //return '<div>'.$output.'</div>';
        }
    }