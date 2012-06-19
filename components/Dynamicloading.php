<?php
/**
Dynamicloading.php  is used to load scheduler component
 */
class Dynamicloading extends CWidget
{

	//function to load customer data
	public function loadfun()
	{
		$customers=Customer::model()->findAll();//need to change 'Customer' if your database table for user is diffrent
		$str='[';
		foreach($customers as $customer)
		{
			$str.= '{key:'.$customer->id.', label:"'.$customer->name.'-'.$customer->surnames.'"},';
		}
		$str.= ']';
		return $str;
	}

	public function init()
 	{
		$url = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.dhtmlCalYii.components'));
		
		//basic scheduler script *Modified!!
		Yii::app()->clientScript->registerScriptFile(
	 				$url.'/codebase/dhtmlxscheduler.js',
	 				 CClientScript::POS_BEGIN) ;
		
		//scheduler extn scripts follow
		Yii::app()->clientScript->registerScriptFile(
	 				$url.'/codebase/ext/dhtmlxscheduler_agenda_view.js',
	 				 CClientScript::POS_BEGIN) ;

		Yii::app()->clientScript->registerScriptFile(
	 				$url.'/codebase/ext/dhtmlxscheduler_year_view.js',
	 				 CClientScript::POS_BEGIN) ;
	 	
		Yii::app()->clientScript->registerScriptFile(
	 				$url.'/codebase/ext/dhtmlxscheduler_timeline.js',
	 				 CClientScript::POS_BEGIN) ;

		Yii::app()->clientScript->registerScriptFile(
	 				$url.'/codebase/ext/dhtmlxscheduler_timeline.js',
	 				 CClientScript::POS_BEGIN) ;

		Yii::app()->clientScript->registerScriptFile(
	 				$url.'/codebase/ext/dhtmlxscheduler_week_agenda.js',
	 				 CClientScript::POS_BEGIN) ;
	 				 				  				 
	 	Yii::app()->clientScript->registerCss('style1',
	 			'html, body{
					height:100%;
				}
				');
		//register css file * Modified!!
		Yii::app()->clientScript->registerCssFile($url.'/codebase/dhtmlxscheduler.css');
		Yii::app()->clientScript->registerScript('script1',
 			'function init() {
 				scheduler.locale.labels.timeline_tab = "Timeline"
				scheduler.locale.labels.section_custom="Section";	
				scheduler.config.xml_date="%Y-%m-%d %H:%i";
			  	var sections='.$this->loadfun().';
				scheduler.createTimelineView({
					name:	"timeline",
					x_unit:	"day",
					x_date:	"%D,%d",
					x_step:	  1,
					x_size:   12,
					x_start:  0,
					x_length: 12,
					y_unit:	sections,
					y_property:	"customer",
					render:"bar"
				});
		      		scheduler.locale.labels.week_agenda_tab = "Week A.";
			        scheduler.config.xml_date="%Y-%m-%d %H:%i";
		                scheduler.config.time_step = 15;
		                scheduler.config.multi_day = true;

				scheduler.templates.week_agenda_event_text = function(start_date, end_date, event, date, position) {
					switch(position){
						case "middle":
							return "-- " + event.text;
						case "end":
							return "End: "+scheduler.templates.event_date(start_date) + " " + event.text;
						case "start":
							return "Start: "+scheduler.templates.event_date(start_date) + " " + event.text;
						default:
							return scheduler.templates.event_date(start_date) + " " + event.text;
					}
				};

			  	scheduler.config.prevent_cache = true;
				scheduler.config.lightbox.sections=[	
					{name:"label", height:30, map_to:"text", type:"textarea" , focus:true},
					{name:"description", height:43, type:"textarea", map_to:"details" },
					{name:"time", height:72, type:"time", map_to:"auto"},
				        {name:"customer", height:23, type:"select", options:sections, map_to:"customer" },
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
		
			}',
 			 CClientScript::POS_BEGIN);
 				

	 }

	public function run()
	{
		//render to component/view
		$this->render('index');
		Yii::app()->clientScript->registerScript('script2','init();', CClientScript::POS_LOAD); 	
	}
}?>
