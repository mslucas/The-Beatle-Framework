<?php
class Form {
	
	private $formname;
	private $enctype; 
	private $method;
	private $action;
	private $style;    //propriedades CSS setadas no form
	private $content;  //conteudo interno do form
	private $legend;   //label do fieldset
	
	private static $filter; //objeto de filtros validator
	private static $first_obj; //armazena o id do primeiro objeto adicionado no form, para setar focus
	private static $masks; //mascaras de validacao de campos
	
	
	/**
	 * Instanciacao do form
	 */
	function __construct($name, $action='#', $post=TRUE, $upload=FALSE, $legend=NULL, $style=''){
		$this->formname = $name;
		$this->action   = $action;
		$this->method   = ($post==TRUE) ? 'post' : 'get';
		$this->enctype  = ($upload==TRUE) ? 'multipart/form-data' : 'application/x-www-form-urlencoded';
		$this->style    = $style;
		$this->content  = '<form id="'.$this->formname.'" enctype="'.$this->enctype.'" method="'.$this->method.'" action="'.$this->action.'" class="'.$this->style.'">'; 
		$this->legend   = $legend;
		$this->content .= (isset($legend)) ? '<h2 class="form-signin-heading">'.$legend.'</h2>' : null; 
		self::$filter   = (isset(self::$filter) && !empty(self::$filter)) ? self::$filter : array();
		self::$first_obj = ''; 
	}
	
	
	/**
	 * Acrescenta elementos ao form
	 */
	public function addElement($element){
		$this->content .= $element;
		//self::setFirstObject($element);
		return $this->content;
	}
	
	/**
	 * Abre fieldset
	 */
	public static function openFieldset($label){
		$content  = '<fieldset>';
		$content .= '<legend>&nbsp;'.$label.'&nbsp;</legend>';
		return $content;
	}
	
	
	/**
	 * Fecha Fieldset
	 */
	public static function closeFieldset(){
		$content  = '</fieldset>';
		return $content;
	}
	
		
	
	/**
	 * Finaliza e desenha o form na tela
	 */
	public function draw(){
		$GLOBALS['filtros'] = $this->getFilter();
		$GLOBALS['formname'] = $this->formname;

		$this->content .= '</form>';
		echo $this->content;
	}
	
	
	/**
	 * Seta filtro de validacao
	 */
	public static function setFilter($filter){
		array_push(self::$filter, $filter);
	}
	
	
	/**
	 * Retorno do objeto de filtragem
	 */
	public static function getFilter(){
		return self::$filter;
	}
	
	
	/**
	 * Campo de texto comum
	 */
	public static function inputText($name, $label, $maxlength=40, $value=NULL, $style=''){
		if($label != NULL){ $content = '<label>'.$label.':</label>';}
		$content .= '<input type="text" name="'.$name.'" id="'.$name.'" maxlength="'.$maxlength.'" value="'.$value.'" class="'.$style.'" />';
		return $content;
	}
	
	
	/**
	 * Campo de senha
	 */
	public static function inputPassword($name, $label, $maxlength=40, $value=NULL, $style=''){
		if($label != NULL){ $content = '<label>'.$label.':</label>';}
		$content .= '<input type="password" name="'.$name.'" id="'.$name.'" maxlength="'.$maxlength.'" value="'.$value.'" class="'.$style.'" />';
		return $content;
	}
	
	
	/**
	 * Campo de email
	 */
	public static function inputMail($name, $label, $value=NULL, $style=''){
		self::setFilter(Filters::email($name));	
		if($label != NULL){ $content = '<label>'.$label.':</label>';}
		$content .= '<input type="text" name="'.$name.'" id="'.$name.'" maxlength="100" value="'.$value.'" class="'.$style.'" />';
		return $content;
	}
	
	
	/**
	 * Campo de hidden
	 */
	public static function hiddenField($name, $value){
		$content = '<input type="hidden" name="'.$name.'" id="'.$name.'" value="'.$value.'" />';
		return $content;
	}
	
	
	/**
	 * Botao submit
	 */
	public static function submitButton($value, $style=''){
		//$content = '<input type="submit" value="'.$value.'" class="'.$style.'" />';
		$content = '<button class="'.$style.'" type="submit">'.$value.'</button>';
		return $content;
	}
	
	/**
	 * Botao normal
	 */
	public static function inputButton($name, $value, $style=''){
		$content = '<input type="button" name="'.$name.'" id="'.$name.'" value="'.$value.'" class="'.$style.'" />';
		return $content;
	}
	
	
	/**
	 * Limpa campos form
	 */
	public static function ressetButton($value, $style=''){
		$content = '<input type="reset" value="'.$value.'" class="'.$style.'" />';
		return $content;
	}
	
	
	/**
	 * Radio Button
	 */
	public static function inputRadio($name, $label, $value, $checked=false, $style=''){
		$checked = ($checked == true ? 'checked="checked"' : '');
		$content = '<input type="radio" name="'.$name.'" value="'.$value.'" '.$checked.' class="'.$style.'" /> '.$label;
		return $content;
	}
	
	
	/**
	 * Checkbox
	 */
	public static function inputCheckbox($name, $label, $value, $style=''){
		$content = '<input type="checkbox" name="'.$name.'" value="'.$value.'" class="'.$style.'" /> '.$label;
		return $content;
	}
	
	
	/**
	 * Link do tipo A HREF
	 */
	public static function aLink($label, $src, $rel=null, $style=null){
		$content = '<a href="'.$src.'" rel="'.$rel.'" class="'.$style.'">'.$label.'</a>';
		return $content;
	}
	
	
	
}
?>