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
             $this->loadModel("Workouts");
            $new = $this->Workouts->newEntity();
            if($this->request->is("post")){
                $d = \Cake\I18n\Time::create($this->request->data['date']['year'],$this->request->data['date']['month'],
                        $this->request->data['date']['day'],$this->request->data['date']['hour'],$this->request->data['date']['minute']);
                //$this->request->data("date");
                //$ed = $this->request->data("end_date");
                $ed = \Cake\I18n\Time::create($this->request->data['date']['year'],$this->request->data['date']['month'],
                        $this->request->data['date']['day'],$this->request->data['date']['hour'],$this->request->data['date']['minute']);
                $ln = $this->request->data("location_name");
                $des = $this->request->data("description");
                $s = $this->request->data("sport");
                
                $mi = "56eb38a4-ee50-421f-bf6e-26beb38f37ff";
                   
                $this->Workouts->addWorkouts($d, $ed, $ln, $des, $s, $mi);
            }
            $this->set("new", $new);
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
