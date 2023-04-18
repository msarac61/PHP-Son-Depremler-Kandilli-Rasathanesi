<?php

function depremler() {
    $veri = simplexml_load_file("http://udim.koeri.boun.edu.tr/zeqmap/xmlt/son24saat.xml");
    $depremlerArray = array();
    foreach ($veri as $eq) {
        $depremlerArray[] = array(
            "date" => date('d.m.Y H:i:s', strtotime((string)$eq->tarih)),
            "latitude" => $eq->attributes()->lat,
            "longitude" => $eq->attributes()->lng,
            "depth" => $eq->attributes()->Depth,
            "magnitude" => $eq->attributes()->mag,
            "region" => $eq->attributes()->lokasyon
        );
    }

    echo '<div class="sondepremler">';
    echo '<ul>';
    foreach ($depremlerArray as $eq) :
        echo '<li>';
        echo $eq['date'] . '' . $eq['magnitude'];
        echo $eq['region'] . '' . $eq['depth'] . 'km';
        echo '</li>';
    endforeach;
    echo '</ul>';
    echo '</div>';
}
