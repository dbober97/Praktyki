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
                    <li class="active"><a href="{$conf->action_url}autorzy">Autorzy</a></li>
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
    <header>
            <h2>Witaj!</h2>
            <p>Kilka słów o blogu.</p>
    </header>
      
       <p>Kilka słów o autorach.
       <img src="http://localhost/blog/public/images/4intro.png"></p>
    </div>

{/block}