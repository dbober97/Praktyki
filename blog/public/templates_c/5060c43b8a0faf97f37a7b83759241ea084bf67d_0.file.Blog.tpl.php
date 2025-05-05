<?php
/* Smarty version 3.1.33, created on 2025-04-18 21:42:18
  from 'C:\xampp\htdocs\blog\app\views\Blog.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_6802ab1acb2f12_51125497',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5060c43b8a0faf97f37a7b83759241ea084bf67d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\views\\Blog.tpl',
      1 => 1745005303,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:Blog_fragment.tpl' => 1,
  ),
),false)) {
function content_6802ab1acb2f12_51125497 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_18567553366802ab1ac4ea37_73739255', 'intro');
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9118860776802ab1ac51551_98876011', 'content');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1063402266802ab1acb1065_70715333', 'intro');
?>


   
<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'intro'} */
class Block_18567553366802ab1ac4ea37_73739255 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_18567553366802ab1ac4ea37_73739255',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
   
<!-- Intro -->
        <div id="intro">
            <h1>O naukach ścisłych</h1>
            <p>Luźne notatki i przemyślenia kręcące się wokół nauk ścisłych</p>
 <div class="container">
  <div class="row justify-content-md-center">
    <div class="col col-lg-2">
      <img src="images/11.png" alt="" />
    </div>
    <div class="col-md-auto">
      <img src="images/22.png" alt="" />
    </div>
    <div class="col-md-auto">
      <img src="images/33.png" alt="" />
    </div>
  </div>
</div>
            
<ul class="actions">
    <li><a href="#header" class="button icon solid solo fa-arrow-down scrolly">Continue</a></li>
</ul>
            </div>
    
<?php
}
}
/* {/block 'intro'} */
/* {block 'content'} */
class Block_9118860776802ab1ac51551_98876011 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_9118860776802ab1ac51551_98876011',
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
blogFragment','zawartosc'); return false;">
    <fieldset>

            <button type="submit" class="button primary icon solid fa-search">Wyszukaj</button ><!-- comment -->
            <input type="text" placeholder="Jakiego tytułu szukasz?" name="tytul" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->parametrWyszukiwania;?>
" /><br />
    </fieldset>
</form>
</div>
                      
<!-- Posts -->
<div id="zawartosc">
    <?php $_smarty_tpl->_subTemplateRender("file:Blog_fragment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>        
                    

<?php
}
}
/* {/block 'content'} */
/* {block 'intro'} */
class Block_1063402266802ab1acb1065_70715333 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_1063402266802ab1acb1065_70715333',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
   

<?php
}
}
/* {/block 'intro'} */
}
