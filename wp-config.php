<?php
/**
 * A WordPress fő konfigurációs állománya
 *
 * Ebben a fájlban a következő beállításokat lehet megtenni: MySQL beállítások
 * tábla előtagok, titkos kulcsok, a WordPress nyelve, és ABSPATH.
 * További információ a fájl lehetséges opcióiról angolul itt található:
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 *  A MySQL beállításokat a szolgáltatónktól kell kérni.
 *
 * Ebből a fájlból készül el a telepítési folyamat közben a wp-config.php
 * állomány. Nem kötelező a webes telepítés használata, elegendő átnevezni
 * "wp-config.php" névre, és kitölteni az értékeket.
 *
 * @package WordPress
 */

// ** MySQL beállítások - Ezeket a szolgálatótól lehet beszerezni ** //
/** Adatbázis neve */
define( 'DB_NAME', 'MocabTestDB' );

/** MySQL felhasználónév */
define( 'DB_USER', 'admin' );

/** MySQL jelszó. */
define( 'DB_PASSWORD', '' );

/** MySQL  kiszolgáló neve */
define( 'DB_HOST', 'localhost' );

/** Az adatbázis karakter kódolása */
define( 'DB_CHARSET', 'utf8mb4' );

/** Az adatbázis egybevetése */
define('DB_COLLATE', '');

/**#@+
 * Bejelentkezést tikosító kulcsok
 *
 * Változtassuk meg a lenti konstansok értékét egy-egy tetszóleges mondatra.
 * Generálhatunk is ilyen kulcsokat a {@link http://api.wordpress.org/secret-key/1.1/ WordPress.org titkos kulcs szolgáltatásával}
 * Ezeknek a kulcsoknak a módosításával bármikor kiléptethető az összes bejelentkezett felhasználó az oldalról.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY', '*IW+IF_{E4RN-(($5i$X <qeiFe{SIX_obz0~28 kJ.kzN#.{I4*1On76X~hWxWG' );
define( 'SECURE_AUTH_KEY', 'Oe2aH-CMsh`)~fGcB`8-lF2Scp-Mz5Z`>O} K4?`&;|I*7L=lhnQbTFEZoi#94o5' );
define( 'LOGGED_IN_KEY', 'pvH]+!(RI2<?!+rpfb}9esWBmgjutm0+82SKc[0w}.%DgpbD+!01){sn*FN:{eDw' );
define( 'NONCE_KEY', '+U|-_m0Cjm^a2ZaU:(XW*|i$>g!Hsn`W@v4pVhJutCQ?QuS7:6:1Q.-^J]:c7-I%' );
define( 'AUTH_SALT',        '79MU.ru>i*PKf:}CIH4k.7;`4:~-(,gRBnxvx<$wQ[uFt53d9&>;!P5[YK,ij;vs' );
define( 'SECURE_AUTH_SALT', 'gU_NXxinCG44s?0(V2P5kY*R+Qc8Vc-%r}F^_owoFpj[Yr?P_Zef3RjzRJVz!U>Z' );
define( 'LOGGED_IN_SALT',   'VOnMZCb{i/gcpB1**M;;O+}gf;[ZDB/|> JV! ,} Kst0bu(Va4*6PC6L5.@rEa1' );
define( 'NONCE_SALT',       'N6sF-YUp>C*)Xj{[22|Ga7<{Oz(bC{$F lOA1(W43u?+%0s9Lmg@&%~3PZs gu2h' );

/**#@-*/

/**
 * WordPress-adatbázis tábla előtag.
 *
 * Több blogot is telepíthetünk egy adatbázisba, ha valamennyinek egyedi
 * előtagot adunk. Csak számokat, betűket és alulvonásokat adhatunk meg.
 */
$table_prefix = 'wp_mocabtest';

/**
 * Fejlesztőknek: WordPress hibakereső mód.
 *
 * Engedélyezzük ezt a megjegyzések megjelenítéséhez a fejlesztés során.
 * Erősen ajánlott, hogy a bővítmény- és sablonfejlesztők használják a WP_DEBUG
 * konstansot.
 */
define('WP_DEBUG', false);

/* Ennyi volt, kellemes blogolást! */

/** A WordPress könyvtár abszolút elérési útja. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Betöltjük a WordPress változókat és szükséges fájlokat. */
require_once(ABSPATH . 'wp-settings.php');
