
<?php

class Student extends Model
{
    protected $table = 'studentDetails';

    protected $fillable = [
        'studentID',
        'admissionNo',
        'admissionDate',
        'nameFirst',
        'nameMiddle',
        'nameLast',
        'batch',
        'dateOfBirth',
        'gender',
        'bloodGroup',
        'birthPlace',
        'nationality',
        'language',
        'religion',
        'studentCategory',
        'addressLine1',
        'addressLine2',
        'city',
        'state',
        'pin',
        'country',
        'studentPhone',
        'studentEmail',
        'photo',
        'institution',
        'year',
        'totalMarks'
    ];
?>