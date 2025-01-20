<?php

include_once "bd.inc.php";

function getRomansById($idR) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from romans where idR=:idR");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getRomansByIdP($idR) {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from photo where idP=:idP");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);
        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function addPhoto($idR, $nomR, $descriptionR, $imageR) {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("INSERT INTO romans (idR, nomR, descriptionR, imageR)
        VALUES 
        (1,'我有一个修仙世界', '陈莫白，仙门高三学子，正在努力复习准备考取大道院，本来他这辈子最大的梦想也就是筑基成功，直到他能穿越到另外一个修仙世界，然后，梦想就变了..........', 'livre1.jpg'),
        (2,'赤心巡天', '上古时代，妖族绝迹。近古时代，龙族消失。神道大昌的时代已经如烟，飞剑绝巅的时代终究沉沦…… 这个世界发生了什么？ 那埋葬于时间长河里的历史真相，谁来聆听？ 山河千里写伏尸，乾坤百年描饿虎。 天地至公如无情， 我有赤心一颗、以巡天！ 欢迎来到，情何以甚的仙侠世界。', 'livre2.jpg'),
        (3,'圣墟', '在破败中崛起，在寂灭中复苏。 沧海成尘，雷电枯竭，那一缕幽雾又一次临近大地，世间的枷锁被打开了，一个全新的世界就此揭开神秘的一角……', 'livre3.jpg');");
        $req->bindValue(':idR', $idR, PDO::PARAM_INT);
        $req->bindValue(':nomR', $nomR, PDO::PARAM_STR);
        $req->bindValue(':descriptionR', $descriptionR, PDO::PARAM_INT);
        $req->bindValue(':imageR', $imageR, PDO::PARAM_INT);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "\n addPhoto(0, \"livre1.jpg\",1) : \n";
    print_r(addPhoto(0, "livre1.jpg", 1));

    echo "\n addPhoto(1, \"livre2.jpg\",1) : \n";
    print_r(addPhoto(1, "livre2.jpg", 1));

    echo "\n addPhoto(2, \"livre3.jpg\",3) : \n";
    print_r(addPhoto(2, "livre3.jpg", 3));



    echo "\n getRomansByIdR(1) : \n";
    print_r(getRomansByIdR(1));

    echo "\n getRomansByIdR(3) : \n";
    print_r(getPhotosByIdR(3));

    echo "\n getRomansByIdP(1) : \n";
    print_r(getPhotoByIdP(1));
}
?>