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
                return "Il y a " . $months . " moi(s)";
            } else {
                $years = round($timeDifference / 31536000);
                return "Il y a " . $years . " an(s)";
            }
        }
    }
?>