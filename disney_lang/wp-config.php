<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'disney_20160317');

/** MySQL数据库用户名 */
define('DB_USER', 'root');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'root');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '6KfJ4U}%ikC.3K9w<).e8 O+U~:s6`Etgj.]xJ;Ew_&Rt$+9SdHPyIfhD2Hr2,.B');
define('SECURE_AUTH_KEY',  'kK;ha466AEcS5qlQPDS^*Ifs)P#WnZ~vigxvZF6EtV(5w3HOX)>uJxwmhiDI#-+w');
define('LOGGED_IN_KEY',    ' kLi5=36N :F&|I ha$+K|v.M90-QMxE&A.U~BP+#k`0T?t_*mPHxr#VE)0+suS8');
define('NONCE_KEY',        'F&Kh44Hw8b/#_%3MN)Fl:NNNvb<PDpQ]wv>f]WoH}sd;`h;X`8v?q(G9.cp;r6Rh');
define('AUTH_SALT',        'KKSwgTgrwC)InAd@}zTiGQ|fkEhc+xcgl@w$2kiFxm,yGZT?T*Yfzq!V[6q2H-)S');
define('SECURE_AUTH_SALT', 'YAl{$7* zlRn4R.-m0|H}1eh</(s+:Jl@zJ;rvvqdzEL|faQ]VG@;jPF+y7sdIjp');
define('LOGGED_IN_SALT',   'xI!(G>nS%}U%pa|:AkJm +z/~`h88*F|q:1saA1RwZ.C/;7kP,KjZpO/H!Dn|-zq');
define('NONCE_SALT',       'C:]p22FBimPJRy~iG-yW`*+Xz q-`%a?:F@Eu&c_-XAisb;udXvy+}w5A2I2)EX2');


/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

define('WP_DEFAULT_THEME', 'disney');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
