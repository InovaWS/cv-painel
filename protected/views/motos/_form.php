<?php
/* @var $this Cv2VeiculosVeiculosController */
/* @var $model Cv2VeiculosVeiculos */
/* @var $form CActiveForm */
?>

 <div class="TituloPaginas">Dados do Veículo</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cv2-veiculos-veiculos-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary(array($veiculos,$motos)); ?>
 
 
<div class="CaixaPaginas">
	<div class="DivCamposVeiculos">
		<span class="NomeUsuario"><?php echo $form->labelEx($veiculos,'Descrição do veículo (ex: Honda Fan 125, Twister 250, Hornet)'); ?>
                    <br>
		<?php echo $form->textField($veiculos,'descricao',array('size'=>60,'maxlength'=>150)); ?> </span>
		<?php echo $form->error($veiculos,'descricao'); ?>
        </div>
	
</div>
 <div class="TituloPaginas">Fotos</div>
<div class="CaixaPaginas">

<!--	<div class="DivFotosVeiculos">
    
        <div style="float:left;margin-right:10px;"><a href="index.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/no_photo.jpg" border="0"><br>Adicionar</a></div>
        <div style="float:left;margin-right:10px;"><a href="index.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/no_photo.jpg" border="0"><br>Adicionar</a></div>
        <div style="float:left;margin-right:10px;"><a href="index.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/no_photo.jpg" border="0"><br>Adicionar</a></div>
        <div style="float:left;margin-right:10px;"><a href="index.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/no_photo.jpg" border="0"><br>Adicionar</a></div>
        <div style="float:left;margin-right:10px;"><a href="index.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/no_photo.jpg" border="0"><br>Adicionar</a></div>
        <div style="float:left;margin-right:10px;"><a href="index.php"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/no_photo.jpg" border="0"><br>Adicionar</a></div>
        <div style="clear:both"></div>
    </div>
    -->
    
    <div class="DivFotosVeiculos">
      
         <div style="float:left;margin-right:10px;">
		<?php echo $form->labelEx($veiculos,'Adicionar'); ?>
        
		<?php echo $form->fileField($veiculos,'foto_1',array('rows'=>10, 'cols'=>83)); ?>
         </div>
		<?php echo $form->error($veiculos,'foto_1'); ?>
	
   
    
   
          <div style="float:left;margin-right:10px;">
		<?php echo $form->labelEx($veiculos,'Adicionar'); ?>
		<?php echo $form->fileField($veiculos,'foto_2',array('rows'=>10, 'cols'=>83)); ?>
              </div>
		<?php echo $form->error($veiculos,'foto_2'); ?>
	
    
    
          <div style="float:left;margin-right:10px;">
		<?php echo $form->labelEx($veiculos,'Adicionar'); ?>
		<?php echo $form->fileField($veiculos,'foto_3',array('rows'=>10, 'cols'=>83)); ?>
              </div>
		<?php echo $form->error($veiculos,'foto_3'); ?>
    
    
          <div style="float:left;margin-right:10px;">
		<?php echo $form->labelEx($veiculos,'Adicionar'); ?>
		<?php echo $form->fileField($veiculos,'foto_4',array('rows'=>10, 'cols'=>83)); ?>
              </div>
		<?php echo $form->error($veiculos,'foto_4'); ?>
	
    
    
          <div style="float:left;margin-right:10px;">
		<?php echo $form->labelEx($veiculos,'Adicionar'); ?>
		<?php echo $form->fileField($veiculos,'foto_5',array('rows'=>10, 'cols'=>83)); ?>
              </div>
		<?php echo $form->error($veiculos,'foto_5'); ?>
	
    
   
          <div style="float:left;margin-right:10px;">
		<?php echo $form->labelEx($veiculos,'Adicionar'); ?>
		<?php echo $form->fileField($veiculos,'foto_6',array('rows'=>10, 'cols'=>83)); ?>
              </div>
		<?php echo $form->error($veiculos,'foto_6'); ?>
     <div style="clear:both"></div>
</div>
    
</div>
 
 <div class="TituloPaginas">Localização do veículo</div>
    <div class="CaixaPaginas">
      <div class="DivCamposVeiculos">
  <?php echo $form->labelEx($veiculos,'Localização'); ?>
            <br>
<?php 
$localizacoes = Cv2Localizacoes::model()->findAll('id_vendedor = :id_vendedor', array(':id_vendedor' => Yii::app()->user->id_vendedor));
 $localizacoes = CHtml::listData($localizacoes, 'id', 'descricao');
?>
 <?php echo $form->dropDownList($veiculos, 'id_localizacao', $localizacoes, array('class'=>'Input','empty' => 'Selecione')); ?>
 </span> 
 <?php echo $form->error($veiculos,'id_localizacao'); ?>
 </div>
        
       </div> 
        <div class="TituloPaginas">Características do Veículo</div>
