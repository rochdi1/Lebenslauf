<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cv;
use App\Experience;

class ExperienceController extends Controller
{
     /*   public function create(Request $request, $id) {
            
        
        }
    */

      //lister les Experience
      public function index()
      {
          //si l`utilisateur est un admin afficher toute les machins
        
              $listExperience = Experience::all();

         
          return view('cv.show', ['listExperience' => $listExperience]);
      }
      
      //Affiche le formulaire de creation de Experience
      public function create()
      {
          return view('experience.create');
      }
       
      //Enregister une Experience
      public function store(cvRequest $request)
      {
          $exp = new Experience();
  
          $exp->titre = $request->input('titre');
          $exp->datedebut = $request->input('datedebut');
          $exp->datefin = $request->input('datefin');
          $exp->cv_id = Auth::user()->id;
        
  
          $exp->save();
         
  
          return redirect('cvs');
      }
      
      //permet de récupérer une Experience puis de le mettre dans un le formulaire
      public function edit($id)
      {
          $exp = Experience::find($id);
  
          return view('experience.edit', ['exp' => $exp]);
      }
      
      //permet de modifier un cv
      public function update(cvRequest $request, $id)
      {
          $exp = Experience::find($id);
        
  
          $exp->titre = $request->input('titre');
          $exp->datedebut = $request->input('datedebut');
          $exp->datefin = $request->input('datefin');
          
          $cv->save();
  
          return redirect('cvs');
      }
  
  
  
  
  /*
      public function cvExperienceCreate(Request $request, $id)
      {
          $cv = Cv::find($id);
          
          $experiences = [
             ["titre" => "Experience en laravel", "debut" => "2018-10-10", "fin" => "2018-12-10"],
             ["titre" => "Experience en symfony", "debut" => "2018-10-10", "fin" => "2018-12-10"],
             ["titre" => "Experience en Sécurité", "debut" => "2018-10-10", "fin" => "2018-12-10"],
             ["titre" => "Experience en Firebase", "debut" => "2018-10-10", "fin" => "2018-12-10"],
          ];
  
  
          foreach ($experiences as $exp) {
              $experience = new Experience($exp);
        
  
              $cv->experiences()->save($experience);
          }
      }

*/


}
