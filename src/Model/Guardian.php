
<?php

class Guardian extends Model
{
    protected $table = 'guardian';

    protected $fillable = [
        'studentID',
        'guardianID',
        'parentFirstName',
        'parentLastName',
        'relation',
        'ward',
        'parentDateOfBirth',
        'education',
        'occupation',
        'income',
        'parentMobile',
        'parentEmail',
        'parentOfficePhone',
        'parentOfficeAddressLine1',
        'parentOfficeAddressLine2',
        'parentCity',
        'parentState',
        'parentCountry'
    ];
?>