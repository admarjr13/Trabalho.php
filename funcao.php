<?php

function buscarReceita($receitas, $id){

    foreach($receitas as $r){

        if($r['id'] == $id){

            return $r;

        }

    }

    return null;
}

function filtrarReceitas($receitas, $tipo){

    return array_filter($receitas, function($r) use ($tipo){

        return $r['tipo'] == $tipo;

    });
}