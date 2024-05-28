<?php
        class CalculoHora{
            private $dateDiff;
            private $valorHora = 5;
            private $entry;
            private $final;
            


            public function getLocation($entry, $final){
                $this->entry = new DateTime($entry);
                $this->final = new DateTime($final);
                
                $this->dateDiff=$this->entry->diff($this->final);
                $valorFinal = 0;
                
                if($this->dateDiff->h > 0){
                    $valorFinal += $this->dateDiff->h * $this->valorHora; 
                }

                if($this->dateDiff->i > 30){
                    $valorFinal +=  $this->valorHora; 
                }
                
                return $valorFinal;
            }
        }
