<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;

use App\Cv;
use App\formations;
use App\portfolio;
use App\projets;
use App\Experience;
use App\competences;

use Auth;

use App\Http\Requests\cvRequest;

class CvController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //lister les cvs
    public function index()
    {
        //si l`utilisateur est un admin afficher toute les machins
        if (Auth::user()->is_admin) {
            $listcv = Cv::all();
        } else {
            $listcv = Auth::user()->cvs;
        }
       
        return view('cv.index', ['cvs' => $listcv]);
    }
    
    //Affiche le formulaire de creation de cv
    public function create()
    {
        return view('cv.create');
    }
     
    //Enregister un cv
    public function store(cvRequest $request)
    {
        $cv = new Cv();

        $cv->titre = $request->input('titre');
        $cv->presentation = $request->input('presentation');
        $cv->user_id = Auth::user()->id;
       
        if ($request->hasFile('photo')) {
            $cv->photo = $request->photo->store('image');
        }

        $cv->save();
       
        session()->flash('success', 'Le cv à été bien enregistré !!');

        return redirect('cvs');
    }
    
    //permet de récupérer un cv puis de le mettre dans un le formulaire
    public function edit($id)
    {
        $cv = Cv::find($id);

        // le nom de function 'update' danc class CvPolicy
        $this->authorize('update', $cv);

        return view('cv.edit', ['cv' => $cv]);
    }
    
    //permet de modifier un cv
    public function update(cvRequest $request, $id)
    {
        $cv = Cv::find($id);

        $this->authorize('update', $cv);

        $cv->titre = $request->input('titre');
        $cv->presentation = $request->input('presentation');

        if ($request->hasFile('photo')) {
            $cv->photo = $request->photo->store('image');
        }
        
        $cv->save();

        return redirect('cvs');
    }


    public function show($id)
    {
        return view('cv.show', ['id' => $id]);
    }
    
    //permet de supprimer un cv
    public function destroy(Request $request, $id)
    {
        $cv = Cv::find($id);

        $this->authorize('delete', $cv);

        $cv->delete();

        return redirect('cvs');
    }


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


    public function cvExperienceShow(Request $request, $id)
    {
        $cv = Cv::find($id);

        return view('experience.show', ['cv' => $cv]);
    }



    public function getData($id)
    {
        $cv = Cv::find($id);
        $experiences = $cv->experiences()->orderBy('debut', 'desc')->get();
        $formations = $cv->formations()->orderBy('updated_at', 'desc')->get();
        $competences = $cv->competences()->orderBy('updated_at', 'desc')->get();
        $projets = $cv->projets()->orderBy('updated_at', 'desc')->get();
        
        return Response()->json([
            'experiences' => $experiences,
            'formations' => $formations,
            'competences' => $competences,
            'projets' => $projets,
             ]);
    }

    // Experiences experiences


    public function addExperiences(Request $request)
    {
        $experience = new Experience();
        $experience->titre = $request->titre;
        $experience->body = $request->body;
        $experience->cv_id = $request->cv_id;
        $experience->debut = $request->debut;
        $experience->fin = $request->fin;
        $experience->save();
        return Response()->json(['etat' => true, 'id' => $experience->id]);
    }

    public function updateExperiences(Request $request)
    {
        $experience = Experience::find($request->id);
        $experience->titre = $request->titre;
        $experience->body = $request->body;
        $experience->cv_id = $request->cv_id;
        $experience->debut = $request->debut;
        $experience->fin = $request->fin;
        $experience->save();
        return Response()->json(['etat' => true]);
    }


    public function deleteExperiences($id)
    {
        $experience = Experience::find($id);
        $experience->delete();
        return Response()->json(['etat' => true]);
    }

    // Ausbildung ausbildung

    public function addAusbildung(Request $request)
    {
        $ausbildung = new formations();
        $ausbildung->titre = $request->titre;
        $ausbildung->description = $request->description;
        $ausbildung->cv_id = $request->cv_id;
        $ausbildung->lien = $request->lien;
       
        $ausbildung->image = $request->image;
      
        $ausbildung->save();
        return Response()->json(['etat' => true, 'id' => $ausbildung->id]);
    }


    public function updateAusbildung(Request $request)
    {
        $experience = formations::find($request->id);
        $experience->titre = $request->titre;
        $experience->description = $request->description;
        $experience->cv_id = $request->cv_id;
        $experience->lien = $request->lien;
        $experience->image = $request->image;
        $experience->save();
        
        return Response()->json(['etat' => true]);
    }


    public function deleteAusbildung($id)
    {
        $experience = formations::find($id);
        $experience->delete();
        return Response()->json(['etat' => true]);
    }


    //Project project

    public function addProject(Request $request)
    {
        $experience = new project();
        $experience->titre = $request->titre;
        $experience->body = $request->body;
        $experience->cv_id = $request->cv_id;
        $experience->lien = $request->lien;
        $experience->image = $request->image;
        $experience->save();
        return Response()->json(['etat' => true, 'id' => $experience->id]);
    }

    public function updateProject(Request $request)
    {
        $experience = project::find($request->id);
        $experience->titre = $request->titre;
        $experience->body = $request->body;
        $experience->cv_id = $request->cv_id;
        $experience->lien = $request->lien;
        $experience->image = $request->image;
        $experience->save();
        return Response()->json(['etat' => true]);
    }

    public function deleteProject($id)
    {
        $experience = project::find($id);
        $experience->delete();
        return Response()->json(['etat' => true]);
    }



    //Portfolio portfolio

    public function addPortfolio(Request $request)
    {
        $experience = new portfolio();
        $experience->titre = $request->titre;
        $experience->body = $request->body;
        $experience->cv_id = $request->cv_id;
        $experience->lien = $request->lien;
        $experience->image = $request->image;
        $experience->save();
        return Response()->json(['etat' => true, 'id' => $experience->id]);
    }

    public function updatePortfolio(Request $request)
    {
        $experience = portfolio::find($request->id);
        $experience->titre = $request->titre;
        $experience->body = $request->body;
        $experience->cv_id = $request->cv_id;
        $experience->lien = $request->lien;
        $experience->image = $request->image;
        $experience->save();
        return Response()->json(['etat' => true]);
    }


    public function deletePortfolio($id)
    {
        $experience = portfolio::find($id);
        $experience->delete();
        return Response()->json(['etat' => true]);
    }


    // Kompetenenz kompetenenz
    public function addKompetenenz(Request $request)
    {
        $experience = new competences();
        $experience->titre = $request->titre;
        $experience->body = $request->body;
        $experience->cv_id = $request->cv_id;
        $experience->lien = $request->lien;
        $experience->image = $request->image;
        $experience->save();
        return Response()->json(['etat' => true, 'id' => $experience->id]);
    }


    public function updateKompetenenz(Request $request)
    {
        $experience = competences::find($request->id);
        $experience->titre = $request->titre;
        $experience->body = $request->body;
        $experience->cv_id = $request->cv_id;
        $experience->lien = $request->lien;
        $experience->image = $request->image;
        $experience->save();
        return Response()->json(['etat' => true]);
    }


    public function deleteKompetenenz($id)
    {
        $experience = competences::find($id);
        $experience->delete();
        return Response()->json(['etat' => true]);
    }
}
