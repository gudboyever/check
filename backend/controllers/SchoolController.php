<?php

namespace backend\controllers;

use Yii;
use backend\models\School;
use backend\models\SchoolSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\Json;
use yii\widgets\ActiveForm;

/**
 * SchoolController implements the CRUD actions for School model.
 */
class SchoolController extends CommonController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all School models.
     * @return mixed
     */
    public function actionIndex($page="",$id="")
    {
        $session = Yii::$app->session;

        $searchModel = new SchoolSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        if($id != null)
        {
            $session->set('drop_page_id', $id);	
            $dataProvider->pagination->pageSize = $id;
        }
        else
        {
            $session->remove('drop_page_id');
            $dataProvider->pagination->pageSize = 5;
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'baseURL' => $this->base_url,
        ]);
    }

    /**
     * Displays a single School model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new School model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new School();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) 
        {
            $model->auth_key = Yii::$app->security->generateRandomString();
            $model->password_hash =  Yii::$app->getSecurity()->generatePasswordHash($model->password_hash);
            $model->CreatedDate = $this->timeConversion();
            $model->UpdatedDate = $this->timeConversion();

            $file = UploadedFile::getInstance($model, 'LogoImgURL');

            $ImguploadDir =  'images/img';
                                
            $Imgfilename = md5(uniqid());
        
            $Imgfileext = $file->extension;
        
            $uploadFile = $ImguploadDir.$Imgfilename.".".$Imgfileext;
        
                if(move_uploaded_file($file->tempName, $uploadFile))
                {
                    // Prepare remote upload data
                    $uploadRequest = array('fileName' => $Imgfilename.".".$Imgfileext."",'fileData' => base64_encode(file_get_contents($uploadFile)));

                    // Execute remote upload
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, $this->upload_url.'/images/upload.php');
                    curl_setopt($curl, CURLOPT_TIMEOUT, 1000);
                    curl_setopt($curl, CURLOPT_POST, 1);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $uploadRequest);
                    $response = curl_exec($curl);
                    curl_close($curl);
                    
                    // Now delete local temp file
                    unlink($uploadFile);
                    
                    $model->LogoImgURL = '/images/img/'.$uploadRequest['fileName'];
                }
                else
                {
                    echo "Possible file upload attack!\n";
                }

            if($model->save())
            {
                return $this->redirect(['index', 'id' => $model->Id]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing School model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()))
        {
            Yii::$app->response->format = 'json';
            return ActiveForm::validate($model);
        }

        $schoolModel = School::find()->where(['Id' => $id])->one();

        $Logo = $schoolModel->LogoImgURL;

        if ($model->load(Yii::$app->request->post())) {

            $model->UpdatedDate = $this->timeConversion();

            $file = UploadedFile::getInstance($model, 'LogoImgURL');

            if($file != null)
            {
                $ImguploadDir =  'images/img';
                                
                $Imgfilename = md5(uniqid());
            
                $Imgfileext = $file->extension;
            
                $uploadFile = $ImguploadDir.$Imgfilename.".".$Imgfileext;
            
                    if(move_uploaded_file($file->tempName, $uploadFile))
                    {
                        // Prepare remote upload data
                        $uploadRequest = array('fileName' => $Imgfilename.".".$Imgfileext."",'fileData' => base64_encode(file_get_contents($uploadFile)));

                        // Execute remote upload
                        $curl = curl_init();
                        curl_setopt($curl, CURLOPT_URL, $this->upload_url.'/images/upload.php');
                        curl_setopt($curl, CURLOPT_TIMEOUT, 1000);
                        curl_setopt($curl, CURLOPT_POST, 1);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($curl, CURLOPT_POSTFIELDS, $uploadRequest);
                        $response = curl_exec($curl);
                        curl_close($curl);
                        
                        // Now delete local temp file
                        unlink($uploadFile);
                        
                        $model->LogoImgURL = '/images/img/'.$uploadRequest['fileName'];
                    }
                    else
                    {
                        echo "Possible file upload attack!\n";
                    }
            }
            else
            {
                $model->LogoImgURL =  $Logo;

            }

            if($model->save())
            {
                return $this->redirect(['view', 'id' => $model->Id]);
            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionCancel()
	{
		 return $this->redirect(['index']);
	}

    /**
     * Deletes an existing School model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the School model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return School the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = School::findOne($id)) !== null) {
            $model->LogoImgURL =$this->upload_url . $model->LogoImgURL;
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
