#########################################
#   Template for Patient/Record Import  #
#########################################

The import function presumes that the file format is correct and the fields do not violate database constraints (eg unique entries)

Errors of either kind will be handled resulting in rejected import.

Attempted import returns a message confirming "x succesful imports"

where x=0->N (your total submited)

######## TO TEST ######

-Follow the relevant templates described in record_import.csv or patient_import.csv

-Ensure that unique fields for PATIENTS are new
   -either get values from a current entry, delete that entry, then re-import
   -or use search feature to verify your entry does not already exist
   -entries currently in test files should work one time (and again if imported entries are deleted)

-Ensure required foreign key fields for RECORDS exist
   -use search to get correct values for foreign keys

-Ensure required fields exist

-Note to add more entries concatenate the first field to the last field (in patient familydoctor concatenated to phn "somename"56784333....)

#### Patient ####

The following are the fields and validation requirements

	Note only phn and email unique

	"phn": eg "1011110010"       %required UNIQUE
	"name": eg "Sienna Senger"   %required
	"preferred_name": eg "MrsD"  %required
	"sex": eg "Female"           %required [Male, Female]
	"date_of_birth": eg "1997-12-28" %required date format
	"address": eg "ADDRESSADRESS"    %required anytext
	"postal_code": eg "K8B9A8"       %required 6characters
	"home_phone": eg "6089392805" 
	"work_phone": eg "827623697x9808"
	"mobile_phone": eg "5906526343"
	"email": eg "ppp@hodkiewicz.net"    %UNIQUE
	"emergency_name": eg "Pattie Cremin"
	"emergency_phone": eg "8571814336"
	"emergency_relationship": eg "illo"
	"allergies": eg "labore"
	"permanent_resident": eg "No"    %required [Yes, No]
	"medical_history": eg "BLAHBLAH"
	"preferred_language": eg "et"    %required anytext
	"other_language": eg "officia"
	"ethnic_background": eg "tempora"  %required anytext
	"family_doctor":"Hank Bogan"      



### Record Template ###

Note foreign keys phn, abbrev(facility), username must exist

     "phn": eg "4179892271"       %required exists (patienttable)
     "abbrev": eg "xxdszv"        %required exists (facilitytable)
     "username": eg "aiyana75"    %required exists (usertable)
     "priority": eg "1"           %required 1->6
     "reg_datetime": eg "2001-01-02 18:43:04"   %required date-time
     "admit_datetime": eg "2001-01-02 20:12:02" %required date-time
     "chief_compl": eg "LARFUHLAKFJorfj"        %required anytext
     "chief_compl_code": eg "e4fr"              %required anytext
     "stated_compl": eg "kuygfkyug"             %required anytext
     "arrival_mode": eg "fDSJVNnOVNCslkcvnmv"
     "subjective": eg "FSAFDGAFDGADFVFPAHFFA"   %required anytext
     "objective": eg "ALERFUHARIFHPAFHRPAOF"    %required anytext
     "assessment": eg "DFHVLAIUHFAIFAOHFAIN"    %required anytext
     "prescription": eg "xSLIUGHVLSHSKVHLSKV"
     "remarks": eg "APEORIFHGAHFGAROHIFA"
     "plan": eg "LSKURHFLSKUHFLSKHGLSS"   

