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
                    <li class="active"><a href="{$conf->action_url}logowanie">Zaloguj się</a></li>
                </ul>

        </nav> 
                    
<div class="fields" id="main">
        <form method="post" action="{$conf->action_root}logowanie">
                <div class="fields">
                        <div class="field half">
                                <label for="name">Login</label>
                                <input type="text" name="login" id="login" />
                        </div>
                        <div class="field half">
                                <label for="pass">Hasło</label>
                                <input type="password" name="pass" id="pass" />
                        </div>
                </div>
                <ul class="actions">
                        <li><input type="submit" value="Zaloguj się" class="button primary"/></li>
                        <li><input type="reset" value="Przypomnij hasło" class="button"/></li>
                </ul>
                
                {foreach $msgs->getMessages() as $msg}
                <div class="alert {if $msg->isInfo()}alert-success{/if}
                                  {if $msg->isWarning()}alert-warning{/if}
                                  {if $msg->isError()}alert-danger{/if}" role="alert">
                   {$msg->text}
                </div>
               {/foreach}
        </form>
        
        <p>Nie masz konta? Zarejestruj się poniżej, by utworzyć konto czytelnicze.</p>
        
                <form method="post" action="{$conf->action_root}rejestracja">
                <div class="fields">
                        <div class="field half">
                                <label for="login">Login</label>
                                <input type="text" name="login" id="login" placeholder="podaj unikalny login"/>
                        </div>
                        <div class="field half">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" id="email" placeholder="xyz@xyz.xyz" />
                        </div>
                        <div class="field half">
                                <label for="pass1">Hasło</label>
                                <input type="password" name="pass1" id="pass1" placeholder="podaj silne hasło"/>
                        </div>
                        <div class="field half">
                                <label for="pass2">Wprowadź ponownie hasło</label>
                                <input type="password" name="pass2" id="pass2"/>
                        </div>
                        <div class="field half">
                                <label for="nazwa">Podaj nazwę konta - będzie widoczna dla innych</label>
                                <input type="text" name="nazwa" id="nazwa" placeholder="jak masz na imię?"/>
                        </div>                    
                </div>
                <ul class="actions">
                        <li><input type="submit" value="Zarejestruj się" class="button primary"/></li>
                </ul>
                
        </form>
                
</div>

{/block}