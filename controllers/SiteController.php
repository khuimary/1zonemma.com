<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\ActiveDataProvider;
use app\models\Posts;


class SiteController extends Controller
{
   
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

    
    public function actionIndex()
    {
        return $this->render('Index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
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
      // $this->layout = false;
        return $this->render('about');
        
    }
    
    public function actionBlog()
    {
        $dt_Posts = new ActiveDataProvider([
            'query'=> Posts::find()->orderBy('updated_at DESC'),
            'pagination'=>[
            'pageSize'=>3
        ]        
                
     ]);
          
          $this->layout = false;
        return $this->render('blog',[
         'dt_posts'=>$dt_Posts,  
        ]);
    }
    public function actionAthletics()
    {
        return $this->render('athletics');
    }
    
    public function actionWinner()
    {
        return $this->render('winner');
    }
    public function actionGallery()
    {
        return $this->render('gallery');
    }
    public function actionVideos()
    {
        return $this->render('videos');
    }
    public function actionNews()
    {
        $this->layout = false;
        return $this->render('news');
    }
     public function actionParticipants()
     {
         $model = newParticipant;
         if($model->load(Yii::$app->request->post()) && $model->validate())
             {
             Yii::$app->session->setFlash('success', 'your data have been successfully submitted');
         }
                 return $this->render('participants',['model'=>'$model']);

     }
     public function actionClasses()
     {
         $model = newClass;
         if($model->load(Yii::$app->request->post()) && $model->validate())
             {
             Yii::$app->session->setFlash('success', 'your data have been successfully submitted');
         }
                 return $this->render('classes',['model'=>'$model']);

     }
     public function actionLocation()
     {
         $model = newLocation;
         if($model->load(Yii::$app->request->post()) && $model->validate())
             {
             Yii::$app->session->setFlash('success', 'your data have been successfully submitted');
         }
                 return $this->render('location',['model'=>'$model']);

     }
     
     public function actionPosts()
     {
         $model = newPost;
         if($model->load(Yii::$app->request->post()) && $model->validate())
             {
             Yii::$app->session->setFlash('success', 'your data have been successfully submitted');
         }
                 return $this->render('posts',['model'=>'$model']);

     }
     public function actionRatings()
     {
         $model = newRating;
         if($model->load(Yii::$app->request->post()) && $model->validate())
             {
             Yii::$app->session->setFlash('success', 'your data have been successfully submitted');
         }
                 return $this->render('ratings',['model'=>'$model']);

     }
     public function actionTeachers()
     {
         $model = newTeacher;
         if($model->load(Yii::$app->request->post()) && $model->validate())
             {
             Yii::$app->session->setFlash('success', 'your data have been successfully submitted');
         }
                 return $this->render('teachers',['model'=>'$model']);

     }
     public function actionUserAccount()
     {
         $model = newUserAccount;
         if($model->load(Yii::$app->request->post()) && $model->validate())
             {
             Yii::$app->session->setFlash('success', 'your data have been successfully submitted');
         }
                 return $this->render('useraccount',['model'=>'$model']);

     }
     public function actionVenues()
     {
         $model = newVenue;
         if($model->load(Yii::$app->request->post()) && $model->validate())
             {
             Yii::$app->session->setFlash('success', 'your data have been successfully submitted');
         }
                 return $this->render('venues',['model'=>'$model']);

     }
}

