{extends file="main.tpl"}

{block name=content}
<!-- Nav -->
<nav id="nav">
                <ul class="links">
                    <li><a href={$conf->action_url}glowna>Strona główna</a></li>
                    <ol>
                           <li><a class="dropdown-toggle" data-toggle="dropdown" >kategorie</a>
                                <ul>
                                 <li><a href="{$conf->action_url}matematyka">Matematyka</a></li>
                                  <li><a href="{$conf->action_url}informatyka">Informatyka</a></li>
                                  <li><a href="{$conf->action_url}fizyka">Fizyka</a></li>
                                </ul>
                           </li>
                    </ol> 
                    <li><a href="{$conf->action_url}autorzy">Autorzy</a></li>
                    <li><a href="{$conf->action_url}kontakt">Kontakt</a></li>
                    {if \core\RoleUtils::inRole("admin") || \core\RoleUtils::inRole("moderator") || \core\RoleUtils::inRole("czytelnik") || \core\RoleUtils::inRole("autor")}
                        <li><a href="{$conf->action_url}logout">Wyloguj się</a></li>
                        <ol>
                           <li><a class="dropdown-toggle" data-toggle="dropdown" >Panel zalogowanego: {\core\SessionUtils::load("login", true)}</a>
                                <ul>
                                  {if \core\RoleUtils::inRole("admin")} <li><a href="{$conf->action_url}panelAdmin">administrator</a></li> {/if}
                                 {if \core\RoleUtils::inRole("moderator")}<li><a href="{$conf->action_url}panelModerator">moderator</a></li> {/if}
                                 {if \core\RoleUtils::inRole("autor")} <li><a href="{$conf->action_url}panelAutor">autor</a></li> {/if}
                                 {if \core\RoleUtils::inRole("czytelnik")} <li><a href="{$conf->action_url}panelCzytelnik">czytelnik</a></li> {/if}
                                </ul>
                           </li>
                       </ol> 
                        {else}
                            <li><a href="{$conf->action_url}logowanie">Logowanie</a></li>
                    {/if}
                </ul>

        </nav>  

                
<div id="main">
    <section class="post">
 
    {foreach $msgs->getMessages() as $msg}
   <div class="alert {if $msg->isInfo()}alert-success{/if}
                     {if $msg->isWarning()}alert-warning{/if}
                     {if $msg->isError()}alert-danger{/if}" role="alert">
      {$msg->text}
   </div>
  {/foreach}       
        
<h3>Tryb dodawania/edycji artykułów</h3>
<form method="post" action="{$conf->action_root}zapiszArtykul">
      
        <div class="row gtr-uniform">
            
                <div class="col-12">
                        <input type="text" name="tytul" id="tytul" value="{$form->tytul}" placeholder="Tytuł" />
                </div>
                <!-- Break -->
                <div class="col-6 col-12-small">
                        <select name="wybranaKategoria" id="wybranaKategoria">
                                <option value="">- Kategoria (wymagane) -</option>
                                <option value="1">Matematyka</option>
                                <option value="2">Fizyka</option>
                                <option value="3">Informatyka</option>
                        </select>
                </div>
                <div class="col-6 col-12-small">
                        <ul class="actions">
                                <li><a href="{$conf->action_root}nowaKategoria" class="button primary">+ Nowa</a></li>
                        </ul>
                </div>                               
                <!-- Break -->
				<div class="col-6 col-12-small">
					<input type="checkbox" id="komentarze" name="komentarze" checked>
					<label for="komentarze">Komentarze dozwolone</label>
				</div>
				<div class="col-6 col-12-small">
					<input type="checkbox" id="artykulWidoczny" name="artykulWidoczny">
					<label for="artykulWidoczny">Widoczny</label>
				</div>
                <!-- Break -->
                
                <div class="col-12">
                        <textarea name="tresc" id="tresc" value="{$form->tresc}" placeholder="Treść artykułu [wymagany krótki wstęp widoczny na stronie głównej: napisz go, po nim znak dolara <w związku z tym znak dolara w tekście jest niedozwolony> i zacznij pisać artykuł] :)" rows="6"></textarea>
                </div>
                
                <!-- Break -->
                <div class="col-12">
                        <ul class="actions">
                                <li><input type="submit" value="Zapisz" class="primary" /></li>
                        </ul>
                </div>
        </div>
               

</form>


</section>
</div>
    
{/block}


 {block name=intro}   

 {/block}