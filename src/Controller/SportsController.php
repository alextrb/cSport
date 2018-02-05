<?php
    namespace App\Controller;

    use App\Controller\AppController;
    
    class SportsController extends AppController
    {   
        
        public function index(){
            $this->loadModel("Members");
            $m=$this->Members->find();
            $this->set("m",$m->toArray());
        }
        
        public function classements(){
            
        }
        
        public function connexion(){
            
        }
        
        public function moncompte(){
            
        }
        
        public function seance(){
            
        }
        
        public function objetsco(){
            
        }
        
        public function contact(){
            
        }
        
        public function equipe(){
            
        }
        
        public function mention(){
            
        }
        
        public function tuto(){
            
        }
    }
