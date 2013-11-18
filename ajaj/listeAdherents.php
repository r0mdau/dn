<?php
require_once('../autoload.php');
if(AdherentModel::nombreTotalNouveaux() > 0)
    echo AdherentModel::getPremierNouveauEnJson();
else
    echo AdherentModel::getPremierNouveauEnJsonMoinsParu();
exit;