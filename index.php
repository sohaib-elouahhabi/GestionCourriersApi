<?php
$chemin = substr($_SERVER['SCRIPT_FILENAME'], 0, -9);
define("ROOT",$chemin);

include_once ROOT.'Models/Model.php';
include_once ROOT.'Controllers/Controller.php';
// include_once ROOT.'Views/Public/Header.php';

$url=$_GET['url'];
// echo"$url";
$id=0;
$info_url=explode("/",$url);

if($info_url[0]!='')
    
    if(file_exists(ROOT.'Controllers/'.$info_url[0].".php"))
    {
        
        include_once ROOT.'Controllers/'.$info_url[0].".php";
        $Controllers=new $info_url[0]();
        $action="index";
        if(isset($info_url[1]))
        $action=$info_url[1];
        
        if(method_exists($Controllers,$action))
        {
        $request=null;
                if(isset($info_url[2]))
                $id=$info_url[2];
                if(!empty($_POST))
                    {
                        $request=new stdClass();
                        foreach($_POST as $key=>$value)
                            $request->$key=$value;
                    }
            if($request!=null)
                if($id!=0)
                        $Controllers->$action($id,$request);
                    else
                        $Controllers->$action($request);
                    else
                        if($id==0)
                            $Controllers->$action();
                    else 
                            $Controllers->$action($id);
        }
            else
                echo"url introuvable !";
    }
    else
                echo"URL introuvable !!!";
    else
    {    ?>
<center>
        <h1>Menu</h1>
        <h2> <a href="Messages"> Liste des messages</a></h2>
        <h2> <a href="Utilisateurs">  Liste des utilisateurs</a></h2>
</center>    

<?php }
// include_once ROOT.'Views/Public/Footer.php';
