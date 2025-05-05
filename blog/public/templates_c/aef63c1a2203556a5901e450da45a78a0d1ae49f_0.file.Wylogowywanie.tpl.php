<?php
/* Smarty version 3.1.33, created on 2025-01-10 17:05:20
  from 'C:\xampp\htdocs\blog\app\views\Wylogowywanie.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_678145408ee591_71789095',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aef63c1a2203556a5901e450da45a78a0d1ae49f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\views\\Wylogowywanie.tpl',
      1 => 1736525118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_678145408ee591_71789095 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1612468356678145408d4ed0_36627880', 'content');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_1612468356678145408d4ed0_36627880 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1612468356678145408d4ed0_36627880',
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
logout">Wyloguj się</a></li>
                    <ol>
                        <li><a class="dropdown-toggle" data-toggle="dropdown" >Panel zalogowanego</a>
                                <ul>
                                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelAdmin">administrator</a></li>
                                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelModerator">moderator</a></li>
                                  <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelAutor">autor</a></li>
                                   <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelCzytelnik">czytelnik</a></li>
                                </ul>
                           </li>
                    </ol> 
                </ul>

        </nav> 
                    
<div class="fields" id="main">
        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout">
                <div class="fields">
                        <div class="field half">
                                <label for="name">Twój login: </label>
                                <label for="name">Czy na pewno chcesz się wylogować?</label>
                        </div>
                </div>
                <ul class="actions">
                        <li><input type="submit" value="Potwierdź chęć wylogowania się" class="button primary"/></li>
                </ul>
        </form>
</div>

<?php
}
}
/* {/block 'content'} */
}
