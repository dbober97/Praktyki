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
        
<h3>Tryb dodawania komentarza</h3>
<form method="post" action="{$conf->action_root}opublikujKomentarz/{$form2->idArt}">
      
        <div class="row gtr-uniform">
                <div class="col-12">
                        <textarea name="tresc" id="tresc" value="{$form2->tresc}" placeholder="Treść komentarza" rows="6"></textarea>
                </div>
                <!-- Break -->
                <div class="col-12">
                        <ul class="actions">
                                <li><input type="submit" value="Opublikuj" class="primary" /></li>
                        </ul>
                </div>
        </div>
               

</form>


</section>
</div>
    
{/block}


 {block name=intro}   

 {/block}