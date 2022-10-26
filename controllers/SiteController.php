<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\TestModel;
use PhpParser\Node\Stmt\Expression;
use yii\web\NotFoundHttpException;
use yii\web\ServerErrorHttpException;

class SiteController extends Controller
{
    //tutorial 10
    public $layout = 'main';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /*///tutorial 5
     public function beforeAction($action)
    {
        echo '<pre> 1. ';
            var_dump("Controller before action");
        echo '</pre>';

        return parent::beforeAction($action);

    }///////*/
    

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        //tutorial 10
        $this->layout = 'login';
        ///

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
     public function actionAbout()
    {
        return $this->render('about');
    }

    ///tutorial 2
    public function actionHello($message)
    {  
        return $this->render(view: 'hello');
    }

    ///tutorial 7
    public function actionTest(){

        $test = new TestModel();

        $post = [
            'name' => 'John',
            'surname' => 'Doe',
            'email' => 'john@example.com',
            'myAge' => 30,
        ];

        $test->attributes = $post;

        /*
        $test->name = 'John';
        $test->surname = 'Doe';
        $test->email = 'john@example.com';
        $test->myAge = 30;*/

        /*
        foreach ($test as $attr => $value) {
            echo $attr.' '.$test->getAttributeLabel($attr) . ' = ' . $value . '<br>';
        }*/

        if ($test->validate()){
            echo "OK";
        }else{
            echo '<pre>';
                var_dump($test->errors);
            echo '</pre>';

            echo "Error";
        }
        
        //echo $test['name'];
        /*
        echo '<pre>';
            var_dump($test->getAttributeLabel(attribute: 'surname'));
        echo '</pre>';
        */
    }

    ///tutorial 8
    public function actionRequest()
    {
        //echo $id;
        //$id = isset($_GET['id']) ? $_GET['id'] : null;
        //$id = Yii::$app->request->get(name:'id', defaultValue: 50);

        $get = Yii::$app->request->get();

        echo '<pre>';
            var_dump($get);
        echo '</pre>';
    }

    ///tutorial 9
    public function actionResponse()
    {
        //$response =  Yii::$app->response;
        //$response->statusCode = 500;

        //throw new NotFoundHttpException();
        //throw new ServerErrorHttpException();

        //$response->content = 'Hello i am here';

        //Yii::$app->response->content = 'Hello i am here';
        //return 'Hello i am here';

        /*
        Yii::$app->response->format = Response::FORMAT_JSON;
        return[
            'name' => 'Kate',
            'surname' => 'Sajin',
        ];*/

        //return $this->redirect(url:'about');
        //return Yii::$app->response->redirect(url:'about', statusCode: 301);

        return Yii::$app->response->sendContentAsFile(content:'Hello', attachmentName:'test.txt' );
    }
}
