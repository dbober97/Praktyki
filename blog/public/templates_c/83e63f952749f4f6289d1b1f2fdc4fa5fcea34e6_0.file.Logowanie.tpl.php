<?php
/* Smarty version 3.1.33, created on 2025-01-15 13:07:15
  from 'C:\xampp\htdocs\blog\app\views\Logowanie.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6787a4f389e2f9_78235639',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83e63f952749f4f6289d1b1f2fdc4fa5fcea34e6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\views\\Logowanie.tpl',
      1 => 1736942830,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6787a4f389e2f9_78235639 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12578504996787a4f355edc7_59150828', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_12578504996787a4f355edc7_59150828 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_12578504996787a4f355edc7_59150828',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <!-- Nav -->
<nav id="nav">
                <ul class="links">
                    <li><a href=<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
glowna>Strona główna</a></li>
                    <ol>
                           <li><a class="dropdown-toggle" data-toggle="dropdown" >kategorie</a>
                                <ul>
                                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
matematyka">Matematyka</a></li>
                                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
informatyka">Informatyka</a></li>
                                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
fizyka">Fizyka</a></li>
                                </ul>
                           </li>
                    </ol> 
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
autorzy">Autorzy</a></li>
                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
kontakt">Kontakt</a></li>
                    <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logowanie">Zaloguj się</a></li>
                </ul>

        </nav> 
                    
<div class="fields" id="main">
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logowanie">
                <div class="fields">
                        <div class="field half">
                                <label for="name">Login</label>
                                <input type="text" name="login" id="login" />
                        </div>
                        <div class="field half">
                                <label for="pass">Hasło</label>
                                <input type="password" name="pass" id="pass" />
                        </div>
                </div>
                <ul class="actions">
                        <li><input type="submit" value="Zaloguj się" class="button primary"/></li>
                        <li><input type="reset" value="Przypomnij hasło" class="button"/></li>
                </ul>
                
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
                <div class="alert <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>alert-success<?php }?>
                                  <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>alert-warning<?php }?>
                                  <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>alert-danger<?php }?>" role="alert">
                   <?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

                </div>
               <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </form>
        
        <p>Nie masz konta? Zarejestruj się poniżej, by utworzyć konto czytelnicze.</p>
        
                <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
rejestracja">
                <div class="fields">
                        <div class="field half">
                                <label for="login">Login</label>
                                <input type="text" name="login" id="login" placeholder="podaj unikalny login"/>
                        </div>
                        <div class="field half">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" id="email" placeholder="xyz@xyz.xyz" />
                        </div>
                        <div class="field half">
                                <label for="pass1">Hasło</label>
                                <input type="password" name="pass1" id="pass1" placeholder="podaj silne hasło"/>
                        </div>
                        <div class="field half">
                                <label for="pass2">Wprowadź ponownie hasło</label>
                                <input type="password" name="pass2" id="pass2"/>
                        </div>
                        <div class="field half">
                                <label for="nazwa">Podaj nazwę konta - będzie widoczna dla innych</label>
                                <input type="text" name="nazwa" id="nazwa" placeholder="jak masz na imię?"/>
                        </div>                    
                </div>
                <ul class="actions">
                        <li><input type="submit" value="Zarejestruj się" class="button primary"/></li>
                </ul>
                
        </form>
                
</div>

<?php
}
}
/* {/block 'content'} */
}
