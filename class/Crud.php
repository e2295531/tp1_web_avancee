<?php

class Crud extends PDO{

    public function __construct()
    {
        parent::__construct('mysql:host=localhost;dbname=gestion_projet;port=3306;charset=utf8', 'root', '');
      
    }

    public function select($table, $field='siteId',$order='ASC'){
        $sql="select *from $table order by $field $order";
        $stmt=$this->query($sql);
        return $stmt->fetchAll();
    }

    public function selectId($table,$value,$field='siteId',$url='site-index.php')
    {
        $sql="select * from $table where $field=:$field ";
        $stmt=$this->prepare($sql);
        $stmt->bindValue(":$field",$value);
        $stmt->execute();
        $count= $stmt->rowCount();

        if($count==1){
            return $stmt->fetch();
        }else
        {
            header("location:$url");
        }


    }
    public function insert($table,$data){
        $nomChamp=implode(", ",array_keys($data));
        $valeurChamp=":".implode(", :",array_keys($data));

        $sql="insert into $table ($nomChamp) values($valeurChamp)";

        $stmt=$this->prepare($sql);

        foreach($data as $key=>$value){
            $stmt->bindValue(":$key",$value);   
        }
        if(!$stmt->execute()){
            print_r($stmt->errorInfo()) ;
        }else{
            // return $this->lastInsertId();
            header('Location: site-index.php');
        }

    }   
    public function update($table,$data,$champId='siteId'){
       
    $champRequete=null;
   
    foreach($data as $key=>$value){
       
        $champRequete .="$key=:$key, ";
    }

    $champRequete=rtrim($champRequete,", ");

        $sql="update  $table  set $champRequete where $champId=:$champId ";

      

       $stmt=$this->prepare($sql);

        foreach($data as $key=>$value){
            $stmt->bindValue(":$key",$value);   
        }
        if(!$stmt->execute()){
            print_r($stmt->errorInfo()) ;
        }else{
           header('Location: site-index.php');
        }
    }   
    public function delete($table,$id,$champId='siteId', $url='site-index.php'){
       
       

        $sql="delete  from $table   where $champId=:$champId ";

      

        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$champId",$id);
        if($stmt->execute()){
            header('Location:'.$url);
        }else{
            print_r($stmt->errorInfo());
        }
    }   
}