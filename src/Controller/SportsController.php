<?php
    namespace App\Controller;

    use App\Controller\AppController;
    
    class SportsController extends AppController
    {   
        public function login()
        {
            $this->loadModel("Members");
            if ($this->request->is('post')) {
                $user = $this->Auth->identify(); // On regarde si le membre existe bien
                if ($user) {
                    $this->Auth->setUser($user); // On le connecte
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__("Nom d'utilisateur ou mot de passe incorrect"));
                }
            }
        }

        public function logout()
        {
            $this->redirect($this->Auth->logout());
        }

        public function register()
        {
            $this->loadModel("Members");
            $new = $this->Members->newEntity();
            if($this->request->is("post"))
            {
                $email = $this->request->data("email");
                $password = $this->request->data("password");

                $result = $this->Members->registerMember($email, $password);

                if($result) // On vérifie si un utilisateur avec le même email n'existe pas déjà
                {
                    $authUser = $this->Members->get($result->id)->toArray();
                    $this->Auth->setUser($authUser); // On connecte l'utilisateur qui vient de s'inscrire
                     $this->redirect(['controller' => 'Sports', 'action' => 'index']);
                }
                else
                {
                    $this->Flash->error(__("Email déjà utilisé"));
                }
            }
            $this->set("new", $new);
        }

        
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
        
        public function moncompte(){
            $this->set("user_id", $this->Auth->user('id'));
            $this->set("user_email", $this->Auth->user('email'));
        }
        
        public function seance(){
            $this->loadModel("Workouts");
            
            $workout_coming = $this->Workouts->getWorkComing();
            $this->set("workout_coming", $workout_coming);
            
            $workout_now = $this->Workouts->getWorknow();
            $this->set("workout_now", $workout_now);
            
            $workout_done = $this->Workouts->getWorkDone();
            $this->set("workout_done", $workout_done);
            
            $new = $this->Workouts->newEntity();
            
            if($this->request->is("post")){
                $d = \Cake\I18n\Time::create(
                        $this->request->data['date']['year'],
                        $this->request->data['date']['month'],
                        $this->request->data['date']['day'],
                        $this->request->data['date']['hour'],
                        $this->request->data['date']['minute']);
                $ed = \Cake\I18n\Time::create(
                        $this->request->data['end_date']['year'],
                        $this->request->data['end_date']['month'],
                        $this->request->data['end_date']['day'],
                        $this->request->data['end_date']['hour'],
                        $this->request->data['end_date']['minute']);
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
            $this->loadModel("logs");
            $this->loadModel("workouts");
            
            $auth_devices = $this->devices->getAuthDevices();
            $this->set("auth_devices",$auth_devices);
            
            $waiting_devices = $this->devices->getWaitingDevices();
            $this->set("waiting_devices", $waiting_devices);
            
            $encoded_locations = $this->logs->getAllSeancesLocations();
            $this->set("encoded_locations", $encoded_locations);
            
            $comments = $this->workouts->getComments();
            $this->set("comments", $comments);
        }
      
        public function contact(){
             if ($this->request->is('post')){
              
       
             }
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
            $this->loadModel("Devices");
            $this->viewBuilder()->className('Json');
            
            if($this->Devices->checkAuthDevice($id_device)){
                $workouts_parameters = $this->Workouts->findById($id_workout);
                $this->set(array(
                    'workouts_parameters' => $workouts_parameters,
                    '_serialize' => array('workouts_parameters')
                ));   
            }
            else{
                $this->Flash->error(__("Le device avec le serial : {0} ne possède pas les authorisations nécéssaires. Vous avez été redirigé vers la page d accueil", h($id_device)));
                return $this->redirect(['controller' => 'Sports', 'action' => 'index']);
            }                 
        }
    }
