<?php
    namespace App\Controller;

    use App\Controller\AppController;
    use Cake\Filesystem\Folder;
    use Cake\Filesystem\File;
    use Cake\Mailer\Email;
    use Cake\ORM\Table;
    use Cake\I18n\Time;
    use Cake\I18n\Date;
    
    class SportsController extends AppController
    {   
        public function login()
        {
            $page = "login";
            $this->set("page", $page);
            
            $this->loadModel("Members");
            
            $new = $this->Members->newEntity();
            if ($this->request->is('post')) {
                $user = $this->Auth->identify(); // On regarde si le membre existe bien
                if ($user) {
                    $this->Auth->setUser($user); // On le connecte
                    return $this->redirect($this->Auth->redirectUrl());
                } else {
                    $this->Flash->error(__("Nom d'utilisateur ou mot de passe incorrect"));
                }
            }
            
            $this->set("new", $new);
        }

        public function logout()
        {
            $this->redirect($this->Auth->logout());
        }

        public function register()
        {
            $page = "register";
            $this->set("page", $page);
            
            $this->loadModel("Members");
            
            $new = $this->Members->newEntity();
            if($this->request->is("post"))
            {
                $email = $this->request->data("email");
                $password = $this->request->data("password");
                $confirm_password = $this->request->data("confirm_password");
                
                if($password == $confirm_password)
                {
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
                else
                {
                    $this->Flash->error(__("Mots de passe entrés différents"));
                }
                
            }
            $this->set("new", $new);
        }

        
        public function index(){
            $page = "index";
            $this->set("page", $page);
            
            $this->loadModel("Members");
            $m=$this->Members->find();
            $this->set("m",$m->toArray());
        }
        
        public function classements(){
            $page = "classements";
            $this->set("page", $page);
            
            $this->loadModel("Members");
            $this->loadModel("Workouts");
            $this->loadModel("Logs");
            
            $members = $this->Members->getAllMembers(); // on récupère tous les membres

            $badminton_rankings = $this->buildSportRankings("Badminton");
            $boxe_rankings = $this->buildSportRankings("Boxe");
            $canne_rankings = $this->buildSportRankings("Canne de combat");
            $grs_rankings = $this->buildSportRankings("GRS");
            $judo_rankings = $this->buildSportRankings("Judo");
            $taekwondo_rankings = $this->buildSportRankings("Taekwondo");
            $tennis_rankings = $this->buildSportRankings("Tennis");


            $this->set("badminton_rankings", $badminton_rankings);
            $this->set("boxe_rankings", $boxe_rankings);
            $this->set("canne_rankings", $canne_rankings);
            $this->set("grs_rankings", $grs_rankings);
            $this->set("judo_rankings", $judo_rankings);
            $this->set("taekwondo_rankings", $taekwondo_rankings);
            $this->set("tennis_rankings", $tennis_rankings);
        }
        
        public function moncompte(){
            $page = "moncompte";
            $this->set("page", $page);
            
            $this->loadModel("Members");
            
            $current_user_id = $this->Auth->user('id');
            $current_user_email = $this->Auth->user('email');
            
            $dir = new Folder(WWW_ROOT . 'img/photo_profil');            

            if($this->request->is("post"))
            {
                $extension = strtolower(pathinfo($this->request->data['avatar_file']['name'], PATHINFO_EXTENSION));

                if( !empty($this->request->data['avatar_file']['tmp_name']) && in_array($extension, array('jpg', 'jpeg', 'png')) )
                {
                    $files = $dir->find($this->Auth->user('id').'\.(?:jpg|jpeg|png)$');
                    if(!empty($files))
                    {
                        foreach($files as $file)
                        {
                            $file = new File($dir->pwd() . DS . $file);
                            $file->delete();
                            $file->close();
                        }
                    }
                    move_uploaded_file($this->request->data['avatar_file']['tmp_name'], 'img/photo_profil/' . DS . $this->Auth->user('id') . '.' . $extension);
                }
                else
                {
                    $this->Flash->error(__("Modification de l'image invalide"));
                }
            }
            $files = $dir->find($current_user_id.'\.(?:jpg|jpeg|png)$');
            if(empty($files))
            {
                $user_image_extension = "none";
            }
            else
            {
                $user_image_extension = strtolower(pathinfo($files[0], PATHINFO_EXTENSION));
            }
            
            $this->set("user_id", $current_user_id);
            $this->set("user_email", $current_user_email);
            $this->set("user_image", $files);
            $this->set("user_image_extension", $user_image_extension);
            
            $new = $this->Members->newEntity();
            $this->set('new', $new);
        }
        
        public function seance(){
            $page = "seance";
            $this->set("page", $page);
            
            $this->loadModel("Workouts");
            $this->loadModel("Logs");
            
            $currentId = $this->Auth->user('id');
            
            $workout_coming = $this->Workouts->getWorkComing($currentId);
            $this->set("workout_coming", $workout_coming);
            
            //Séances manquées
            $workout_missed = $this->Workouts->getWorkMissed($currentId);
            $this->set("workout_missed", $workout_missed);
            //pr($workout_missed);            
            
            //Pourcentage de pompes par séance
            $stat_array = array(); // tableau qui va contenir des membres et leur score
            $workout = $this->Workouts->getAllWorkouts($currentId); // on récupère tous les membres
            foreach($workout as $w) // pour chaque membre
            {              
                //$member_score = $this->Logs->CalculMemberScore($member->id); // on calcule leur score
                $pompesPourcent = $this->Logs->getPompes($w->id, $currentId);
                $pasPourcent = $this->Logs->getPas($w->id, $currentId);
                $abdosPourcent = $this->Logs->getAbdos($w->id, $currentId);
                $squatsPourcent = $this->Logs->getSquats($w->id, $currentId);
                ///On crée une nouvelle ligne contenant le membre et son score
                $new_row = array('date' => $w->date,
                                 'stat' => $pompesPourcent,
                                 'pas' => $pasPourcent,
                                 'abdos' => $abdosPourcent,
                                 'squats' => $squatsPourcent);
                    array_push($stat_array, $new_row); // on push cette ligne dans le tableau
            }
            $this->set("stat_array", $stat_array); 
        
            //¨prcentage de chaque relevé depuis l'inscription
            
            $logsTotal = $this->Logs->getLogsTotal($currentId);
            $this->set("logsTotal", $logsTotal);
            
            if ($logsTotal == 0){
                $pompesTotal = 0;
                $this->set("pompesTotal", $pompesTotal);

                $pasTotal =0;
                $this->set("pasTotal", $pasTotal);

                $abdosTotal = 0;
                $this->set("abdosTotal", $abdosTotal);

                $squatsTotal = 0;
                $this->set("squatsTotal", $squatsTotal);
            }
            else{
                $pompesTotal = ($this->Logs->getPompesTotal($currentId))/$logsTotal;
                $this->set("pompesTotal", $pompesTotal);

                $pasTotal = ($this->Logs->getPasTotal($currentId))/$logsTotal;
                $this->set("pasTotal", $pasTotal);

                $abdosTotal = ($this->Logs->getAbdosTotal($currentId))/$logsTotal;
                $this->set("abdosTotal", $abdosTotal);

                $squatsTotal = ($this->Logs->getSquatsTotal($currentId))/$logsTotal;
                $this->set("squatsTotal", $squatsTotal);
            }           
            
            $workout_now = $this->Workouts->getWorknow($currentId);
            
            $list1=[];
            foreach ($workout_now as $idw => $work) { // pour chaque membre
                $seanceLogs = $this->Logs->getLogs($work->id);
                $list1[$idw] = [
                    'workout' => $work,
                    'logs' => $seanceLogs,
                ];
            }
            
            $this->set("workNow_tab", $list1);
            
            $workDone_tab = array();
            $workout_done = $this->Workouts->getWorkDone($currentId);
            //pr($workout_done);
            $list=[];
            foreach ($workout_done as $idw => $work) { // pour chaque membre
                $seanceLogs = $this->Logs->getLogs($work->id);
                $list[$idw] = [
                    'workout' => $work,
                    'logs' => $seanceLogs,
                ];
            }
            $this->set("workDone_tab", $list);
            
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
                $mi = $this->Auth->user('id');
                   
                $this->Workouts->addWorkouts($d, $ed, $ln, $des, $s, $mi);
            }
            $form_new_log = $this->Logs->newEntity();
            $this->set("form_new_log", $form_new_log);
            $this->set("new", $new);
            
            $encoded_locations = $this->Logs->getAllSeancesLocations();
            $this->set("encoded_locations", $encoded_locations);
        }
        
        public function addLog(){        
            $this->loadModel("Logs");
        $a = 0;
        $new_log = $this->Logs->newEntity();
        if(empty($this->request->data("location_latitude"))){
            $this->Flash->error(__("Indiquer la latitude"));
            $a = 1;
        }  
        if(empty($this->request->data("location_logitude"))){
            $this->Flash->error(__("Indiquer la longitude"));
            $a = 1;
        }
        if($this->request->data("log_type") == 'label'){
            $this->Flash->error(__("Indiquer le type de relevé"));
            $a = 1;
        }
        if(empty($this->request->data("log_value"))){
            $this->Flash->error(__("Indiquer la valeur de relevé"));
            $a = 1;
        }
        if ($this->request->is("post") && $a == 0) {
                $mi = $this->Auth->user('id');
                $wi = $this->request->data("id_workout");
                $di = 0;
                $date = Time::now();
                $lat = $this->request->data("location_latitude");
                $long = $this->request->data("location_logitude");
                $type = $this->request->data("log_type");
                $value = $this->request->data("log_value");       
                $this->Logs->addLogs($mi, $wi, $di, $date, $lat, $long, $type, $value);
            }
            $this->set("new_log", $new_log);
            $this->redirect(['controller' => 'Sports', 'action' => 'seance']);        
        }
        
        public function objetsco(){
            $page = "objetsco";
            $this->set("page", $page);
            
            $this->loadModel("devices");
            $this->loadModel("logs");
            $this->loadModel("workouts");
            
            $member_id = $this->Auth->user('id');
            
            $auth_devices = $this->devices->getAuthDevices($member_id);
            $this->set("auth_devices",$auth_devices);
            
            $waiting_devices = $this->devices->getWaitingDevices($member_id);
            $this->set("waiting_devices", $waiting_devices);
            
            
            $comments = $this->workouts->getComments();
            $this->set("comments", $comments);
        }
      
        public function contact(){
            $page = "contact";
            $this->set("page", $page);
            
             if ($this->request->is('post')){
                 $email = $this->request->data('email');
                 $nom = $this->request->data('nom');
                 $content = $this->request->data('content');
                 $test = $this->request->data('exampleTextarea');
               debug($test);
                 
                /* $email = new Email('default');
                    $email->from(['antoine.seweryn@gmail.com' => 'My Site'])
                                ->to('antoine.seweryn@gmail.com')
                                ->subject('About')
                                 ->send('My message');*/
                
             }
        }
        
        public function equipe(){
            $page = "equipe";
            $this->set("page", $page);
            
        }
        
        public function mention(){
            $page = "mention";
            $this->set("page", $page);
            
        }
        
        public function tuto(){
            $page = "tuto";
            $this->set("page", $page);
        }
        
        public function competition(){
            $page = "competition";
            $this->set("page", $page);
            
            $this->loadModel("Contests");
            $this->loadModel("Workouts");
            $contests = $this->Contests->getAllContests();
            $this->set("contests", $contests);

            $new = $this->Contests->newEntity();
            
            if ($this->request->is('post')){
                $name = $this->request->data("name"); // compet
                $type = $this->request->data("type");
                $description = $this->request->data("description");
                   
                $this->Contests->addContest($name, $type, $description);

                $this->redirect(['controller' => 'Sports', 'action' => 'competition']);
            }

            $this->set("new", $new);
            
        }

        public function singlecompetition($contest_id){
            $page = "singlecompetition";
            $this->set("page", $page);
            
            $this->loadModel("Workouts");
            $this->loadModel("Members");
            $this->loadModel("Logs");
            $this->loadModel("Contests");


            $this_contest = $this->Contests->getContest($contest_id);
            $this->set("this_contest", $this_contest);

            $matchs_array = $this->Workouts->getAllMatchsFromContest($contest_id);
            $final_matchs_array = array();
            foreach($matchs_array as $match)
            {
                $second_match = $this->Workouts->findSecondMemberOfMatch($match->id, $match->date, $match->end_date, $match->location_name, $contest_id);

                if(count($second_match) > 0)
                {
                    $new_row = array(
                                'workout_id1' => $match->id,
                                'member_id1' => $match->member_id,
                                'member_email1' => $this->Members->getMemberEmail($match->member_id)->email,
                                'workout_id2' => $second_match->id,
                                'member_id2' => $second_match->member_id,
                                'member_email2' => $this->Members->getMemberEmail($second_match->member_id)->email,
                                'date' => $match->date,
                                'end_date' => $match->end_date,
                                'location_name' => $match->location_name,
                                'description' => $match->description,
                                'sport' => $match->sport
                                );
                    array_push($final_matchs_array, $new_row); // on push cette ligne dans le tableau
                }
            }

            $this->set("matchs", $final_matchs_array);

            /* --------------------------- CLASSEMENT DES JOUEURS DE LA COMPÉTITION ------------------------*/

            /// On récupère tous les logs "Résultats" de la compétition
            $result_logs_array = array(); // Tableau contenant tous les logs Résultats de la compétition
            foreach($matchs_array as $match)
            {
                $log_row = $this->Logs->getLogResultOfMatch($match->id);
                array_push($result_logs_array, $log_row);
            }

            $contest_members_array = $this->Workouts->getContestMembers($contest_id); // Tableau contenant les ID uniquement des membres participants

            $rankings_list=array(); // Tableau contenant le classement

            /// On initialise la liste
            foreach($contest_members_array as $member)
            {
                $rankings_list[$member->member_id] = [
                    'member_id' => $member->member_id,
                    'member_email' => $this->Members->getMemberEmail($member->member_id)->email,
                    'member_score' => 0
                ];
            }

            foreach($contest_members_array as $member)
            {
                foreach($result_logs_array as $log_result)
                {
                    if($rankings_list[$member->member_id]['member_id'] == $log_result->member_id)
                    {
                        $rankings_list[$member->member_id] = [
                            'member_id' => $member->member_id,
                            'member_email' => $this->Members->getMemberEmail($member->member_id)->email,
                            'member_score' => $rankings_list[$member->member_id]['member_score'] + $log_result->log_value
                        ];
                    }
                }
            }

            usort($rankings_list, function($a, $b) {
                return $a['member_score'] - $b['member_score'];
            });
            $rankings_list = array_reverse($rankings_list);

            $this->set("rankings_list", $rankings_list);

            /* ----- RÉCUPÉRATION DES EMAILS POUR LES AFFICHER DANS LA LISTE DÉROULANTE DU FORMULAIRE ---- */
            $members = $this->Members->getAllMembers();
            $emails_array = array(); 
            foreach($members as $member) 
            {
                    $emails_array[$member->email] = $member->email; 
            }
            $this->set("emails_array", $emails_array);

            /* -------------- -------------------------- FORMULAIRE -----------------------------------------*/
            $new = $this->Workouts->newEntity();            
            if ($this->request->is('post')){
                $member1_email = $this->request->data("m1_email");
                $member2_email = $this->request->data("m2_email");
                if($member1_email == $member2_email)
                {
                    $this->Flash->error(__("Veuillez choisir deux participants distincts"));
                    $this->redirect(['controller' => 'Sports', 'action' => 'singlecompetition/'.$contest_id]);
                }
                else
                {
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
                    $des_workout = "- / -";
                    if($d > $ed)
                    {
                        $this->Flash->error(__("Problème de date !"));
                        $this->redirect(['controller' => 'Sports', 'action' => 'singlecompetition/'.$contest_id]);
                    }
                    else
                    {
                        $member1 = $this->Members->getMemberByEmail($member1_email);
                        $member2 = $this->Members->getMemberByEmail($member2_email);

                        $m1_workout = $this->Workouts->addMatch($d, $ed, $ln, $des_workout, $this_contest->type, $member1->id, $contest_id);
                        $m2_workout = $this->Workouts->addMatch($d, $ed, $ln, $des_workout, $this_contest->type, $member2->id, $contest_id);

                        $this->Logs->addLogResultat($member1->id, $m1_workout->id, 0, $d, 0, 0, "Résultat", 0);
                        $this->Logs->addLogResultat($member2->id, $m2_workout->id, 0, $d, 0, 0, "Résultat", 0);
                        $this->redirect(['controller' => 'Sports', 'action' => 'singlecompetition/'.$contest_id]);
                    }
                }
            }
            $this->set("new", $new);

        }

        public function endMatch($contest_id, $member1_id, $member2_id, $member1_workout, $member2_workout, $member1_email, $member2_email)
        {
            $this->loadModel("Logs");
            $this->loadModel("Workouts");
            
            $member1_score = $this->Logs->calculateScoreOfMatch($member1_id, $member1_workout)->score;
            $member2_score = $this->Logs->calculateScoreOfMatch($member2_id, $member2_workout)->score;
            $member1_score = $member1_score + 0;
            $member2_score = $member2_score + 0;

            if($member1_score > $member2_score)
            {
                $member1_log_row = $this->Logs->getLogResultOfMatch($member1_workout);
                $member2_log_row = $this->Logs->getLogResultOfMatch($member2_workout);
                $this->Logs->setLogResultOfMatch($member1_log_row->id, 3);
                $this->Logs->setLogResultOfMatch($member2_log_row->id, 1);
            }
            elseif($member2_score > $member1_score)
            {
                $member1_log_row = $this->Logs->getLogResultOfMatch($member1_workout);
                $member2_log_row = $this->Logs->getLogResultOfMatch($member2_workout);
                $this->Logs->setLogResultOfMatch($member1_log_row->id, 1);
                $this->Logs->setLogResultOfMatch($member2_log_row->id, 3);
            }
            elseif(($member1_score == $member2_score) && ($member1_score > 0))
            {
                $member1_log_row = $this->Logs->getLogResultOfMatch($member1_workout);
                $member2_log_row = $this->Logs->getLogResultOfMatch($member2_workout);
                $this->Logs->setLogResultOfMatch($member1_log_row->id, 2);
                $this->Logs->setLogResultOfMatch($member2_log_row->id, 2);
            }
            else
            {
                $member1_log_row = $this->Logs->getLogResultOfMatch($member1_workout);
                $member2_log_row = $this->Logs->getLogResultOfMatch($member2_workout);
                $this->Logs->setLogResultOfMatch($member1_log_row->id, 0);
                $this->Logs->setLogResultOfMatch($member2_log_row->id, 0);
            }
            
            $this->Workouts->setMatchDescriptionWithScores($member1_workout, $member1_score, $member2_score, $member1_email, $member2_email);
            $this->Workouts->setMatchDescriptionWithScores($member2_workout, $member1_score, $member2_score, $member1_email, $member2_email);

            $this->Workouts->setEndDateOfMatch($member1_workout);
            $this->Workouts->setEndDateOfMatch($member2_workout);

            $this->redirect(['controller' => 'Sports', 'action' => 'singlecompetition/'.$contest_id]);
            
        }
        
        public function deleteOC($device) {
            $this->loadModel("Devices");
                        
            if ($this->Devices->deleteDevice($device)) 
            {
                $this->Flash->success(__('Le device avec id: {0} a été supprimé.', h($device)));
                return $this->redirect(['controller' => 'Sports', 'action' => 'objetsco']);
            }
            else
            {
                $this->Flash->error(__("Le device n'a pas pu être supprimé"));
                return $this->redirect(['controller' => 'Sports', 'action' => 'objetsco']);
            }
        }
        
        public function validateOC($device) {
            $this->loadModel("Devices");
            
            if($this->Devices->validateDevice($device))
            {
                $this->Flash->success(__('Le device avec id: {0} a été apparié.', h($device)));
                return $this->redirect(['controller' => 'Sports', 'action' => 'objetsco']);
            }
            else
            {
                $this->Flash->error(__("Le device n'a pas pu être validé"));
                return $this->redirect(['controller' => 'Sports', 'action' => 'objetsco']);
            }
        }
        
        public function deleteProfilePicture() {
            $dir = new Folder(WWW_ROOT . 'img/photo_profil');  
            $files = $dir->find($this->Auth->user('id').'\.(?:jpg|jpeg|png)$');
            if(!empty($files))
            {
                foreach($files as $file)
                {
                    $file = new File($dir->pwd() . DS . $file);
                    $file->delete();
                    $file->close();
                }
            }
            return $this->redirect(['controller' => 'Sports', 'action' => 'moncompte']);
        }
        
        public function changepassword(){

            $this->loadModel("Members");

            if ($this->request->is('post')){
                $new_pw = $this->request->data("new_pw");
                $confirm_new_pw = $this->request->data("confirm_new_pw");

                if($new_pw == $confirm_new_pw)
                {
                    $member_id = $this->Auth->user('id');

                    $this->Members->updateMemberPassword($member_id, $new_pw);
                    $this->Flash->success(__('Mot de passe modifié avec succès'));
                    $this->redirect(['controller' => 'Sports', 'action' => 'moncompte']);
                }
                else
                {
                    $this->Flash->error(__("Erreur dans la confirmation du mot de passe ! "));
                    $this->redirect(['controller' => 'Sports', 'action' => 'moncompte']);
                }
            }
        }
        
        public function recuppassword(){

            $this->loadModel("Members");

            if ($this->request->is('post')){
                $member_email = $this->request->data("member_email");
                $new_password = $this->request->data("new_password");
                $confirm_new_password = $this->request->data("confirm_new_password");

                if($new_password == $confirm_new_password)
                {
                    $member = $this->Members->findByEmail($member_email)->toArray();

                    if(count($member) > 0)
                    {
                        $this->Members->updateMemberPassword($member[0]->id, $new_password);
                        $this->Flash->success(__('Mot de passe modifié avec succès'));
                        $this->redirect(['controller' => 'Sports', 'action' => 'login']);
                    }
                    else
                    {
                        $this->Flash->error(__("Nous ne vous avons pas trouvé ! "));
                        $this->redirect(['controller' => 'Sports', 'action' => 'login']);
                    }
                }
                else
                {
                    $this->Flash->error(__("Erreur dans la confirmation du mot de passe ! "));
                    $this->redirect(['controller' => 'Sports', 'action' => 'login']);
                }
            }
        }
        
        public function buildSportRankings($sport)
        {
            $this->loadModel("Members");
            $this->loadModel("Workouts");
            $this->loadModel("Logs");

            $members = $this->Members->getAllMembers(); // on récupère tous les membres

            $sport_rankings = array();

            foreach($members as $member)
            {
                $member_sport_matchs = $this->Workouts->getAllMemberMatchsOfSport($member->id, $sport);
                
                
                //if(count($member_sport_matchs) > 0)
                //{
                    $nb_victories = 0;
                    $nb_equalities = 0;
                    $nb_loses = 0;
                    foreach($member_sport_matchs as $sport_match) // on récupère tous les matchs de Badminton du membre
                    {
                        
                        if($this->Logs->getLogResultOfMatch($sport_match->id)->log_value == 3)
                        {
                            $nb_victories = $nb_victories + 1;
                        }
                        elseif($this->Logs->getLogResultOfMatch($sport_match->id)->log_value == 2)
                        {
                            $nb_equalities = $nb_equalities + 1;
                        }
                        elseif($this->Logs->getLogResultOfMatch($sport_match->id)->log_value == 1)
                        {
                            $nb_loses = $nb_loses + 1; 
                        }
                    }
                    $member_sport_row = array(
                                                    'member' => $member->email,
                                                    'nb_victories' => $nb_victories,
                                                    'nb_equalities' => $nb_equalities,
                                                    'nb_loses' => $nb_loses,
                                                    'score' => $nb_victories*3 + $nb_equalities*2 + $nb_loses*1
                                                );
                    array_push($sport_rankings, $member_sport_row);
                //}
                
            }

            usort($sport_rankings, function($a, $b) {
                return $a['score'] - $b['score'];
            });
            $sport_rankings = array_reverse($sport_rankings);

            return $sport_rankings;
        }
        
        
    }
