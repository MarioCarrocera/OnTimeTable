Trait Tablefor ontime

The OnTime framework is designed to be modular, scalable and comprehensive, so that each new feature integrates without difficulty and maintains a unique class definition (OnTime) and all "additional classes" are "trait" that enrich it, in such a way that an integrated system is obtained, not separate programs which do not necessarily have to behave correctly together.
This trait will be need if you wan have tables

Installation in test environment:

1.- Copy all the files in the directory where was instaled ontrime core

2.- With the browser of your preference, locate the directory and enter it

3.- Execute the OntimeInstallerDyR.php file

4.- When executing the file,  the files where moved and the required environment was created

Recommendations:

If you know how to create a subdomain that points to the "demo" directory, it is more comfortable and realistic.

After install

When installing, the necessary environment is defined to define access security, I create a User called "Admin" and that his password is "OT2021Free", this environment left the class prepared for definitions of the data dictionary and records. 

In this trait, can create tables in any feature, a table is defined like a record that have an unique Key id, when you create a table must especify the record, but more than one table can have the same record, in a record must include at least all the fields that don't is not specy like emty = TRUE, neither can include a fields not included on the record.

In the validation include since this feature

lookin, check that the content of the field exist in defined basic content feature (.bas)
lookfrom, check that the content of the field exist in defined table feature (.tas)
bringin, check that the content of the field exist in defined basic content feature (.bas), and bring the relate data like %%Field
bringfrom,  check that the content of the field exist in defined table feature (.tas), , and bring the relate data like %%Field
isin, check that the content of the field exist is defined container in basic content feature (.bas) 
isfrom, check that the content of the field exist is defined container in defined table feature (.tas)

 
mario.carrocera@hotmail.com

**********+++++++++++
Basic Table Demo
**********+++++++++++

**********
Create Class
**********

basic content exist
**********+++++++++++
Conecting like admin
**********+++++++++++

Connect('admin','OT2021Free')
Connected!!!

**********+++++++++++
Data Dictionary
**********+++++++++++

**********
Show Data Dictionary
**********

ShwDdd()
1.- FldNme :
__________1D.- FldTpe=>K
__________1D.- FldDsc=>Field name
1.- FldDsc :
__________1D.- FldTpe=>S
__________1D.- FldDsc=>Field description
1.- FldTpe :
__________1D.- FldTpe=>R
__________1D.- FldDsc=>Field type
----------2.- FldVld :
____________________2D.- Name=>lookin
____________________2D.- content=>type
____________________2D.- in=>ddd
1.- FldVld :
__________1D.- FldTpe=>A
__________1D.- FldDsc=>Field validation
1.- FldLen :
__________1D.- FldTpe=>I
__________1D.- FldDsc=>Field length
1.- FldEmp :
__________1D.- FldTpe=>B
__________1D.- FldDsc=>Field bool
1.- FldFmt :
__________1D.- FldTpe=>S
__________1D.- FldDsc=>Field format
1.- FldCap :
__________1D.- FldTpe=>S
__________1D.- FldDsc=>Field caption
1.- FldTtt :
__________1D.- FldTpe=>S
__________1D.- FldDsc=>Field tool tip text
1.- FldDfl :
__________1D.- FldTpe=>V
__________1D.- FldDsc=>Default Value
__________1D.- FldEmp=>
**********
Create field RecId in data dictionary
**********

DddAddFld('RecId', array('FldTpe'=>'K','FldDsc'=>'Record Identifier'))
Created!!!

**********
Create field Name in data dictionary
**********

DddAddFld('Name', array('FldTpe'=>'S','FldDsc'=>'Store the name'))
Created!!!

**********
Create field in in data dictionary
**********

DddAddFld('in', array('FldTpe'=>'S','FldDsc'=>'Store Trait where is instales'))
Created!!!

**********
Create field parameters in data dictionary
**********

DddAddFld('parameters', array('FldTpe'=>'I','FldDsc'=>'Number of Parameters'))
Created!!!

**********
Create field Dscr in data dictionary
**********

DddAddFld('Dscr', array('FldTpe'=>'S','FldDsc'=>'Store the Description'))
Created!!!

**********
Create field DscPrm in data dictionary
**********

DddAddFld('DscPrm', array('FldTpe'=>'S','FldDsc'=>'Description of parameters'))
Created!!!

**********
Create field FlDName in data dictionary
**********

DddAddFld('DscErr', array('FldTpe'=>'A','FldDsc'=>'Errors tat can present'))
Created!!!

**********
Show Data Dictionary
**********

ShwDdd()
1.- FldNme :
__________1D.- FldTpe=>K
__________1D.- FldDsc=>Field name
1.- FldDsc :
__________1D.- FldTpe=>S
__________1D.- FldDsc=>Field description
1.- FldTpe :
__________1D.- FldTpe=>R
__________1D.- FldDsc=>Field type
----------2.- FldVld :
____________________2D.- Name=>lookin
____________________2D.- content=>type
____________________2D.- in=>ddd
1.- FldVld :
__________1D.- FldTpe=>A
__________1D.- FldDsc=>Field validation
1.- FldLen :
__________1D.- FldTpe=>I
__________1D.- FldDsc=>Field length
1.- FldEmp :
__________1D.- FldTpe=>B
__________1D.- FldDsc=>Field bool
1.- FldFmt :
__________1D.- FldTpe=>S
__________1D.- FldDsc=>Field format
1.- FldCap :
__________1D.- FldTpe=>S
__________1D.- FldDsc=>Field caption
1.- FldTtt :
__________1D.- FldTpe=>S
__________1D.- FldDsc=>Field tool tip text
1.- FldDfl :
__________1D.- FldTpe=>V
__________1D.- FldDsc=>Default Value
__________1D.- FldEmp=>
1.- RecId :
__________1D.- FldTpe=>K
__________1D.- FldDsc=>Record Identifier
1.- Name :
__________1D.- FldTpe=>S
__________1D.- FldDsc=>Store the name
1.- in :
__________1D.- FldTpe=>S
__________1D.- FldDsc=>Store Trait where is instales
1.- parameters :
__________1D.- FldTpe=>I
__________1D.- FldDsc=>Number of Parameters
1.- Dscr :
__________1D.- FldTpe=>S
__________1D.- FldDsc=>Store the Description
1.- DscPrm :
__________1D.- FldTpe=>S
__________1D.- FldDsc=>Description of parameters
1.- DscErr :
__________1D.- FldTpe=>A
__________1D.- FldDsc=>Errors tat can present
**********
Defining Record for sample
**********

