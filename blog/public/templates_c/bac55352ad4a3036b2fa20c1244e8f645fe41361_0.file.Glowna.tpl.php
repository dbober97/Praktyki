<?php
/* Smarty version 3.1.33, created on 2025-04-18 21:44:34
  from 'C:\xampp\htdocs\blog\app\views\Glowna.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6802aba221f4d2_70986470',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bac55352ad4a3036b2fa20c1244e8f645fe41361' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\views\\Glowna.tpl',
      1 => 1745005322,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:glowna_fragment.tpl' => 1,
  ),
),false)) {
function content_6802aba221f4d2_70986470 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16931998876802aba21c3813_99946289', 'content');
?>


 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7788912526802aba221d8c6_84621833', 'intro');
?>


   
<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_16931998876802aba21c3813_99946289 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_16931998876802aba21c3813_99946289',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    
<!-- Nav -->
<nav id="nav">
                <ul class="links">
                    <li class="active"><a href=<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
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
                    <?php if (\core\RoleUtils::inRole("admin") || \core\RoleUtils::inRole("moderator") || \core\RoleUtils::inRole("czytelnik") || \core\RoleUtils::inRole("autor")) {?>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout">Wyloguj się</a></li>
                        <ol>
                           <li><a class="dropdown-toggle" data-toggle="dropdown" >Panel zalogowanego: <?php echo \core\SessionUtils::load("login",true);?>
</a>
                                <ul>
                                  <?php if (\core\RoleUtils::inRole("admin")) {?> <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelAdmin">administrator</a></li> <?php }?>
                                 <?php if (\core\RoleUtils::inRole("moderator")) {?><li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelModerator">moderator</a></li> <?php }?>
                                 <?php if (\core\RoleUtils::inRole("autor")) {?> <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelAutor">autor</a></li> <?php }?>
                                 <?php if (\core\RoleUtils::inRole("czytelnik")) {?> <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelCzytelnik">czytelnik</a></li> <?php }?>
                                </ul>
                           </li>
                       </ol> 
                        <?php } else { ?>
                            <li><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logowanie">Logowanie</a></li>
                    <?php }?>
                </ul>

        </nav> 
      
<!-- Main -->
<div id="main">
        
 <form id="search-form" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
glownaFragment','zawartosc'); return false;">
    <fieldset>

            <button type="submit" class="button primary icon solid fa-search">Wyszukaj</button ><!-- comment -->
            <input type="text" placeholder="Jakiego tytułu szukasz?" name="tytul" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->parametrWyszukiwania;?>
" /><br />
    </fieldset>
</form>       
</div>
    
<div id="zawartosc">
    <?php $_smarty_tpl->_subTemplateRender("file:glowna_fragment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>


<?php
}
}
/* {/block 'content'} */
/* {block 'intro'} */
class Block_7788912526802aba221d8c6_84621833 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_7788912526802aba221d8c6_84621833',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
   

<?php
}
}
/* {/block 'intro'} */
}
