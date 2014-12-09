<?php 
$I = new FunctionalTester($scenario);
$I->am('un usuario');
$I->wantTo('comprobar que se muestra el texto "ultimas noticias"');
$I->amOnPage('/');
$I->see(Lang::get('site.ultimas-noticias'));
