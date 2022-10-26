<?php

    namespace app\models;

    use yii\base\Model;

    class TestModel extends Model{

        public $name;
        public $myAge;
        public $surname;
        public $email;


      public function attributeLabels()
      {
        //return parent::attributeLabels();
        return [
            'name' => 'Enter your name',
            'age' => 'Your age'
        ];
      }

      public function rules()
      {
        return [
            [['name', 'surname'], 'required', 'message'=> "Please enter your name"]
        
        ];
      }
    }