<div class="CaixaPaginas">

    <div class="DivCaracteristicas">
       
  <?php echo $form->labelEx($veiculos,'Marca'); ?>
            <br>
<?php 
$marcas = Cv2VeiculosMarcas::model()->findAll('id_tipo = :id_tipo', array(':id_tipo' => 2));
 $marcas = CHtml::listData($marcas, 'id', 'descricao');
?>
 <?php echo $form->dropDownList($veiculos, 'id_marca', $marcas, array('class'=>'Select','empty' => 'Selecione')); ?>
 
 <?php echo $form->error($veiculos,'id_marca'); ?>
 </div>
    
      <div class="DivCaracteristicas">
    <?php echo $form->labelEx($motos,'modelo'); ?>
          <br>
		<?php echo $form->textField($motos,'modelo',array('class'=>'Input')); ?>
		<?php echo $form->error($motos,'modelo'); ?>
    </div>
    
    
 <div class="DivCaracteristicas">
      
  <?php echo $form->labelEx($veiculos,'ano'); ?>
            <br>
 <?php echo $form->dropDownList($veiculos, 'ano',array('1945'=>"1945", '1946'=>"1946", '1947'=>"1947", '1948'=>"1948", '1949'=>"1949", '1950'=>"1950", '1951'=>"1951", '1952'=>"1952", '1953'=>"1953", '1954'=>"1954", '1955'=>"1955", '1956'=>"1956", '1957'=>"1957", '1958'=>"1958", '1959'=>"1959", '1960'=>"1960", '1961'=>"1961", '1962'=>"1962", '1963'=>"1963", '1964'=>"1964", '1965'=>"1965", '1966'=>"1966", '1967'=>"1967", '1968'=>"1968", '1969'=>"1969", '1970'=>"1970", '1971'=>"1971", '1972'=>"1972", '1973'=>"1973", '1974'=>"1974", '1975'=>"1975", '1976'=>"1976", '1977'=>"1977", '1978'=>"1978", '1979'=>"1979", '1980'=>"1980", '1981'=>"1981", '1982'=>"1982", '1983'=>"1983", '1984'=>"1984", '1985'=>"1985", '1986'=>"1986", '1987'=>"1987", '1988'=>"1988", '1989'=>"1989", '1990'=>"1990", '1991'=>"1991", '1992'=>"1992", '1993'=>"1993", '1994'=>"1994", '1995'=>"1995", '1996'=>"1996", '1997'=>"1997", '1998'=>"1998", '1999'=>"1999", '2000'=>"2000", '2001'=>"2001", '2002'=>"2002", '2003'=>"2003", '2004'=>"2004", '2005'=>"2005", '2006'=>"2006", '2007'=>"2007", '2008'=>"2008", '2009'=>"2009", '2010'=>"2010", '2011'=>"2011", '2012'=>"2012",'2013'=>"2013")
      ,array('class'=>'Select','empty' => 'Selecione')); ?>

 <?php echo $form->error($veiculos,'ano'); ?>
 </div>
    
    <div style="clear:both"></div>
    
    <div class="DivCaracteristicas">
		<?php echo $form->labelEx($motos,'quilometros'); ?>
		<?php echo $form->textField($motos,'quilometros',array('class'=>'Input')); ?>
		<?php echo $form->error($motos,'quilometros'); ?>
	</div>
    
     <div class="DivCaracteristicas">
         
  <?php echo $form->labelEx($motos,'freios'); ?>
            <br>
 <?php echo $form->dropDownList($motos, 'freios',array('Disco Dianteiro', 'Disco Traseiro', 'Dianteiro e Traseiro'), array('class'=>'Select','empty' => 'Selecione')); ?>
 
 <?php echo $form->error($motos,'freios'); ?>
 </div>
    
      <div class="DivCaracteristicas">
         
  <?php echo $form->labelEx($motos,'tipo_motor'); ?>
            <br>
 <?php echo $form->dropDownList($motos, 'tipo_motor',array('2 Tempos', '4 Tempos'), array('class'=>'Select','empty' => 'Selecione')); ?>
 
 <?php echo $form->error($motos,'tipo_motor'); ?>
 </div>
    
  

    <div style="clear:both"></div>
    
     <div class="DivCaracteristicas">
         
  <?php echo $form->labelEx($motos,'Sistema de partida'); ?>
            <br>
 <?php echo $form->dropDownList($motos, 'partida',array('Elétrico', 'Elétrico e Pedal', 'Pedal', 'Outro'), array('class'=>'Select','empty' => 'Selecione')); ?>
 
 <?php echo $form->error($motos,'partida'); ?>
 </div>
    
    
       <div class="DivCaracteristicas">
       
  <?php echo $form->labelEx($motos,'cor'); ?>
            <br>
 <?php echo $form->dropDownList($motos, 'cor', array('Amarelo', 'Azul', 'Branco', 'Cinza', 'Dourado', 'Laranja', 'Prata', 'Preto', 'Verde', 'Vermelho', 'Vinho', 'Outro'), array('class'=>'Select','empty' => 'Selecione')); ?>
 
 <?php echo $form->error($motos,'cor'); ?>
 </div>
    
         <div class="DivCaracteristicas">
       
  <?php echo $form->labelEx($motos,'alarme'); ?>
            <br>
 <?php echo $form->dropDownList($motos, 'alarme', array('Sim','Não'), array('class'=>'Select','empty' => 'Selecione')); ?>
 
 <?php echo $form->error($motos,'alarme'); ?>
 </div>
    
    
    
    
     <div class="DivCaracteristicas">
    
  <?php echo $form->labelEx($motos,'transmissao'); ?>
            <br>
 <?php echo $form->dropDownList($motos, 'transmissao',array('Automático', 'Automático Sequencial', 'Automatizado', 'CVT', 'Manual', 'Semi-automático'), array('class'=>'Select','empty' => 'Selecione')); ?>
 
 <?php echo $form->error($motos,'transmissao'); ?>
 </div>
    
    <div class="DivCaracteristicas">
      
  <?php echo $form->labelEx($motos,'combustivel'); ?>
            <br>
 <?php echo $form->dropDownList($motos, 'combustivel',array('Álcool', 'Álcool e GNV', 'Diesel', 'Gasolina', 'Gas. Álc. e GNV (tetraflex)','Gas. e Álc. (flex)', 'Gas. e Elétrico (híbrido)', 'Gas. e GNV', 'Outro'), array('class'=>'Select','empty' => 'Selecione')); ?>

 <?php echo $form->error($motos,'combustivel'); ?>
 </div>
    
       <div class="DivCaracteristicas">
        
  <?php echo $form->labelEx($motos,'Direção'); ?>
            <br>
 <?php echo $form->dropDownList($motos, 'direcao',array('Assistida', 'Elétrica', 'Hidráulica', 'Mecânica'), array('class'=>'Select','empty' => 'Selecione')); ?>
 
 <?php echo $form->error($motos,'direcao'); ?>
 </div>
    
    
    <div style="clear:both"></div>
    
  <div class="DivCaracteristicas">
       
  <?php echo $form->labelEx($veiculos,'Único dono? '); ?>
            <br>
 <?php echo $form->dropDownList($veiculos, 'unico_dono', array('Sim', 'Não'), array('class'=>'Select','empty' => 'Selecione')); ?>
 
 <?php echo $form->error($veiculos,'unico_dono'); ?>
 </div>
    
    <div class="DivCaracteristicas">
    	Condições do veículo?<br>
        <select class="Select">
        	<option>Selecione</option>
        </select>
    </div>
    
    <div style="clear:both"></div>
    
    <div class="DivCaracteristicas">
		<?php echo $form->labelEx($veiculos,'Valor (R$)'); ?>
		<?php echo $form->textField($veiculos,'valor',array('size'=>20,'maxlength'=>20,'class'=>'Input')); ?>
		<?php echo $form->error($veiculos,'valor'); ?>
	</div>
     <div class="DivCaracteristicas">
		<?php echo $form->labelEx($veiculos,'Valor promocional (R$)'); ?>
		<?php echo $form->textField($veiculos,'valor_promocional',array('size'=>20,'maxlength'=>20,'class'=>'Input')); ?>
		<?php echo $form->error($veiculos,'valor_promocional'); ?>
	</div>
    
    <div style="clear:both"></div>
    
