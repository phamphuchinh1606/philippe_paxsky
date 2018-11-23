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

//Classification ====================================================================
Breadcrumbs::for('classify', function ($trail) {
    $trail->parent('home');
    $trail->push('List Classification', route('classify.index'));
});


//Investor Create
Breadcrumbs::for('classify.create', function ($trail) {
    $trail->parent('classify');
    $trail->push('Create Classification');
});

//Investor Type Update
Breadcrumbs::for('classify.update', function ($trail, $classifyName) {
    $trail->parent('classify');
    $trail->push($classifyName);
});
//========================End Investor===============================================

//Management Agency ====================================================================
Breadcrumbs::for('management_agency', function ($trail) {
    $trail->parent('home');
    $trail->push('List Management Agency', route('management_agency.index'));
});


//Investor Create
Breadcrumbs::for('management_agency.create', function ($trail) {
    $trail->parent('management_agency');
    $trail->push('Create Management Agency');
});

//Investor Type Update
Breadcrumbs::for('management_agency.update', function ($trail, $managementAgencyName) {
    $trail->parent('management_agency');
    $trail->push($managementAgencyName);
});
//========================End Investor===============================================

//Direction ====================================================================
Breadcrumbs::for('direction', function ($trail) {
    $trail->parent('home');
    $trail->push('List Direction', route('direction.index'));
});


//Investor Create
Breadcrumbs::for('direction.create', function ($trail) {
    $trail->parent('direction');
    $trail->push('Create Direction');
});

//Investor Type Update
Breadcrumbs::for('direction.update', function ($trail, $directionName) {
    $trail->parent('direction');
    $trail->push($directionName);
});
//========================End Investor===============================================

