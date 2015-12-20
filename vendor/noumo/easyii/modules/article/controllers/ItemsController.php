<?php
namespace yii\easyii\modules\article\controllers;

use Yii;
use yii\easyii\behaviors\SortableDateController;
use yii\easyii\behaviors\StatusController;
use yii\web\UploadedFile;

use yii\easyii\components\Controller;
use yii\easyii\modules\article\models\Category;
use yii\easyii\modules\article\models\Item;
use yii\easyii\helpers\Image;
use yii\widgets\ActiveForm;
use yii\filters\AccessControl;


class ItemsController extends Controller
{
    //public $rootActions = 'all';
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['clearImage', 'delete', 'up', 'down', 'on', 'off'],
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function() {
                            $item = Item::findOne(Yii::$app->getRequest()->getQueryParam('id'));
                            $tree = ($item) ? $item->category->tree : null;
                            
                            if(IS_ROOT) {
                                return true;
                            } elseif((Yii::$app->user->identity->role == 'admin') && in_array($tree, Yii::$app->user->identity->controlCates())) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                    ],
                ],
            ],
            [
                'class' => SortableDateController::className(),
                'model' => Item::className(),
            ],
            [
            'class' => StatusController::className(),
            'model' => Item::className()
            ]
        ];
    }

    public function actionIndex($id)
    {
        if(!($model = Category::findOne($id))){
            return $this->redirect(['/admin/'.$this->module->id]);
        }
        
        if(!IS_ROOT && !in_array($model->tree, Yii::$app->user->identity->controlCates())) {
            throw new \yii\web\ForbiddenHttpException('You cannot access this action');
        } 
        
        return $this->render('index', [
            'model' => $model
        ]);
    }


    public function actionCreate($id)
    {
        if(!($category = Category::findOne($id))){
            return $this->redirect(['/admin/'.$this->module->id]);
        }
        
        if(!IS_ROOT && !in_array($category->tree, Yii::$app->user->identity->controlCates())) {
            throw new \yii\web\ForbiddenHttpException('You cannot access this action');
        } 
        
        $model = new Item();
        $model->cate = $id;
        $type = Yii::$app->getRequest()->getQueryParam('type');
        if (($type == "2")) {
            $model->type = 2;
        } elseif ($type == "3") {
            $model->scenario = Item::SCENARIO_POST_VIDEO;
            $model->type = 3;
        } else {
            $model->scenario = Item::SCENARIO_POST_TEXT;
            $model->type = 1;
        }

        if ($model->load(Yii::$app->request->post())) {
            if(Yii::$app->request->isAjax){
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            else {
                $model->category_id = $category->primaryKey;

                if (isset($_FILES) && $this->module->settings['articleThumb']) {
                    $model->image = UploadedFile::getInstance($model, 'image');
                    if ($model->image && $model->validate(['image'])) {
                        $model->image = Image::upload($model->image, 'article');
                    } else {
                        $model->image = '';
                    }
                }

                if ($model->save()) {
                    $this->flash('success', Yii::t('easyii/article', 'Article created'));
                    if ($model->type == "2") {
                        return $this->redirect(['/admin/'.$this->module->id.'/items/edit', 'id' => $model->primaryKey]);
                    } else {
                        return $this->redirect(['/admin/'.$this->module->id.'/items/', 'id' => $model->cate]);
                    }
                } else {
                    $this->flash('error', Yii::t('easyii', 'Create error. {0}', $model->formatErrors()));
                    return $this->refresh();
                }
            }
        }
        else {
            return $this->render('create', [
                'model' => $model,
                'category' => $category,
            ]);
        }
    }

    public function actionEdit($id)
    {
        if(!($model = Item::findOne($id))){
            return $this->redirect(['/admin/'.$this->module->id]);
        }
        
        if (!IS_ROOT && ((ROLE == 'admin') && (!in_array($model->category->tree, Yii::$app->user->identity->controlCates())) ) && ($model->owner != Yii::$app->user->identity->id)) {
            throw new \yii\web\ForbiddenHttpException('You cannot access this action');
        }
        
        if (($model->type == "1")) {
            $model->scenario = Item::SCENARIO_POST_TEXT;
        } elseif ($model->type == "3") {
            $model->scenario = Item::SCENARIO_POST_VIDEO;
        } 
        
        
        if ($model->load(Yii::$app->request->post())) {
            if(Yii::$app->request->isAjax){
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            else {
                if (isset($_FILES) && $this->module->settings['articleThumb']) {
                    $model->image = UploadedFile::getInstance($model, 'image');
                    if ($model->image && $model->validate(['image'])) {
                        $model->image = Image::upload($model->image, 'article');
                    } else {
                        $model->image = $model->oldAttributes['image'];
                    }
                }

                if ($model->save()) {
                    $this->flash('success', Yii::t('easyii/article', 'Article updated'));
                    return $this->redirect(['/admin/'.$this->module->id.'/items/edit', 'id' => $model->primaryKey]);
                } else {
                    $this->flash('error', Yii::t('easyii', 'Update error. {0}', $model->formatErrors()));
                    return $this->refresh();
                }
            }
        }
        else {
            return $this->render('edit', [
                'model' => $model,
            ]);
        }
    }

    public function actionPhotos($id)
    {
        if(!($model = Item::findOne($id))){
            return $this->redirect(['/admin/'.$this->module->id]);
        }
        
         if (!IS_ROOT && ((ROLE == 'admin') && (!in_array($model->category->tree, Yii::$app->user->identity->controlCates())) ) && ($model->owner != Yii::$app->user->identity->id)) {
            throw new \yii\web\ForbiddenHttpException('You cannot access this action');
        }
        
        if ($model->type != '2') {
            return $this->redirect(['/admin/'.$this->module->id]);
        }
        
        return $this->render('photos', [
            'model' => $model,
        ]);
    }

    public function actionClearImage($id)
    {
        $model = Item::findOne($id);

        if($model === null){
            $this->flash('error', Yii::t('easyii', 'Not found'));
        }
        elseif($model->image){
            $model->image = '';
            if($model->update()){
                $this->flash('success', Yii::t('easyii', 'Image cleared'));
            } else {
                $this->flash('error', Yii::t('easyii', 'Update error. {0}', $model->formatErrors()));
            }
        }
        return $this->back();
    }

    public function actionDelete($id)
    {
        if(($model = Item::findOne($id))){
            $model->delete();
        } else {
            $this->error = Yii::t('easyii', 'Not found');
        }
        return $this->formatResponse(Yii::t('easyii/article', 'Article deleted'));
    }

    public function actionUp($id, $category_id)
    {
        return $this->move($id, 'up', ['category_id' => $category_id]);
    }

    public function actionDown($id, $category_id)
    {
        return $this->move($id, 'down', ['category_id' => $category_id]);
    }

    public function actionOn($id)
    {
        return $this->changeStatus($id, Item::STATUS_ON);
    }

    public function actionOff($id)
    {
        return $this->changeStatus($id, Item::STATUS_OFF);
    }
    
    public function actionPin($id) {
        if(($model = Item::findOne($id))){
            $model->time = time();
            $model->update();
        }
        else{
            $this->error = Yii::t('easyii', 'Not found');
        }

        return $this->owner->formatResponse(Yii::t('easyii', 'Pin successfully'));
    }
    
}