</div>
        




<div class="TituloPaginas">Observações</div>
<div class="CaixaPaginas">
    
    <div class="DivCamposVeiculos">
		<?php echo $form->labelEx($veiculos,'observacoes'); ?>
		<?php echo $form->textArea($veiculos,'observacoes',array('rows'=>10, 'cols'=>83)); ?>
		<?php echo $form->error($veiculos,'observacoes'); ?>
	</div>

    
</div>


<div class="DivCampos">
<?php echo $form->checkBox($veiculos,'anunciado'); ?>
    <?php echo $form->labelEx($veiculos,'anunciado'); ?>
<?php echo $form->error($veiculos,'anunciado'); ?>

    </div>
    <div class="DivCampos">

<?php echo $form->checkBox($veiculos,'destaque'); ?>
    <?php echo $form->labelEx($veiculos,'destaque'); ?>
<?php echo $form->error($veiculos,'destaque'); ?>

    </div>

<div style="clear:both;"></div>
    <div class="DivCampos">
        <button style="text-align: right" type="submit" class="BotaoPadrao1"><span><?php echo $veiculos->isNewRecord ? 'Criar' : 'Salvar'; ?></span></button>	
   </div>
        <div style="clear:both"></div>
        

<?php $this->endWidget(); ?>

<!-- form -->