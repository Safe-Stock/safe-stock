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
    }
?>