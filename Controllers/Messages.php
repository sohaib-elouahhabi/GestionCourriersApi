<?php
class Messages extends Controller
{

    public function __Construct()
    {
        parent::__Construct('message');
    }

    //charger le model  et afficher  les donnes dans le views
    public function index()
    {
        $message=message::All();
    //envoie l'en-tête http json au navigateur pour l'informer du type de données qu'il attend.
        header('Content-Type:application/json');
        $result=["data"=>$message];
    //json_encode — Renvoie la représentation JSON d'une valeur
        echo json_encode($result,JSON_PRETTY_PRINT);
        return json_encode($result);
    }
    
        //charger le model  et afficher  les donnes dans le views en utilisant la methode find que recuperer une seul enregistrement
    public function show($id)
    {
        $message=message::find($id);
        header('Content-Type:application/json');
        $result=["data"=>$message];
        echo json_encode($result);
        return json_encode($result);
    }

    public function destroy($id)
    {
        $P=message::find($id);
        $P->delete();
        header('Content-Type:application/json');
        $result=["data"=>$P];
        echo json_encode($result);
        return json_encode($result);
    }

    //ajouter un enregistrement
    public function store($request)
    {
        $P=new message();
        $P->Adresse_exp=$request->Adresse_exp;
        $P->Sujet=$request->Sujet;
        $P->Date_envoi=$request->Date_envoi;
        $P->Contenu=$request->Contenu;
        $P->Etat=$request->Etat;
        $P->save();
        header('Content-Type:application/json');
        $result=["data"=>$P];
        echo json_encode($result);
        return json_encode($result);
    }

    //modifier un enregistrement en utilisant 
    public function edit($id)
    {
        // parent::view("form",message::find($id));
    }

    public function update($id,$request)
    {
        $P=message::find($id);
        $P->Adresse_exp=$request->Adresse_exp;
        $P->Sujet=$request->Sujet;
        $P->Date_envoi=$request->Date_envoi;
        $P->Contenu=$request->Contenu;
        $P->Etat=$request->Etat;
        $P->save();
        header('Content-Type:application/json');
        $result=["data"=>$P];
        echo json_encode($result);
        return json_encode($result);
    }
    //redirection ou formulaire de l'ajoute
    public function create()
    {
        
    }   
}
?>