<?php
/* Smarty version 3.1.33, created on 2025-01-28 20:08:17
  from 'C:\xampp\htdocs\blog\app\views\PanelCzytelnik.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_67992b21412632_69597391',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36028f5424df2bae1d317a9e5d6ec2cea676566e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\blog\\app\\views\\PanelCzytelnik.tpl',
      1 => 1738091295,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67992b21412632_69597391 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_68214508267992b213afee5_55586158', 'content');
?>



 <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_184129246167992b21411528_89207807', 'intro');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block 'content'} */
class Block_68214508267992b213afee5_55586158 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_68214508267992b213afee5_55586158',
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
            
<h3>Lista Twoich komentarzy</h3>
<div class="table-wrapper">
            <form  action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelCzytelnik">
                <fieldset>
                    <ul class="actions">
                        <button type="submit" class="button primary icon solid fa-search">Wyszukaj</button ><!-- comment -->
                        <input type="text" placeholder="Jakiego tytułu szukasz (wystarczy fragment tytułu)?" name="tytul" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->parametrWyszukiwania;?>
" /><br />
                    </ul>
                </fieldset>
            </form>
        <table class="alt">
                <thead>
                        <tr>
                                <th>Utworzono dnia</th>
                                <th>Zmieniono dnia</th>
                                <th>Tytuł artykułu</th>                                
                                <th>Treść komentarza</th> <!-- czy dozwolone-->
                                <th>Widoczność</th> <!-- w bazie przechowywany]e to jest w kolumnie 'aktywny' w tabeli 'artykuły'-->
                                                    <!-- gdy widoczność ustawiona jakko falso - artykuł jest roboczy tj nie opublikowany-->
                                <th>Edycja</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaKom']->value, 'kom');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['kom']->value) {
?>
                    <tr><td><?php echo $_smarty_tpl->tpl_vars['kom']->value["data_dodania"];?>
</td><!-- utworzono --><td><?php ob_start();
echo $_smarty_tpl->tpl_vars['kom']->value["data_modyfikacji"];
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1 == NULL) {?> - <?php } else { ?> <?php echo $_smarty_tpl->tpl_vars['kom']->value["data_modyfikacji"];?>
} <?php }?></td><!-- zmodyfikowano --><td><?php echo $_smarty_tpl->tpl_vars['kom']->value["tytul"];?>
</td><!-- tytuł --><td><?php echo $_smarty_tpl->tpl_vars['kom']->value["tresc_komentarza"];?>
</td><!-- komentarze --><td><?php ob_start();
echo $_smarty_tpl->tpl_vars['kom']->value["aktywny"];
$_prefixVariable2 = ob_get_clean();
if ($_prefixVariable2 == NULL) {?> oczekuje na akceptację <?php } else { ?> <?php ob_start();
echo $_smarty_tpl->tpl_vars['kom']->value["aktywny"];
$_prefixVariable3 = ob_get_clean();
if ($_prefixVariable3 == 1) {?> widoczny <?php } else { ?> odrzucony: niezgodny z regulaminem<?php }?> <?php }?></td><!-- widoczność --><td><a class="button primary fit disabled" href="#">Edytuj</a>&nbsp;<a class="button primary fit disabled" href="#">Usuń</a></td></tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>      
                </tbody>
                <tfoot>
                        <tr>
                                <td colspan="2"></td>
                                <td>Ilość komentarzy czytelnika: <?php echo $_smarty_tpl->tpl_vars['ileKom']->value;?>
</td>
                        </tr>
                </tfoot>
        </table>
</div>  

</section>

              

 <section class="post">
<h3>Lista artykułów, które możesz skomentować</h3>
<div class="table-wrapper">
            <form  action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
panelCzytelnik">
                <fieldset>
                    <ul class="actions">
                        <button type="submit" class="button primary icon solid fa-search">Wyszukaj</button ><!-- comment -->
                        <input type="text" placeholder="Jakiego tytułu szukasz (wystarczy fragment tytułu)?" name="tytulArt" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->parametrWyszukiwaniaArt;?>
" /><br />
                    </ul>
                </fieldset>
            </form>
        <table class="alt">
                <thead>
                        <tr>
                                <th>Data publikacji</th>
                                <th>Tytuł</th>
                                <th>Dodaj komentarz</th>
                        </tr>
                </thead>
                <tbody>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaArt']->value, 'art');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['art']->value) {
?>
                    <tr><td><?php echo $_smarty_tpl->tpl_vars['art']->value["data_publikacji"];?>
</td><!-- utworzono --><td><?php echo $_smarty_tpl->tpl_vars['art']->value["tytul"];?>
</td><!-- tytuł --><td><a class="button primary fit" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
nowyKomentarz/<?php echo $_smarty_tpl->tpl_vars['art']->value['id'];?>
">+ Nowy komentarz</a></td></tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>      
                </tbody>
                <tfoot>
                        <tr>
                                <td colspan="1"></td>
                                <td>Ilość artykułów na blogu: <?php echo $_smarty_tpl->tpl_vars['ileArt']->value;?>
</td>
                        </tr>
                </tfoot>
        </table>
</div>  
</section>
</div>
                                
<?php
}
}
/* {/block 'content'} */
/* {block 'intro'} */
class Block_184129246167992b21411528_89207807 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'intro' => 
  array (
    0 => 'Block_184129246167992b21411528_89207807',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
   

 <?php
}
}
/* {/block 'intro'} */
}
