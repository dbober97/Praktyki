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
                    
<div class="fields" id="main">
        <form method="post" action="{$conf->action_url}logout">
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

{/block}