**********
Create Record sample in data dictionary
**********

CrtRcd(sample,'sample of ontime')
Created!!!

**********
Add field RecId Name to record
**********

RcdAddIn(sample,'RecId', array('FldEmp'=>FALSE))
Created!!!

**********
Add field Name to record
**********

RcdAddIn(sample,'Name', array('FldEmp'=>TRUE))
Created!!!

**********
Add field in to record
**********

RcdAddIn(sample,'in', array('FldEmp'=>FALSE))
Created!!!

**********
Add field parameters to record
**********

RcdAddIn(sample,'parameters', array('FldEmp'=>FALSE))
Created!!!

**********
Add field Dscr to record
**********

RcdAddIn(sample,'Dscr', array('FldEmp'=>TRUE))
Created!!!

**********
Add field DscPrm to record
**********

RcdAddIn(sample,'DscPrm', array('FldEmp'=>TRUE))
Created!!!

**********
Add field DscErr to record
**********

RcdAddIn(sample,'DscErr', array('FldEmp'=>TRUE))
Created!!!

**********
Show record list
**********

ShwRecLst()
0D.- ddd=>Data Dictionary
0D.- sample=>sample of ontime
**********
Show record
**********

ShwRec('sample')
1.- definition :
__________1D.- key=>RecId
----------2.- RecId :
--------------------3.- ByField :
______________________________3D.- FldTpe=>K
______________________________3D.- FldDsc=>Record Identifier
--------------------3.- ByRecord :
______________________________3D.- FldEmp=>
----------2.- Name :
--------------------3.- ByField :
______________________________3D.- FldTpe=>S
______________________________3D.- FldDsc=>Store the name
--------------------3.- ByRecord :
______________________________3D.- FldEmp=>1
----------2.- in :
--------------------3.- ByField :
______________________________3D.- FldTpe=>S
______________________________3D.- FldDsc=>Store Trait where is instales
--------------------3.- ByRecord :
______________________________3D.- FldEmp=>
----------2.- parameters :
--------------------3.- ByField :
______________________________3D.- FldTpe=>I
______________________________3D.- FldDsc=>Number of Parameters
--------------------3.- ByRecord :
______________________________3D.- FldEmp=>
----------2.- Dscr :
--------------------3.- ByField :
______________________________3D.- FldTpe=>S
______________________________3D.- FldDsc=>Store the Description
--------------------3.- ByRecord :
______________________________3D.- FldEmp=>1
----------2.- DscPrm :
--------------------3.- ByField :
______________________________3D.- FldTpe=>S
______________________________3D.- FldDsc=>Description of parameters
--------------------3.- ByRecord :
______________________________3D.- FldEmp=>1
----------2.- DscErr :
--------------------3.- ByField :
______________________________3D.- FldTpe=>A
______________________________3D.- FldDsc=>Errors tat can present
--------------------3.- ByRecord :
______________________________3D.- FldEmp=>1
1.- in :
**********
Activate Table feature
**********

ShwRec('sample')
C0010M007.-Error not defined

**********
Creating tables
**********

CrtTblIn('My sample', 'My Sample', 'sample'
Created!!!

CrtTblIn('Sample 2', 'My Sample', 'sample'
Created!!!

**********
Show featrures with tables
**********

ShwFtrTbl()
0D.- table=>(table) Table Feature
**********
Show features with tables
**********

ShwFtrTbl()
0D.- index=>Main index
0D.- My sample=>My Sample
0D.- Sample 2=>Other sample same record
**********
Show tables
**********

ShwTbl('My sample')
**********
Insert Records in My Sample
**********

InsTblIn('My sample' , 'rec 1', array('Name'=>'Just a description','in'=>'Mexico City','parameters'=>8))
**********
Show tables
**********

ShwTbl('My sample')
**********
Insert Records in My Sample
**********

InsTblIn('My sample' , 'rec 2', array('Name'=>'another description','in'=>'Mexico City','parameters'=>8,'DscPrm'=>'explain what do'))
**********
Show tables
**********

ShwTbl('My sample')
**********
Insert Records in My Sample
**********

InsTblIn('My sample' , 'rec 3', array('Name'=>'another description','in'=>'Mexico City','parameters'=>8))
**********
Show tables
**********

ShwTbl('My sample')
**********
Update and Mix in My Sample
**********

UpmTblIn('My sample' , 'rec 3', array('Name'=>'refresh again description','DscPrm'=>'who cares'))
**********
Show tables
**********

ShwTbl('My sample')
**********
Update with replace in My Sample
**********

UpdTblIn('My sample' , 'rec 2', array('Name'=>'another description','in'=>'Mexico ','parameters'=>2))
**********
Show tables
**********

ShwTbl('My sample')
**********
delete in My Sample
**********

dltTblIn('My sample' , 'rec 1')
**********
Show tables
**********

ShwTbl('My sample')
**********+++++++++++
Demo Finish
**********+++++++++++

