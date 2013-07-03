<?php
class Modules {
	
	/**
	 * Monta o widget de pesquisa
	 */
	public static function showSearchWidget(){
		
		$content  = '<div class="pesquisa">';
		$content .= '<div class="tituloPesquisa">'.I18n::getText('search').'</div>';
		$content .= '<form role="search" method="post" action="search/query">';
		$content .= '<div class="searchForm">';
		$content .= '<input type="text" value="" name="query" id="query" placeholder="'.ucfirst(I18n::getText('search')).'..." class="pesquisaForm" />';
		$content .= '<input type="image" alt="buscar" class="pesquisaButton" src="'.Config::getDefine('public_url').'/img/pesquisar.jpg" />';
		$content .= '<table width="186" border="0" cellspacing="0" cellpadding="0" class="tabelaPesquisa">';
		$content .= '<tr>';
		$content .= '<td valign="middle"><input type="checkbox" name="news" id="news" class="pesquisaCheckbox">';
		$content .= '<label for="checkbox">'.ucfirst(I18n::getText('news')).'</label></td>';
		$content .= '<td valign="middle"><input type="checkbox" name="releases" id="releases" class="pesquisaCheckbox">';
		$content .= '<label for="checkbox4">'.ucfirst(I18n::getText('releases')).'</label></td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td valign="middle"><input type="checkbox" name="photos" id="photos" class="pesquisaCheckbox">';
		$content .= '<label for="checkbox2">'.ucfirst(I18n::getText('pictures')).'</label></td>';
		$content .= '<td valign="middle"><input type="checkbox" name="all" id="all" class="pesquisaCheckbox">';
		$content .= '<label for="checkbox5">'.ucfirst(I18n::getText('all')).'</label></td>';
		$content .= '</tr>';
		$content .= '<tr>';
		$content .= '<td valign="middle"><input type="checkbox" name="videos" id="videos" class="pesquisaCheckbox">';
		$content .= '<label for="checkbox3">'.ucfirst(I18n::getText('videos')).'</label></td>';
		$content .= '<td>&nbsp;</td>';
		$content .= '</tr>';
		$content .= '</table>';
		$content .= '</div>';
		$content .= '</form>';
		$content .= '</div>';
		
		return $content;
	}


	/**
	 * Monta o widget Registre-se
	 */
	public static function showBecomeMemberWidget(){
		
		$content  = '<div class="sejaMembro">';
		$content .= '<div class="tituloSejaMembro">'.I18n::getText('register').'</div>';
		$content .= '<div class="textoSejaMembro">'.I18n::getText('textoSejaMembro').'<br/><br/><a href="#">> '.I18n::getText('porqueSeTornarMembro').'</a></div>';
		$content .= '<div class="botaoCinza"><a href="#"><img src="img/seta-botao.png" border="0">'.ucfirst(I18n::getText('becomemember')).'</a></div>';
		$content .= '</div>';
		
		return $content;
	}
	
	
	
	/**
	 * Monta a central de download
	 */
	public static function showDownloadCenterWidget(){
		
		$content  = '<div class="centralDownload">';
		$content .= '<div class="tituloDownload">José Alencar</div>';
		$content .= '<div class="textoDownload"><a href="#"><img src="img/favoritos.jpg" border="0"> Meus Favoritos</a></div>';
		$content .= '<div class="textoDownload"><a href="#"><img src="img/meu-cadastro.jpg" border="0"> Meu Cadastro</a></div>';
		$content .= '<div class="textoDownload"><a href="#"><img src="img/newletter.jpg" border="0"> Newsletter</a></div>';
		$content .= '<div class="textoDownload"><a href="#"><img src="img/sair.jpg" border="0"> Sair</a></div>';
		$content .= '<div class="textoDownload"><img src="img/separador.jpg" border="0"></div>';
		$content .= '<div class="tituloDownload">Centro de Download (2)</div>';
		$content .= '<div class="textoDownload"><a href="#"><img src="img/ver-arquivos.jpg" border="0"> Ver Arquivos</a></div>';
		$content .= '<div class="textoDownload"><a href="#"><img src="img/fazer-download.jpg" border="0"> Fazer Download</a></div>';
		$content .= '</div>';
		
		return $content;
	}


