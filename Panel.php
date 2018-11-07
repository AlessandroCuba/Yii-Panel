<?php
/**
 * Created by PhpStorm.
 * User: manuel.gonzalez
 * Date: 23.10.2018
 * Time: 15:29
 */

namespace magp\bootstrappanel;

use yii\base\Widget;
use yii\helpers\Html;

class Panel extends Widget
{
    // Class of bootstrap styles for the panel
	const PANEL_DEFAULT = 'panel-default';
	const PANEL_INFO = 'panel-info';
	const PANEL_WARNING = 'panel-warning';
	const PANEL_DANGER = 'panel-danger';
	const PANEL_SUCCESS = 'panel-success';
	const PANEL_PROGRESS = 'panel-progress';

	public $style = [
		'panel' => self::PANEL_DEFAULT,
		'header' => '',
		'body' => '',
		'footer' => '',
	];

	public $id;
	public $title;
	public $displacement = false;
	public $content;
	public $footer = false;

	private $_title = '';
	private $contentStyle = '';

	private $_panelClass = ['class' => 'panel'];
	private $_bodyClass = ['class' => 'panel-body'];

	public function init()
	{
	    PanelAsset::register($this->getView());

	    if(!isset($this->id)){
	        $this->id = $this->getId();
        }
        Html::addCssClass($this->_panelClass, $this->style['panel']);
		Html::addCssClass($this->_bodyClass, $this->style['body']);

		if($this->displacement){
			$content = Html::a('<i id="icon-'.$this->id.'" class="fa fa-plus-square-o"></i>', '#',[
				'id' => $this->id,
				'onclick' => 'displacement(this.id)',
				'title' => 'Open',
			]);
			//$content = '<a id="'.$this->id.'" href="#" onclick= "displacement(this.id)"></a>';
			$this->_title = Html::tag('div', $content, ['class' => 'pull-right']).$this->title;
			$this->contentStyle = 'display:none';
		} else {
			$this->_title = $this->title;
		}
	}

	public function run()
	{
        echo Html::beginTag('div', ['class' => $this->_panelClass]);
        echo Html::tag('div', $this->_title, ['class' => 'panel-heading', 'id' => $this->id]);
        echo Html::tag('div', $this->content, ['class' => $this->_bodyClass, 'style' => $this->contentStyle, 'id' => 'body-'.$this->id]);

        if($this->footer){
            echo Html::tag('div', 'footer', ['class' => 'panel-footer']);
        }

        echo Html::endTag('div');
	}
}