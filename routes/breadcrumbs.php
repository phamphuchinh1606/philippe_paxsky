<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

//Building Type===================================================================
Breadcrumbs::for('buildingType', function ($trail) {
    $trail->parent('home');
    $trail->push('List Building Type', route('building_type.index'));
});

//Building Type Create
Breadcrumbs::for('buildingType.create', function ($trail) {
    $trail->parent('buildingType');
    $trail->push('Create Building Type');
});

//Building Type Update
Breadcrumbs::for('buildingType.update', function ($trail, $buildingTypeName) {
    $trail->parent('buildingType');
    $trail->push($buildingTypeName);
});
//========================End Building Type===============================================

//Investor ====================================================================
Breadcrumbs::for('investor', function ($trail) {
    $trail->parent('home');
    $trail->push('List Investor', route('investor.index'));
});


//Investor Create
Breadcrumbs::for('investor.create', function ($trail) {
    $trail->parent('investor');
    $trail->push('Create Investor');
});

//Investor Type Update
Breadcrumbs::for('investor.update', function ($trail, $investorName) {
    $trail->parent('investor');
    $trail->push($investorName);
});
//========================End Investor===============================================

