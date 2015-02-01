<?php

function make_top($text) {
$text=str_replace("\r\n"," ",$text);
$text=strtolower($text);
$text=str_word_count($text, 1, "#@âêîôûéàùèù'_123456789.://()");
$text = del_url($text);
$text=implode(" ", $text);
$text = str_word_count($text, 1, "#@âêîôûéàùèù'_123456789");
$out = $text;
$out = array_filter($out, 'notCommon');
$out = array_count_values($out);
arsort($out);
$out=array_slice($out,0,11);
array_shift($out);
return ($out);
}

function del_url ($array) {
    foreach ($array as $key => $value) {
        if (preg_match_all("/^http:\/\/?[^\/]+/i", $value))
            unset($array[$key]);
        else if (preg_match_all("/^https:\/\/?[^\/]+/i", $value))
             unset($array[$key]);
        else if (preg_match_all("/^[0-9]/", $value))
        	unset($array[$key]);
        else if (ord($value) > 127)
        	unset($array[$key]);
    }
    return $array;
}

function notCommon ($word) {
$word_filter = array('', '<','>','D','d','x','pu', 'x', 'rigole','sais', 'sors', 'ait', 'rire', 'crois', 'sort', 'pcq', 'cest', 'puisque', 'prend','1','soir', 'hier', "aujourd'hui", 'demain', 'trouvé', 'demande', 'demander', 'demandé', "l'émission", 'surtout', 'ouvre', 'raison', 'encore', '-', 'enfin', 'el', 'you', 'as', 'cosas', 'your', 'savoir', 'utilisez', 'démarre', 'vient', 'âge', 'révèle', "l'aurait", 'détecté', 'derrière', 'savez-vous', 'aux', 'laisser', 'petit', 'petite', 'envie', 'fais', 'gt', 'xd', "n'a", 'faut', 'allez', 'aller', 'arrêtez', 'devient', "l'a", 'sera', 'bon', 'tant', 'sûr', '..', 'cas', 'très', 'veut', 'voit', "l'air", 'cela', 'croit', 'est-ce', 'ki', 'gens', 'mec', 'meuf', 'après', 'vrai', 'faux', 'clair', 'lt', 'avoir', 'wsh', 'wesh', 'wech', "c'était", 'faisait', 'belle', 'beau', 'vie', 'était', 'disait', 'leur', 'leurs', 'aussi', 'partir', 'failli', 'faillit', 'jamais', "j'suis", "d'autres", 'vers', 'dont', 'es', 'gros', 'couille', 'couilles', "d'la", 'cet', 'ca', 'par', 'pr', '#lt', 'parce', 'donc', 'oui', 'vois', 'vais', "t'as", 'veux', 'vaut', 'partie', 'au', "n'y", 'au', 'pourquoi', 'daronne', 'celle', 'déjà', "j'aime", 'vas', 'sans', 'genre', 'côté', ':o', 'off', 'âge.', 'apres','trouve','hors',':D',':p',':)',"l'autre","n'est", "y'a",'vraiment', '_', 'met', 'depuis', 'entre' ,'faire','dirait', 'haha',"j'm",'tous', 'toutes', 'font', 'y', 'sûre', "d'avoir",'ans','car',':d','toujours','devant',"j'allais",'notre','faites','merde',"j'arrête","qu'une","n'ai",'mal','puis','bien','émission','moins','plus','vos',"j'ai",'ew','là','pb',"j'crois",'fait',"peu","vu","d'un","d'une",'toute','hein',"qu'est",'tes','mes','me','son','ton','mon','ma','mettre','peux','fan','dire','...','suis','cette','�',"qu'on",'pt',"t'es",'.','ho','oh','ds','non','tte',"j'attendais",'peut','jte',"j'me",'pk','pa',"qu'elles","qu'ils","qu'elle","qu'il",'toi','moi','comment','comme','chaque','ces','ses','tt','trop','monde','tout','même','ptn','putain','ont','on','meme','the','home','fois','alors','to','0','regarder','regarde','t','c','que','ou','quand','quoi','qui','tv','omg','nw','dit','va','avec','lui',':','voir','pas',"c'est",'si','xD','lol','mdr','ptdr','sert','sont','quel','rien','être','mais','pour','est','il','elle','sur', 'ce', 'le', 'la', 'de', 'a', 'les', 'des', 'ceux', 'dans', 'à', 'ces', 'et', 'se', 'ah', 'ne', 'que', 'quoi', 'me', 'ça', 'tu', 'un', 'ta', 'tes', 'je', 'nous', 'vous', 'ils', 'elles', 'ton', 'mon', 'son', 'sa', 'te', 'm', 's', 'l', 'en', 'une', 'du');
return !in_array($word, $word_filter);

}