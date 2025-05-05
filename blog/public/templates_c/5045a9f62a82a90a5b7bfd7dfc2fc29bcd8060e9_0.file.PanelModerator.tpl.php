<?php
/* Smarty version 3.1.33, created on 2025-03-29 20:44:25
  from 'C:\xampp\htdocs\blog\app\views\PanelModerator.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_67e84d995d2501_10193289',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5045a9f62a82a90a5b7bfd7dfc2fc29bcd8060e9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\views\\PanelModerator.tpl',
      1 => 1743277460,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:PanelModerator_fragment.tpl' => 1,
  ),
),false)) {
function content_67e84d995d2501_10193289 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_183941749067e84d99581be4_81081568', 'content');
?>



 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_69274396067e84d995d11b7_14005379', 'intro');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_183941749067e84d99581be4_81081568 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_183941749067e84d99581be4_81081568',
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
                    
<div id="main">
    <section class="post">
            
<h3>Lista komentarzy na blogu</h3>
<div class="table-wrapper">
            <form id="search-form" onsubmit="ajaxPostForm('search-form','<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelModeratorFragment','zawartosc'); return false;">
                <fieldset>
                    
                        <button type="submit" class="button primary icon solid fa-search">Wyszukaj</button ><!-- comment -->
                        <input type="text" placeholder="Jakiego tytułu szukasz (wystarczy fragment tytułu)?" name="tytul" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->parametrWyszukiwania;?>
" /><br />
                   
                </fieldset>
            </form>
                    
                    
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
?>
     <div class="alert <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>alert-success<?php }?>
                       <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>alert-warning<?php }?>
                       <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>alert-danger<?php }?>" role="alert">
        <?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

        <br>
     </div>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
    
    <br>

        <div id="zawartosc">
            <?php $_smarty_tpl->_subTemplateRender("file:PanelModerator_fragment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>

</div>  

</section>  
</div>
<?php
}
}
/* {/block 'content'} */
/* {block 'intro'} */
class Block_69274396067e84d995d11b7_14005379 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_69274396067e84d995d11b7_14005379',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
   

 <?php
}
}
/* {/block 'intro'} */
}
