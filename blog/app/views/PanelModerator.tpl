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
            
<h3>Lista komentarzy na blogu</h3>
<div class="table-wrapper">
            <form id="search-form" onsubmit="ajaxPostForm('search-form','{$conf->action_url}panelModeratorFragment','zawartosc'); return false;">
                <fieldset>
                    
                        <button type="submit" class="button primary icon solid fa-search">Wyszukaj</button ><!-- comment -->
                        <input type="text" placeholder="Jakiego tytułu szukasz (wystarczy fragment tytułu)?" name="tytul" value="{$form->parametrWyszukiwania}" /><br />
                   
                </fieldset>
            </form>
                    
                    
    {foreach $msgs->getMessages() as $msg}
     <div class="alert {if $msg->isInfo()}alert-success{/if}
                       {if $msg->isWarning()}alert-warning{/if}
                       {if $msg->isError()}alert-danger{/if}" role="alert">
        {$msg->text}
        <br>
     </div>
    {/foreach} 
    
    <br>

        <div id="zawartosc">
            {include file="PanelModerator_fragment.tpl"}
        </div>

</div>  

</section>  
</div>
{/block}


 {block name=intro}   

 {/block}