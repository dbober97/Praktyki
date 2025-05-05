{extends file="main.tpl"}


 {block name=intro}   
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
    
{/block}


{block name=content}
    
    
<!-- Nav -->
<nav id="nav">

            <ul class="links">

                <li class="active"><a href={$conf->action_url}glowna>Strona główna</a></li>
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
                

                  
<!-- Main -->
<div id="main"> 
<form id="search-form" onsubmit="ajaxPostForm('search-form','{$conf->action_url}blogFragment','zawartosc'); return false;">
    <fieldset>

            <button type="submit" class="button primary icon solid fa-search">Wyszukaj</button ><!-- comment -->
            <input type="text" placeholder="Jakiego tytułu szukasz?" name="tytul" value="{$form->parametrWyszukiwania}" /><br />
    </fieldset>
</form>
</div>
                      
<!-- Posts -->
<div id="zawartosc">
    {include file="Blog_fragment.tpl"}
</div>        
                    

{/block}

{block name=intro}   

{/block}

   
