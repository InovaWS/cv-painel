<?php

class OnibusController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
		       public function filters()
 {
  return array(
   'accessControl', // perform access control for CRUD operations
  );
 }
         
         public function accessRules()
 {
  return array(
  
   array('allow',  // allow all users to perform 'index' and 'view' actions
    //'actions'=>array('index'),
   'expression'=>'isset($user->id_grupos_usuarios)',
   ),
   array('deny',  // deny all users
    'users'=>array('*'),
   ),
  );
 }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
        
        
   public function actionCreate() {
    $veiculos = new Cv2VeiculosVeiculos;
    $onibus = new Cv2VeiculosOnibus;
    $movimentacao = new Cv2VeiculosMovimentacoes;
    $movimentacao2 = new Cv2VeiculosMovimentacoes;
 
  $this->performAjaxValidation(array($veiculos,$onibus)); 
  
  
   if(!empty($_POST)){
   $veiculos->attributes=$_POST['Cv2VeiculosVeiculos'];

   $onibus->attributes=$_POST['Cv2VeiculosOnibus'];  
  
   $str = '';
if(isset($veiculos->itens)){
    $str = implode(',',$veiculos->itens);
    
    $veiculos->itens = $str;
}

   $veiculos->id_tipo = 3;
   $veiculos->id_vendedor = Yii::app()->user->id_vendedor;
   $movimentacao->id_tipo = 1;
   if($veiculos->validate()){ 
     $veiculos->save(); 
     $onibus->id_veiculo = $veiculos->primaryKey;
     $movimentacao->id_veiculo = $veiculos->primaryKey;
     $movimentacao2->id_veiculo = $veiculos->primaryKey;
 if($veiculos->destaque === 1){
     $movimentacao2->id_tipo = 3;
 }
 if($veiculos->destaque === 0){   
     $movimentacao2->id_tipo = 4;
 }
     $onibus->save();
     $movimentacao->save();
     $movimentacao2->save();
     
     $this->redirect(array('index'));
   }
 }
       
    $this->render('create',array(
        'veiculos'=>$veiculos,
        'onibus'=>$onibus,
        'movimentacao'=>$movimentacao
        
    ));
}

	public function actionUpdate($id){

$veiculos=$this->loadModel($id);
$onibus=Cv2VeiculosOnibus::model()->find('id_veiculo = :id_veiculo', array(':id_veiculo' => $id));
$movimentacao=Cv2VeiculosMovimentacoes::model()->find('id_veiculo = :id_veiculo', array(':id_veiculo' => $id));
$movimentacao2=Cv2VeiculosMovimentacoes::model()->find('id_veiculo = :id_veiculo', array(':id_veiculo' => $id));

         $this->performAjaxValidation(array($veiculos,$onibus));
 if(!empty($_POST)){

  $veiculos->attributes=$_POST['Cv2VeiculosVeiculos'];
  $onibus->attributes=$_POST['Cv2VeiculosOnibus'];  
  
  $str = '';
if(isset($veiculos->itens)){
    $str = implode(',',$veiculos->itens);
    
    $veiculos->itens = $str;
}
         
  if($veiculos->validate()){ 
     $veiculos->save();
     
     $onibus->id_veiculo = $veiculos->primaryKey;
     $movimentacao->id_veiculo = $veiculos->primaryKey;
      $movimentacao2->id_veiculo = $veiculos->primaryKey;
 if($veiculos->destaque === 1){
     $movimentacao2->id_tipo = 3;
 }
 if($veiculos->destaque === 0){   
     $movimentacao2->id_tipo = 4;
 }
     $onibus->save();
     $movimentacao->save();
      $movimentacao2->save();
     
     $this->redirect(array('/anuncios'));
   }
 }
       
    $this->render('update',array(
        'veiculos'=>$veiculos,
        'onibus'=>$onibus,
         'movimentacao'=>$movimentacao,
        'movimentacao2'=>$movimentacao2,
        
    ));
}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */


 public function actionDelete($id) {
        
        if (isset($id) && $id > 0) {
             $veiculos=$this->loadModel($id);
             $onibus=Cv2VeiculosOnibus::model()->find('id_veiculo = :id_veiculo', array(':id_veiculo' => $id));
            $veiculos->status = '1';
            if ($veiculos->update('status')) {
                Yii::app()->user->setFlash('sucesso', 'Veículo removido com sucesso.');
                
            } else {
                Yii::app()->user->setFlash('error', 'Falha ao tentar remover veículo.');
               
            }
               $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/anuncios'));
        }
       
    }
    
    
    public function actionRestaura($id) {
        
        if (isset($id) && $id > 0) {
             $veiculos=$this->loadModel($id);
             $onibus=Cv2VeiculosOnibus::model()->find('id_veiculo = :id_veiculo', array(':id_veiculo' => $id));
            $veiculos->status = '0';
            if ($veiculos->update('status')) {
                Yii::app()->user->setFlash('sucesso', 'Veículo removido com sucesso.');
 
            } else {
                Yii::app()->user->setFlash('error', 'Falha ao tentar remover veículo.');              
            }
               $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/lixeira'));
        }
       
    }
    
    
    
    public function actionDestaque($id) {
        
        if (isset($id) && $id > 0) {
             $veiculos=$this->loadModel($id);
             $onibus=Cv2VeiculosOnibus::model()->find('id_veiculo = :id_veiculo', array(':id_veiculo' => $id));
            $veiculos->destaque = '1';
            if ($veiculos->update('destaque')) {
                Yii::app()->user->setFlash('sucesso', 'Veículo destacado com sucesso.');
 
            } else {
                Yii::app()->user->setFlash('error', 'Falha ao tentar destacar veículo.');              
            }
               $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/anuncios'));
        }
       
    }
    
     public function actionTiraDestaque($id) {
        
        if (isset($id) && $id > 0) {
             $veiculos=$this->loadModel($id);
             $onibus=Cv2VeiculosOnibus::model()->find('id_veiculo = :id_veiculo', array(':id_veiculo' => $id));
            $veiculos->destaque = '0';
            if ($veiculos->update('destaque')) {
                Yii::app()->user->setFlash('sucesso', 'Veículo destacado com sucesso.');
 
            } else {
                Yii::app()->user->setFlash('error', 'Falha ao tentar destacar veículo.');              
            }
               $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/anuncios'));
        }
       
    }


//	public function actionDelete($id)
//	{
//		  $veiculos=$this->loadModel($id);
//                $onibus=Cv2VeiculosOnibus::model()->find('id_veiculo = :id_veiculo', array(':id_veiculo' => $id));
//            
//              $onibus->delete();
// $veiculos->delete();
//// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//		if(!isset($_GET['ajax']))
//			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
//	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Cv2VeiculosVeiculos');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cv2VeiculosVeiculos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cv2VeiculosVeiculos']))
			$model->attributes=$_GET['Cv2VeiculosVeiculos'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Cv2VeiculosVeiculos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cv2-veiculos-veiculos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
