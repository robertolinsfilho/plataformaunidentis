<?php











namespace Composer;

use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-master',
    'version' => 'dev-master',
    'aliases' => 
    array (
    ),
    'reference' => '8bec06b85acf6a1b885d3c0f846de4d21b1a14bd',
    'name' => '__root__',
  ),
  'versions' => 
  array (
    '__root__' => 
    array (
      'pretty_version' => 'dev-master',
      'version' => 'dev-master',
      'aliases' => 
      array (
      ),
      'reference' => '8bec06b85acf6a1b885d3c0f846de4d21b1a14bd',
    ),
    'dompdf/dompdf' => 
    array (
      'pretty_version' => 'v1.0.2',
      'version' => '1.0.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '8768448244967a46d6e67b891d30878e0e15d25c',
    ),
    'nuzkito/chrome-html-to-pdf' => 
    array (
      'pretty_version' => '2.0.0',
      'version' => '2.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'b28654dfe7c3568d28001988720b42eacc741395',
    ),
    'phenx/php-font-lib' => 
    array (
      'pretty_version' => '0.5.2',
      'version' => '0.5.2.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ca6ad461f032145fff5971b5985e5af9e7fa88d8',
    ),
    'phenx/php-svg-lib' => 
    array (
      'pretty_version' => 'v0.3.3',
      'version' => '0.3.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '5fa61b65e612ce1ae15f69b3d223cb14ecc60e32',
    ),
    'phpmailer/phpmailer' => 
    array (
      'pretty_version' => 'v6.2.0',
      'version' => '6.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e38888a75c070304ca5514197d4847a59a5c853f',
    ),
    'sabberworm/php-css-parser' => 
    array (
      'pretty_version' => '8.3.1',
      'version' => '8.3.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd217848e1396ef962fb1997cf3e2421acba7f796',
    ),
    'stymiee/php-simple-encryption' => 
    array (
      'pretty_version' => '1.0.4',
      'version' => '1.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '355b5a55a881bbe358bb2a359f499ae8df796aa5',
    ),
  ),
);







public static function getInstalledPackages()
{
return array_keys(self::$installed['versions']);
}









public static function isInstalled($packageName)
{
return isset(self::$installed['versions'][$packageName]);
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

$ranges = array();
if (isset(self::$installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = self::$installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}





public static function getVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['version'])) {
return null;
}

return self::$installed['versions'][$packageName]['version'];
}





public static function getPrettyVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return self::$installed['versions'][$packageName]['pretty_version'];
}





public static function getReference($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['reference'])) {
return null;
}

return self::$installed['versions'][$packageName]['reference'];
}





public static function getRootPackage()
{
return self::$installed['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
}
}
