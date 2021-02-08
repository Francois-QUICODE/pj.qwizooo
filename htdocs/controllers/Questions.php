<?php



class Questions extends Controller
{
    public function index(){

        // instanciation du model
        $this->loadModel("Question");
        // on recupere toutes les questions
        $questions = $this->Question->getAll();
        // on affiche la vue
        $this->render('index', ['questions' => $questions]);

    }

    public function lire(string $slug)
    {
        $this->loadModel("Question");
        $question = $this->Question->findBySlug($slug);
        $this->render('lire', ['question' => $question]);
    }
}