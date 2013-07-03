<?php
class Filters {
	
	/**
	 * Filtro de primeiro nome
	 */
	public static function firstname($fieldname){
		
		$filter['fieldname'] = $fieldname;
		$filter['rules']     = 'required: true, minlength: 3';
		$filter['message']   = 'required: "Digite o seu nome", minlength: "O seu nome deve conter, no mínimo, 3 caracteres"';
				
		return $filter;
	}
	
	/**
	 * Filtro de sobrenome
	 */
	public static function lastname($fieldname){
		
		$filter['fieldname'] = $fieldname;
		$filter['rules']     = 'required: true, minlength: 3';
		$filter['message']   = 'required: "Digite o seu sobrenome", minlength: "O seu sobrenome deve conter, no mínimo, 3 caracteres"';
				
		return $filter;
	}
	
	
	/**
	 * Filtro de senha
	 */
	public static function password($fieldname){
			
		$filter['fieldname'] = $fieldname;
		$filter['rules']     = 'required: true, minlength: 6';
		$filter['message']   = 'required: "Digite sua senha", minlength: "A senha deve conter no mínimo, 3 caracteres"';
				
		return $filter;
	}
	
	
	/*
	 * Filtro de email
	 */
	public static function email($fieldname){
		
		$filter['fieldname'] = $fieldname;
		$filter['rules'] = 'required: true, email: true';
		$filter['message'] = 'required: "Digite o seu e-mail para contato.", email: "Digite um e-mail válido"';
				
		return $filter;
	}
	
	
	/*
	 * Filtro de cpf
	 */
	public static function cpf($fieldname){
		
		$filter['fieldname'] = $fieldname;
		$filter['rules']   = 'required: true, cpf: true';
		$filter['message'] = 'required: "Digite o seu CPF.", email: "Digite um cpf válido"';
		$filter['mask']  = '$("#cpf").mask("999.999.999-99");';
				
		return $filter;
	}
	
}
?>