	/**
	 * Monta o widget com exibicao de infos sobre o release
	 */
	public static function showReleaseInfoWidget(){
		
		$content  = '<div class="infosRelease">';
		$content .= '<div class="itensRelease"><img src="img/separador.jpg" border="0"></div>';
		$content .= '<div class="itensRelease"><a href="#"><img src="img/icone-release-download.jpg" border="0">Download release</a></div>';
		$content .= '<div class="itensRelease"><img src="img/separador.jpg" border="0"></div>';
		$content .= '<div class="itensRelease"><a href="#"><img src="img/icone-release-imprimir.jpg" border="0">Imprimir</a></div>';
		$content .= '<div class="itensRelease"><img src="img/separador.jpg" border="0"></div>';
		$content .= '<div class="itensRelease"><a href="#"><img src="img/icone-release-enviar-por-email.jpg" border="0">Enviar por e-mail</a></div>';
		$content .= '<div class="itensRelease"><a href="#"><img src="img/separador.jpg" border="0"></div>';
		$content .= '<div class="itensRelease"><a href="#"><img src="img/icone-release-favoritos.jpg" border="0">Favoritos</a></div>';
		$content .= '<div class="itensRelease"><a href="#"><img src="img/separador.jpg" border="0"></div>';
		$content .= '<div class="itensRelease"><a href="#"><img src="img/icone-release-fotos.jpg" border="0">Galeria de fotos</a></div>';
		$content .= '<div class="itensRelease"><a href="#"><img src="img/separador.jpg" border="0"></div>';
		$content .= '<div class="itensRelease"><a href="#"><img src="img/icone-release-videos.jpg" border="0">Galeria de vídeos</a></div>';
		$content .= '<div class="itensRelease"><a href="#"><img src="img/separador.jpg" border="0"></div>';
		$content .= '<div class="itensRelease"><a href="#"><img src="img/icone-release-ficha-tecnica.jpg" border="0">Ficha Técnica</a></div>';
		$content .= '<div class="itensRelease"><a href="#"><img src="img/separador.jpg" border="0"></div>';
		$content .= '</div>';
		
		return $content;
	}
	
	
	
	/**
	 * Monta o widget do twitter
	 */
	public static function showTwitterWidget(){
		
		$content  = '<div class="twitter">';
		$content .= '<div class="twittertitulo"><a href="https://twitter.com/RenaultBrasil" target="_blank"><img src="img/twitter.jpg" alt="Twitter @RenaultBrasil" border="0"></a></div>';
		$content .= '<ul id="twitter_update_list"><li>Carregando Tweets...</li></ul>';
		$content .= '<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>';
		$content .= '<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/RenaultBrasil.json?callback=twitterCallback2&count=3"></script>';
		$content .= '<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>';
		$content .= '<a href="https://twitter.com/RenaultBrasil" class="twitter-follow-button" data-show-count="false" data-lang="pt">Seguir @RenaultBrasil</a>';
		$content .= '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
		$content .= '</div>';
		
		return $content;
	}


	/**
	 * Monta o widget do facebook
	 */
	public static function showFacebookWidget(){
		
		$content  = '<div class="facebook">';
		$content .= '<div id="fb-root"></div>';
		$content .= '<script>(function(d, s, id) {';
		$content .= 'var js, fjs = d.getElementsByTagName(s)[0];';
		$content .= 'if (d.getElementById(id)) return;';
		$content .= 'js = d.createElement(s); js.id = id;';
		$content .= 'js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=422491354454113";';
		$content .= 'fjs.parentNode.insertBefore(js, fjs);';
		$content .= '}(document, \'script\', \'facebook-jssdk\'));</script>';
		$content .= '<div class="fb-like-box" data-href="http://www.facebook.com/RenaultBrasil" data-width="210" data-height="75" data-show-faces="false" data-border-color="#e5ebfa" data-stream="false" data-header="true"></div>';
		$content .= '</div>';
		
		return $content;
	}
	

	/**
	 * Exibe os widgets seguidamente
	 */
	public static function showSidebarSocialWidgets(){
			
		$content  = self::showTwitterWidget();
		$content .= self::showFacebookWidget();
	
		return $content;
	}
	
}
?>