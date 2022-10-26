<?php

namespace app\controllers;

use Symfony\Component\VarDumper\Cloner\Data;
use yii\web\Controller;

use function PHPSTORM_META\argumentsSet;

class PageController extends Controller{

    public function actionAbout(){

        $this->view->params['sharedVariable'] = 'I am shared';
        return $this->render(view:'about');
    }
}

?>