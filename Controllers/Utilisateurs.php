<?php
class Utilisateurs extends Controller
{

    public function __Construct()
    {
        parent::__Construct('user_m');
    }
    public function index()
    {
        $user=user_m::All();
    //envoie l'en-tête http json au navigateur pour l'informer du type de données qu'il attend.
        header('Content-Type:application/json');
        $result=["data"=>$user];
    //json_encode — Renvoie la représentation JSON d'une valeur
        echo json_encode($result,JSON_PRETTY_PRINT);
        return json_encode($result);
    }
    public function show($id)
    {
        $user=user_m::find($id);
        header('Content-Type:application/json');
        $result=["data"=>$user];
        echo json_encode($result);
        return json_encode($result);
    }
    public function destroy($id)
    {
        $P=user_m::find($id);
        $P->delete();
        header('Content-Type:application/json');
        $result=["data"=>$P];
        echo json_encode($result);
        return json_encode($result);
    }
    
    public function store($request)
    {
        $P=new user_m();
        $P->nom=$request->nom;
        $P->prenom=$request->prenom;
        $P->Adresse=$request->Adresse;
        $P->mot_de_pass=$request->mot_de_pass;
        $P->numero_tel=$request->numero_tel;
        $P->save();
        header('Content-Type:application/json');
        $result=["data"=>$P];
        echo json_encode($result);
        return json_encode($result);
    }
    public function edit($id)
    {
        // parent::view("form",user_m::find($id));
    }
    public function update($id,$request)
    {
        $P=user_m::find($id);
        $P->nom=$request->nom;
        $P->prenom=$request->prenom;
        $P->Adresse=$request->Adresse;
        $P->mot_de_pass=$request->mot_de_pass;
        $P->numero_tel=$request->numero_tel;
        $P->save();
        header('Content-Type:application/json');
        $result=["data"=>$P];
        echo json_encode($result);
        return json_encode($result);
    }
    public function create()
    {
        
    }   
}
?>