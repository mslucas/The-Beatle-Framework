<div class="container">
<?php
$style_css = '<style type="text/css">
    .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
    }
    .form-signin .form-signin-heading,
    .form-signin .lostpasswd {
    margin-left: 0;
    margin-bottom: 10px;
    }
    .form-signin input[type="text"],
    .form-signin input[type="password"] {
    font-size: 16px;
    height: auto;
    margin-bottom: 15px;
    padding: 7px 9px;
    }
    </style>';
    
echo $style_css;
?>
<div id="myTabContent" class="tab-content">
      
    <div class="tab-pane active in" id="login">
        <?php
            $form = new Form('form1', 'https://'.$_SERVER['HTTP_HOST'], true, false, ucfirst(I18n::getText('sso')), 'form-signin');
            $form->addElement('<input id="cpf" name="cpf" type="text" class="input-block-level" placeholder="'.strtoupper(I18n::getText('cpf')).'">');
            $form->addElement('<input id="passwd" name="passwd" type="password" class="input-block-level" placeholder="'.ucfirst(I18n::getText('passwd')).'">');
            $form->addElement('<label class="lostpasswd"><a href="#recover" data-toggle="tab">'.ucfirst(I18n::getText('ilostmypasswd')).'</a></label>');
            $form->addElement(Form::submitButton(ucfirst(I18n::getText('enter')), 'btn btn-large btn-primary'));
            $form->setFilter(Filters::cpf('cpf'));
            $form->setFilter(Filters::password('passwd'));
            $form->draw();
        
            if(isset($LoginMainForm_error) && !empty($LoginMainForm_error)){
                ?>
                <div class="alert alert-block alert-error fade in">
                <h4 class="alert-heading">Erro!</h4>
                <p><?php 
                switch($LoginMainForm_error){
                    case 1000:
                        echo 'CPF Invalido!';
                        break;
                    case 1001:
                        echo 'Senha Invalida!';
                        break;
                    case 1002:
                        echo 'CPF deve ser numerico!';
                        break;
                    case 1003:
                        echo 'Informe seu CPF e senha!';
                        break;    
                }
                ?></p>
                </div>
                <?php
            }
        ?>
    </div>

    <div class="tab-pane in" id="recover">
        <?php
            $form_b = new Form('form2', '', true, false, ucfirst(I18n::getText('recoverpasswd')), 'form-signin');
            $form_b->addElement('<input id="email" name="email" type="text" class="input-block-level" placeholder="'.strtoupper(I18n::getText('email')).'">');
            $form_b->addElement(Form::submitButton(ucfirst(I18n::getText('send')), 'btn btn-large btn-primary'));
            $form_b->setFilter(Filters::email('email'));
            $form_b->draw();
        ?>
    </div>
    
</div>
</div><!-- fim container -->