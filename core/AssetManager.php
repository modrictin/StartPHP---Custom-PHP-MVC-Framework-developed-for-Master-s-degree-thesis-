<?php
/**
 * Created by PhpStorm
 * User: Tin Modrić
 * Date: 1/29/2021
 */

namespace app\core;


class AssetManager
{


    /**
     * @var array
     * Array Containing Packages that will be appended as data in the Render View Func
     *
     * Format: 'Package Name' => "CSS" => array of paths to css
     *                        => "js" => Array of paths to Js
     */

    static array $TemplatePackages = [
        'tester' => [
            'css' => ['tester/css/test.css', 'tester/css/test2.css'],
            'js' => ['tester/js/test1.js', 'tester/js/test2.js']
        ],
    ];

    public static function baseUrl()
    {
        $htt = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http';
        return $htt . '://' . $_SERVER["SERVER_NAME"];
    }

    static function GetTemplateScripts()
    {
        $js_includes = '';
        if (@file_exists('./assets/template/js/')) {
            $included_files = scandir('./assets/template/js/');
            if (!empty($included_files)) {
                foreach ($included_files as $file_name) {
                    if (preg_match('!\.js!', $file_name)) {
                        $Path = self::baseUrl() . '/assets/template/js/' . $file_name;
                        $js_includes .= '<script src="' . $Path . '"></script>';
                    }
                }
            }
        }
        echo $js_includes;
    }

    public static function GetTemplateStyles()
    {
        $css_includes = '';
        if (@file_exists('./assets/template/css/')) {
            $included_files = scandir('./assets/template/css/');
            if (!empty($included_files)) {
                foreach ($included_files as $file_name) {
                    if (preg_match('!\.css!', $file_name)) {
                        $Path = self::baseUrl() . '/assets/template/css/' . $file_name;
                        $css_includes .= " <link rel=\"stylesheet\" href=\"$Path\"/>\n";
                    }
                }
            }
        }
        echo $css_includes;
    }


    public
    static function GetViewScripts(string $view)
    {
        $js_includes = '';
        if (@file_exists('./assets/view_assets/' . $view . '/js/')) {
            $included_files = scandir('./assets/view_assets/' . $view . '/js/');
            if (!empty($included_files)) {
                foreach ($included_files as $file_name) {
                    if (preg_match('!\.js!', $file_name)) {
                        $Path = self::baseUrl() . '/assets/view_assets/' . $view . '/js/' . $file_name;
                        $js_includes .= '<script src="' . $Path . '"></script>';
                    }
                }
            }
        }
        echo $js_includes;
    }


    public
    static function GetViewStyles(string $view)
    {

        $css_includes = '';
        if (@file_exists('./assets/view_assets/' . $view . '/css/')) {
            $included_files = scandir('./assets/view_assets/' . $view . '/css/');
            if (!empty($included_files)) {
                foreach ($included_files as $file_name) {
                    if (preg_match('!\.css!', $file_name)) {
                        $Path = self::baseUrl() . '/assets/view_assets/' . $view . '/css/' . $file_name;
                        $css_includes .= " <link rel=\"stylesheet\" href=\"$Path\"/>\n";
                    }
                }
            }
        }
        echo $css_includes;

    }

    public
    static function IncludePackages(array $Packages)
    {
        $ReturnArray = [];
        if (!empty($Packages)) {
            foreach ($Packages as $package) {
                if (key_exists($package, self::$TemplatePackages)) {
                    foreach (self::$TemplatePackages[$package] as $AssetType => $AssetArray) {
                        if (!empty($AssetArray)) {
                            foreach ($AssetArray as $asset) {
                                $ReturnArray[$AssetType][] = $asset;
                            }
                        }
                    }
                }
            }
        }
        return $ReturnArray;
    }

    public
    static function GetPackageStyles(array $Packages)
    {
        $StylesHtml = '';
        if (!empty($Packages)) {
            foreach ($Packages['css'] as $path) {
                $StylesHtml .= " <link rel=\"stylesheet\" href=\"./assets/packages/$path\"/>\n";
            }
            echo $StylesHtml;
        }


    }

    public
    static function GetPackageScripts(array $Packages)
    {
        if (!empty($Packages)) {
            $ScriptsHtml = '';
            foreach ($Packages['js'] as $path) {
                $ScriptsHtml .= '<script type="text/javascript" src="./assets/packages/' . $path . '"></script>';
            }
        }
        echo $ScriptsHtml;
    }

}