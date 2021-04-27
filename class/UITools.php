<?php 
    class UITools {

        public static function ResizeText($oldText, $maxCharacters) {
            if(strlen($oldText) > $maxCharacters) {
                $newText = substr($oldText, 0, $maxCharacters);
                $newText .= " ...";
            } else {
                $newText = $oldText;
            }

            return $newText;
        }

        public static function DebugVariable($VariableDebug) {
            echo '<pre>';
            var_dump($VariableDebug);
            echo '</pre>';
            die();
        }

        public static function GetTimeAgo($date) {
            $timeAgo = strtotime($date);
            $currentTime = strtotime(date("Y-n-j"));
            $timeDifference = $currentTime - $timeAgo;

            if($timeDifference <= 86400) {
                return "Aujourd'hui";
            } elseif($timeDifference <= 2592000) {
                $day = round($timeDifference / 86400);
                return "Il y a " . $day . " jour(s)";
            } elseif($timeDifference <= 31536000) {
                $months = round($timeDifference / 2592000);
                return "Il y a " . $months . " mois";
            } else {
                $years = round($timeDifference / 31536000);
                return "Il y a " . $years . " an(s)";
            }
        }

        public static function ConvertBytes($bytes) {
            $bytes = floatval($bytes);
            $arBytes = array(
                0 => array(
                    "UNIT" => "TB",
                    "VALUE" => pow(1024, 4)
                ),
                1 => array(
                    "UNIT" => "GB",
                    "VALUE" => pow(1024, 3)
                ),
                2 => array(
                    "UNIT" => "MB",
                    "VALUE" => pow(1024, 2)
                ),
                3 => array(
                    "UNIT" => "KB",
                    "VALUE" => 1024
                ),
                4 => array(
                    "UNIT" => "B",
                    "VALUE" => 1
                ),
            );
    
            foreach($arBytes as $arItem)
            {
                if($bytes >= $arItem["VALUE"])
                {
                    $result = $bytes / $arItem["VALUE"];
                    $result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
                    break;
                }
            }
            return $result;
        }

        public static function ConvertDate($origDate) {
            setlocale(LC_TIME, "fr_FR");
            $newDate = utf8_encode(strftime("%d %B %G", strtotime($origDate)));
            return $newDate;
        }
    }
?>