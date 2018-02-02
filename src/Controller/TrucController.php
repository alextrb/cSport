<?php
    namespace App\Controller;

    use App\Controller\AppController;

    class TrucController extends AppController
    {
        public function machin()
            {
                $this->set("monNom", [1,2,3,4]);
            }
    }
