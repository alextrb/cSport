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
            $this->loadModel("Members");
            $this->loadModel("Logs");
            
            $classement_array = array(); // tableau qui va contenir des membres et leur score
            $members = $this->Members->getAllMembers(); // on récupère tous les membres
            foreach($members as $member) // pour chaque membre
            {
                $member_score = $this->Logs->CalculMemberScore($member->id); // on calcule leur score
                ///On crée une nouvelle ligne contenant le membre et son score
                $new_row = array(
                                'member' => $member->email,
                                'score' => $member_score
                                );
                    array_push($classement_array, $new_row); // on push cette ligne dans le tableau
            }
            $this->set("classement_array", $classement_array); // on partage ce tableau avec la vue
        }
        
        public function connexion(){
            
        }
        
        public function moncompte(){
            
        }
        
        public function seance(){
            $this->loadModel("Workouts");
            
            $new = $this->Workouts->newEntity();
            
            if($this->request->is("post")){
                $d = \Cake\I18n\Time::create(
                        $this->request->data['date']['year'],
                        $this->request->data['date']['month'],
                        $this->request->data['date']['day'],
                        $this->request->data['date']['hour'],
                        $this->request->data['date']['minute']);
                $ed = \Cake\I18n\Time::create(
                        $this->request->data['date']['year'],
                        $this->request->data['date']['month'],
                        $this->request->data['date']['day'],
                        $this->request->data['date']['hour'],
                        $this->request->data['date']['minute']);
                $ln = $this->request->data("location_name");
                $des = $this->request->data("description");
                $s = $this->request->data("sport");
                $mi = "56eb38a4-ee50-421f-bf6e-26beb38f37ff";
                   
                $this->Workouts->addWorkouts($d, $ed, $ln, $des, $s, $mi);
            }
            $this->set("new", $new);
        }
        
        public function objetsco(){
            $this->loadModel("devices");
            
            $auth_devices = $this->devices->getAuthDevices();
            $this->set("auth_devices",$auth_devices);
            
            $waiting_devices = $this->devices->getWaitingDevices();
            $this->set("waiting_devices", $waiting_devices);
        }
      
        public function contact(){
            
        }
        
        public function equipe(){
            
        }
        
        public function mention(){
            
        }
        
        public function tuto(){
            
        }
        
        public function deleteOC($device) {
            $this->loadModel("Devices");
                        
            if ($this->Devices->deleteDevice($device)) 
            {
                $this->Flash->success(__('Le device avec id: {0} a été supprimé.', h($device)));
                return $this->redirect(['controller' => 'Sports', 'action' => 'objetsco']);
            }
        }
        
        public function validateOC($device) {
            $this->loadModel("Devices");
            
            if($this->Devices->validateDevice($device))
            {
                $this->Flash->success(__('Le device avec id: {0} a été appareillé.', h($device)));
                return $this->redirect(['controller' => 'Sports', 'action' => 'objetsco']);
            }
        }
        
        public function apiRegisterDevice($id_member, $id_device, $description)
        {
            $this->loadModel("Devices");
            $new = $this->Devices->newEntity();
            $new->member_id = $id_member;
            $new->serial = $id_device;
            $new->description = $description;
            $new->trusted = 0;
            $this->Devices->save($new);

            return $this->redirect(['controller' => 'Sports', 'action' => 'index']);
        }
        
        public function apiWorkoutParameters($id_device, $id_workout)
        {
            $this->loadModel("Workouts");
            $this->viewBuilder()->className('Json');

            $workouts_parameters = $this->Workouts->findById($id_workout);
            $this->set(array(
                'workouts_parameters' => $workouts_parameters,
                '_serialize' => array('workouts_parameters')
            ));                      
        }
    }
