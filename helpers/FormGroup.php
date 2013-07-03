<?php
class FormGroup {
	
	private $label;
	private $fieldset;
	private $content;
	
	/**
	 * Constroi grupo de concatenacao de componentes
	 */
	function __construct($label, $fieldset=null){
		$this->label    = $label;
		$this->fieldset = ($fieldset == null ? false : $fieldset);
		
		if($fieldset){
			$this->content = '<fieldset><legend>'.$this->label.': <legend>';		
		}
		else{
			$this->content = '<label>'.$this->label.':</label>';	
		}
	}
	
	
	/**
	 * Adiciona elemento ao grupo
	 */
	public function addToGroup($element){
		$this->content .= $element.' ';
	}
	
	
	/**
	 * Retorna conteudo do grupo
	 */
	public function getGroup(){
		$this->content .= ($this->fieldset == true ? '</fieldset>' : '');
		return $this->content;
	}
	
	
	/**
	 * Efetua limpeza do grupo
	 */
	public function clearGroup(){
		$this->content = '';
	}
	
	
	
}
?>