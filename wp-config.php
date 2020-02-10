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
define( 'DB_NAME', 'moclabdb' );

/** MySQL felhasználónév */
define( 'DB_USER', 'root' );

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
define( 'AUTH_KEY', 'sqQNgm8x+};RgBu]zwci46-pM!.DR,zX*GqdR58+z<TpmFVClq4B)jYbrg~Av4e7' );
define( 'SECURE_AUTH_KEY', 'fQDs/e?exgvZi$>70^?!Xa~a$PM[U2Xm(OOiJGVQtBt@t#F[~tVY?P;a@uMWX5{z' );
define( 'LOGGED_IN_KEY', 'BEyrq_(cSb%$oflRkgD@rvItm=ujh{&esS4n#.P)hWQxhgadqlNcM}n>7&x-4&W8' );
define( 'NONCE_KEY', 'CqB/)4Is657hbm0sN9vssuvK^Gm:-[rE;w}b4x+|bEq ]_aeZ4&bN3WeDYM<?LOf' );
define( 'AUTH_SALT',        'SMH ]lI?/l]q45:(G67I<cC?4ZAKZ$ulhF.Sl]F.TJ<XNKR^~ldtisij?lw-Z{U)' );
define( 'SECURE_AUTH_SALT', '1cEF:.F<fp5{lLE2IcbW2vc&v]4x#G:S/] @?]Azp}@ay0Uak]T |1]h7Q|PR99e' );
define( 'LOGGED_IN_SALT',   'F5yuo=# KxZ9qtl.t9;TK9!vcn#?eX;$Jl/c<Ksv.(j#e+v(kY5M 5_?z Pc*HvT' );
define( 'NONCE_SALT',       'uIl!,o*_1;By.P~BdJLH1qoD!905b}tTyHWG6GXnm[OkmgSEs+#>p^$vuB,+E0NW' );

/**#@-*/

/**
 * WordPress-adatbázis tábla előtag.
 *
 * Több blogot is telepíthetünk egy adatbázisba, ha valamennyinek egyedi
 * előtagot adunk. Csak számokat, betűket és alulvonásokat adhatunk meg.
 */
$table_prefix = 'wp_';

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
