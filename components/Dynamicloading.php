<?php
/**
 MarkableGmap is a widget used to mark all deal locations in google maps
 */
class Dynamicloading extends CWidget
{

 public function init()
 {
	$url = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.dhtmlCalYii.components'));

 	Yii::app()->clientScript->registerScriptFile(
 				$url.'/dhtmlx/dhtmlxscheduler.js',
 				 CClientScript::POS_BEGIN) ;
 				 
 	Yii::app()->clientScript->registerCss('style1',
 				'html, body{
				margin:0px;
				padding:0px;
				height:100%;

				}
				');

	Yii::app()->clientScript->registerCssFile($url.'/dhtmlx/dhtmlxscheduler.css');
	Yii::app()->clientScript->registerScript('script1',
 				'function init() {
					scheduler.config.xml_date="%Y-%m-%d %H:%i";
			  	        scheduler.config.prevent_cache = true;
					scheduler.config.lightbox.sections=[	
						{name:"label", height:30, map_to:"text", type:"textarea" , focus:true},
						{name:"description", height:43, type:"textarea", map_to:"details" },
						{name:"time", height:72, type:"time", map_to:"auto"},
						{name:"customer", height:30, map_to:"customer", type:"textarea" },
					]
					scheduler.config.first_hour=4;
					scheduler.locale.labels.section_location="Location";
					scheduler.config.details_on_create=true;
					scheduler.config.details_on_dblclick=true;
		
					scheduler.init("scheduler_here",new Date(),"month");
					scheduler.setLoadMode("day");
					scheduler.load("'.$url.'/dynamicloadingconnector.php?uid="+scheduler.uid());
					var dp = new dataProcessor("'.$url.'/dynamicloadingconnector.php");
					dp.init(scheduler);
		
				}'
				,
 				 CClientScript::POS_BEGIN);
 				

 }
public function run()
 {
$this->render('loading');
Yii::app()->clientScript->registerScript('script2','init();', CClientScript::POS_LOAD); 	
 }
}?>
