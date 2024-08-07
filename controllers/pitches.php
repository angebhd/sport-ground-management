<?php 
    class PitchesController {

        public function getAll(){

            require_once ("models/Pitches.php");
            $pitches = new Pitches();
            return $pitches->getAll();
        }

    }

?>