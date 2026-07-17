<?php
class Utils 
{
    public static function redirect(string $action, array $params = []): void
    {
        $url = "index.php?action=$action";
        foreach ($params as $paramName => $paramValue) {
            $url .= "&$paramName=$paramValue";
        }
        header("Location: $url");
        exit();
    }

    public static function format(string $string): string
    {
        $finalString = htmlspecialchars($string, ENT_QUOTES);
        $lines = explode("\n", $finalString);
        $finalString = "";
        foreach ($lines as $line) {
            if (trim($line) !== "") {
                $finalString .= "<p>$line</p>";
            }
        }
        
        return $finalString;
    }

    public static function request(string $variableName, mixed $defaultValue = null): mixed
    {
        return $_REQUEST[$variableName] ?? $defaultValue;
    }

}

