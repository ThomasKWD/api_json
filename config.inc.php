<?php
/*
Der Wert adressen wird zentral an einer Stelle gespeichert, um ihn besser ansprechen zu können.
*/
$mypage = 'api_json';


/*
AddOn-ID, damit es weniger leicht zu Komplikationen mit anderen AddOns kommt.
Besonders wichtig, wenn man das AddOn im REDAXO-Download veröffentlichen will.
*/
$REX['ADDON']['rxid'][$mypage] = '2657';


/*
Die Page-Variable regelt die URL, mit der auf das AddOn zugegriffen wird.
*/
// $REX['ADDON']['page'][$mypage] = $mypage;


/*
AddOn-Name, wie er im Menü angezeigt werden soll.
Ist natürlich nur dann nötig, wenn das AdOn überhaupt einen Menüpunkt erzeugen soll.
*/
// $REX['ADDON']['name'][$mypage] = 'Adressliste';


/*
Benutzer-Recht: Wenn man im AddOn Rechte verwaltet, muss diese Variable gesetzt werden.
Man muss dann einem Redakteur explizit das Recht zuweisen,
damit er im Backend auf das AddOn im Backend zugreifen kann.
*/
// $REX['ADDON']['perm'][$mypage] = 'adressen[]';
// $REX['PERM'][] = 'adressen[]';


/*
Hier kann man Informationen zur Version und zum Autor hinterlegen.
*/
$REX['ADDON']['version'][$mypage] = "0.1";
$REX['ADDON']['author'][$mypage] = "Thomas Kühne";


/*
Hier wird der Tabellen-Prefix verwaltet.
In unserem spezielle Fall und in einer Standardinstallation lautet er "rex_553_".
*/
// $REX['ADDON']['dbpref'][$mypage]=$REX['TABLE_PREFIX'].$REX['ADDON']['rxid'][$mypage].'_';


/*
Das Anlegen einer Sprachintanz ist nötig, wenn man das AddOn Backend mehrsprachig verwalten will.
Dieser Schlüssel muss natürlich eindeutig sein.
*/
// $I18N_adressen = new i18n($REX['LANG'], $REX['INCLUDE_PATH'].'/addons/'.$mypage.'/lang/');

function kwd_startJsonApi() {
	// echo 'hheeeeeeeee';
	$kwdApi = new kwd_jsonapi(); // ??? add parameter from config as server string *index*
	$kwdApi->sendResponse();
}

/*
Falls benötigt, werden AddOn-spezifische Klassen und Funktionen geladen.
Mit $REX['REDAXO'] kann man zwischen Frontend und Backend unterscheiden.
*/
if ($REX['REDAXO']) {
	// Gilt nur für das Backend
} else {
	// Gilt nur für das Frontend
	// bitte require ... auskommentieren.
	require $REX['INCLUDE_PATH'].'/addons/'.$mypage.'/classes/class.kwd_jsonapi.inc.php';
	kwd_startJsonApi();
}


// rex_register_extension('OUTPUT_BUFFER', 'kwd_startJsonApi');
?>