/*V3.0 - new error message - CFT*/

var MsgErreur
var TabError;
var TabNoError;
TabError ="";
TabNoError="";


function validation(){
	with(window.document.forms[0]){
		MsgErreur = false;
		for(var i = 0; i < length ; i++) {
			
			InitialStyle(elements[i]);
			var EId =  elements[i].id;
			
			
/********************************************************************************/			
/*     Parameting the checking 							*/
/*     										*/     
/*     => By default all the field are mandatory 				*/
/*	  (txtfield, checkbox, list, etc...), so the field need 		*/	
/*	  to be filled or selected						*/
/*     => Over that, we do special checking corresponding to the		*/ 
/*	  front office rules (by type of field)					*/
/*     => After we declare the exception for optionnal field 	   		*/		
/*	  with the NoCheck tables for kind of checking				*/
/********************************************************************************/	 					    

/********************************************************************************/			
/*	Major type of checking							*/
/********************************************************************************/		
			
//multi value availale
/*
			var Numeric = new Array("id19","id24","id30","id31","id32","id33","id35","id71","id75","id104","id106","id111");
			var Email = new Array("id11","id113","id115","id117");
			var TabDMY = new Array("id27d","id40d","id41d","id42d","id43d","id44d","id45d","id46d","id47d","id48d","id49d","id59d","id60d","id61d","id62d","id72d","id73d","id74d","id82d","id85d","id98d","id99d");
			var Age = new Array("id40a","id41a","id42a","id43a","id44a","id45a","id46a","id47a","id48a","id49a");
			var YesNo = new Array();			
			var TabTextarea = new Array("id119");
			var PostalCodeFrance = new Array("id40a","id41a","id42a","id43a","id44a","id45a","id46a","id47a","id48a","id49a");
*/

			var YesNo = new Array();			
			var TabTextarea = new Array();


//2 values mandatory or empty if password field is single			
//			var TabPassword = new Array("id12","id13");			
//			var TabPassword = new Array();			

			
//Not used			
//			var TabMY = new Array("id44a","id45","id47a","id48a","id49a","id51a","id52a","id53a","id55","id58");			
//			var LastVisit = new Array("id45","id49a","id51a","id55");
//			var TabDate = new Array();
			
/********************************************************************************/			
/*	Optional field declaration, field no checked 				*/			
/********************************************************************************/
/*					
			var NoCheckOptin = new Array("id54","id55","id56","id57");		
			var NoCheckEmpty = new Array("id35","id40a","id41a","id42a","id43a","id44a","id45a","id46a","id47a","id48a","id49a","id58","id50","id71","id105","id106","id27","id30","id31","id115","id116","id117","id118");			
			var NoCheckCheckbox = new Array("id14","id112a","id112b","id112c","id112d","id112e","id112f","id112g");
			var NoCheckCombo = new Array("id94","id95","id45","id46","id49a","id49b","id51a","id51b","id55","id56","id33a","id33b","id33c","id34a","id35a","id36a","id37a"); 
			var NoCheckDMY = new Array();
*/

var NoCheckOptin = new Array();

/********************************************************************************/			


			
			var Flag = false;			
//retrieve the type of the element			
			type = elements[i].type; 
			
			switch (type)
			{
			case "text" : 


			case "hidden" :
			case "file" :
			
//case for textfield or textarea 			
			case "textarea" :	
	


//textarea					
//					for(z = 0; z < TabTextarea.length ; z++) {
//						if(EId==TabTextarea[z]){						
							if(elements[i].value.length>15000){
	                       		TabError = TabError+"error_generic,";
								ErrorStyle(elements[i]);			
							}else{
								TabNoError = TabNoError+"error_generic,";
								InitialStyle(elements[i]);			
}
//						}										
//					}	



//field Email
				for(var k = 0; k < Email.length ; k++) {
					if(EId==Email[k]){
						ValidEmail(elements[i]);
					}
				}
		




// check Mandatory			
				if(elements[i].value==""){
					Flag = false;
					for(var j = 0; j < NoCheckEmpty.length ; j++){if(EId==NoCheckEmpty[j]){Flag = true}}
					if(Flag!=true){					
						TabError = TabError+"error_mandatory,";			 
						ErrorStyle(elements[i]);													
					}else{
						TabNoError = TabNoError+"error_mandatory,";			
						InitialStyle(elements[i]);						
					}	
				}

				

		
//field Numeric
				for(var j = 0; j < Numeric.length ; j++) {
					if(EId==Numeric[j]){						
						typeInt(elements[i]);
					}
				}
	

//field Alpha
				for(var j = 0; j < Alpha.length ; j++) {
					if(EId==Alpha[j]){						
						typeAlpha(elements[i]);
					}
				}



	
//field Age
				for(var m = 0; m < Age.length ; m++) {
					if(EId==Age[m]){
						ValidAge(elements[i]);
					}
				}

//field Postal Code France
				for(var j = 0; j < PostalCodeFrance.length ; j++) {
					if(EId==PostalCodeFrance[j]){						
						typePostalCodeFrance(elements[i]);
					}
				}				
		
//field Date, with textfield format (not used) 
/*
				for(var z = 0; z < TabDate.length ; z++) {
					if(EId==TabDate[z]){						
						ValidDate(elements[i]);
					}
				}
*/
	
	
					
					
// password  			
/*
					if (TabPassword.length==2){
						if (EId==TabPassword[0]){
							ValidPassword(elements[i],document.getElementById(TabPassword[1]),1,0);				
						}
					}else if (TabPassword.length==1){	
						if (EId==TabPassword[0]){
							ValidPassword(elements[i],"",0,0);				
						}					
					}
*/
			

//field Date with DMY listbox format				
					for(var l = 0; l < TabDMY.length ; l++) {
							if (EId==TabDMY[l]){

								for(var j = 0; j < NoCheckDMY.length ; j++){if(EId==NoCheckDMY[j]){Flag = true}}
								if(Flag!=true){	
									Verif_Date(elements[i],elements[i+1],elements[i+2],1);	
								}else{
									Verif_Date(elements[i],elements[i+1],elements[i+2],0);								
								}
								
								if((elements[i].value != "dd") && (elements[i+1].value != "mm") && (elements[i+2].value != "yyyy")){
									elements[i+3].value=HiddenDateDMY(elements[i],elements[i+1],elements[i+2]);							
								}else{
									elements[i+3].value= "";
								}
								i+=3;							
								
							}
						}
				
			break;
			


			case "password" : 

// password  			
					if (TabPassword.length==2){
//						if (EId==TabPassword[0]){
//							ValidPassword(elements[i],document.getElementById(TabPassword[1]),1,0);				
//						}
ValidPassword(document.getElementById(TabPassword[0]),document.getElementById(TabPassword[1]),1,0);				
					}else if (TabPassword.length==1){	
						if (EId==TabPassword[0]){
							ValidPassword(elements[i],"",0,0);				
						}					
					}

// New password  			
					if (TabNewPassword.length==2){
//						if (EId==TabNewPassword[0]){
//							ValidPassword(elements[i],document.getElementById(TabNewPassword[1]),1,1);				
//						}
ValidPassword(document.getElementById(TabNewPassword[0]),document.getElementById(TabNewPassword[1]),1,1);				
					}else if (TabNewPassword.length==1){	
						if (EId==TabNewPassword[0]){
							ValidPassword(elements[i],"",0,1);				
						}					
					}





			
//case for radio button		
			case "radio" :
				for(var l = 0; l < YesNo.length ; l++) {
					if (EId==YesNo[l]){
						if(elements[i].checked != true && elements[i+1].checked != true ){
							Flag = false;
							for(var j = 0; j < NoCheckYesNo.length ; j++){if(EId==NoCheckYesNo[j]){Flag = true}}
							if(Flag!=true){	
								TabError = TabError+"error_mandatory,";										
								ErrorStyle(elements[i]);
							}else{
								TabNoError = TabNoError+"error_mandatory,";			
								InitialStyle(elements[i]);														
							}	
							i++
						}													
					}
				}	
			break;	
			
			
//case for checkbox			
			case "checkbox" :
				if(elements[i].checked != true){
					Flag = false;
					for(var j = 0; j < NoCheckCheckbox.length ; j++){if(EId==NoCheckCheckbox[j]){Flag = true}}
					if(Flag!=true){	
						TabError = TabError+"error_mandatory,";						
						ErrorStyle(elements[i]);
					}else{
						TabNoError = TabNoError+"error_mandatory,";			
						InitialStyle(elements[i]);							
					}
				}	
			break;
			
			
			
			
//Case for listbox			
			case "select-one" :
			case "select-multiple" :
				if(elements[i].selectedIndex == 0){						
						Flag = false;
						for(var j = 0; j < NoCheckCombo.length ; j++){if(EId==NoCheckCombo[j]){Flag = true}}
						if(Flag!=true){	
							TabError = TabError+"error_mandatory,";									
							ErrorStyle(elements[i]);	
						}else{
							TabNoError = TabNoError+"error_mandatory,";			
							InitialStyle(elements[i]);								
						}																				
					}				
					

//date by listbox (not used)					
/*					
					for(var l = 0; l < TabMY.length ; l++) {
						if (EId==TabMY[l]){

							Flag = false;
							for(var j = 0; j < NoCheckDMY.length ; j++){if(EId==NoCheckDMY[j]){Flag = true}}
							if(Flag!=true){								
								elements[i+2].value=HiddenDateMY(elements[i],elements[i+1]);
								i+=2;
							}
						}
					}
					
*/

			break;
			
//Other Cases
/*
			case "submit" :
			case "reset" :
			case "image" :
			case "button" :			
*/
			
			default : 
			}		
		} 
	}
	
//alert (TabError);
//alert (TabNoError);

	valid();
}





/********************************************************************************/			
/*	Processing validation function							*/
/********************************************************************************/	

//submitting function
function valid(Msg){
var ParseTabError;
var ParseTabNoError;
ParseTabError = TabError.split(",");
ParseTabNoError = TabNoError.split(",");

	if(!MsgErreur){		


		for (i=0; i<ParseTabNoError.length;i++) {
			if (ParseTabNoError!=""){
				changestyle(ParseTabNoError[i],'none');
			}
		}	
		TabError = "";
		TabNoError = "";
// CFT num resa for CRO
if (window.document.forms[0].formname.value=='contactUsConfirm'){
		if (window.document.forms[0].nameFriend1 != null || window.document.forms[0].nameFriend1 != undefined){
			if (window.document.forms[0].nameFriend1.value!=''){
			window.document.forms[0].nameFriend1.value='num_resa: '+ window.document.forms[0].nameFriend1.value;
		} 
	}
}
		window.document.forms[0].submit();
		return true;
	}else{


		for (i=0; i<ParseTabNoError.length;i++) {
			if (ParseTabNoError!=""){				
				changestyle(ParseTabNoError[i],"none");			
			}
		}							
		
		for (i=0; i<ParseTabError.length;i++) {
			if (ParseTabError!=""){
				changestyle(ParseTabError[i],"block");
			}
		}		
		
		TabError = "";
		TabNoError = "";			
		return false;
	}
}

//initialize normal style 
function InitialStyle(element){
	try{	
		var normal = "#84929F";
		idelement = element.id;
		idelement = idelement.substr(2,4);
		idelement = idelement.replace(/h/,"");
//		idelement = idelement.replace(/d/,"");	
		idelement = "label"+idelement;
		document.getElementById(idelement).style.color = normal;
	}catch (e) {}
}

//initialize error style 
function ErrorStyle(element){
	try{	
		var erreur = "#C92702";
		idelement = element.id;
		idelement = idelement.substr(2,4);
		idelement = idelement.replace(/h/,"");
//		idelement = idelement.replace(/d/,"");	
		idelement = "label"+idelement;
		document.getElementById(idelement).style.color = erreur;
		MsgErreur = true;
	}
	catch(e) {}
}




/********************************************************************************/			
/*	Checking function							*/
/********************************************************************************/	



//Check Date with DMY format
function Verif_Date(element1,element2,element3,mandatory){
	var day 	= 	element1.value;
	var month 	= 	element2.value;
	var year 	= 	element3.value;
trueElement = element1.id;
//trueElement = trueElement.substr(0,trueElement.length-1);


if (day+month+year != "ddmmyyyy" && day+month+year !=""){
	
		var datTest_Date = new Date(year, month-1, day);


			if (year != datTest_Date.getFullYear()){
			
				ErrorStyle(document.getElementById(trueElement));			
				TabError = TabError+"error_date,";		 
				return false;                                             
			}else if ((year < 1916) || (year > new Date().getFullYear())){ 
			
				ErrorStyle(document.getElementById(trueElement));			
				TabError = TabError+"error_date,";		 
				return false;                                             
			}		          

		
			if ((day != datTest_Date.getDate()) || (month-1 != datTest_Date.getMonth())){ 
		
	                     if(day+month+year != "ddmmyyyy"){
                       		TabError = TabError+"error_date,";
							ErrorStyle(document.getElementById(trueElement));		

							return false;
                         }else{
							InitialStyle(document.getElementById(trueElement));
							TabNoError = TabNoError+"error_date,";		 
							return true;
						}
			}else{
							InitialStyle(document.getElementById(trueElement));
							TabNoError = TabNoError+"error_date,";		 
							return true;			
			}

}else{

 
			if(day+month+year != "ddmmyyyy" && day+month+year != "" ){
			   TabError = TabError+"error_date,";	
			   ErrorStyle(document.getElementById(trueElement));			
			   return false;
            }
                               
	
			if (mandatory == 1){		 
				TabError = TabError+"error_mandatory,";		
				ErrorStyle(document.getElementById(trueElement));
				return false;
			}else{
				TabNoError = TabNoError+"error_mandatory,";	
				InitialStyle(document.getElementById(trueElement));
				return true;
			}
			
}     
}


// fill date value DMY into hidden field
function HiddenDateDMY(element1,element2,element3){
	var a = element1.value;
	var b = element2.value;
	var c = element3.value;
	dt= a+"-"+b+"-"+c;
	return dt;
}

// fill date value MY into hidden field (not used)
/*
function HiddenDateMY(element1,element2){
	var a = element1.value;
	var b = element2.value;
	dt= a+"/"+b;
	return dt;
}
*/


//Check Date filled by a textfield (not used)
/*
function ValidDate(element){
	var valeur_date=element.value;
	var tabDate = valeur_date.split('/');
	var datTest_Date = new Date(parseInt(tabDate[2]), parseInt(tabDate[1])-1, parseInt(tabDate[0]));
 
//if (valeur_date=='') {	
//	 ErrorStyle(element);
// 	return false;
//}
 
 if (valeur_date.length>10) {	
	 ErrorStyle(element);
     TabError = TabError+"error_date,";	
 	return false;
 }
 
 for (i=0; i<valeur_date.length; i++) { 
	 if (valeur_date.charAt(i) == ' ') {
		//La date ne doit pas contenir d\'espaces.
		 ErrorStyle(element);
		 TabError = TabError+"error_date,";	
		 return false;
     }
 }
 
 if (valeur_date.length > 0) { 
	 if ((parseInt(tabDate[0]) != datTest_Date.getDate()) || (parseInt(tabDate[1])-1 != datTest_Date.getMonth())) { 
		 //format de la date 'D/M/YYYY' ou DD/MM/YYYY
		 ErrorStyle(element);
		 TabError = TabError+"error_date,";			 
			return false;
	 }
	 if ((tabDate[2].length != 4) || (parseInt(tabDate[2]) < 1916) || (parseInt(tabDate[2]) > 2006)) { 
		 //l'année sur 4 chiffres.
		 //Elle doit être comprise entre 1916 et 2006.
		 ErrorStyle(element);
		 TabError = TabError+"error_date,";			 
			return false;
	 }
 }

 InitialStyle(element);
 TabNoError = TabNoError+"error_date,";	
 return true;
}
*/

//checking for last visit field (not used)
/*function Lastvisit(element1,element2){
	
							
	var month 	= 	element1.selectedIndex;
	var year 	= 	element2.selectedIndex;
	 if((month == 0) || (year == 0)){
		 ErrorStyle(element1);
		 return false;
	 }
	 
	InitialStyle(element1);
 return true;
}*/

//check numeric field
function typeInt(element){
	if (element.value!=""){
		if (isNaN(element.value)) {
			TabError = TabError+"error_numeric,";
			ErrorStyle(element);
			return (false);
		}else{
			TabNoError = TabNoError+"error_numeric,";	
			InitialStyle(element);					
			return (true);
		}
	}
}

//check numeric field
function typePostalCodeFrance(element){
	if (element.value!=""){
		if (isNaN(element.value) || element.value.length>6 || element.value.length<5) {
			TabError = TabError+"error_postal_code_france,";
			ErrorStyle(element);
			return (false);
		}else{
			TabNoError = TabNoError+"error_postal_code_france,";	
			InitialStyle(element);					
			return (true);
		}
	}
}

//check alpha field
function typeAlpha(element){
	if (element.value!=""){
		var typeAlphaexp = /[0-9]/;
		if (typeAlphaexp.test(element.value)) {

			TabError = TabError+"error_alpha,";
			ErrorStyle(element);
			return (false);
		}else{
			TabNoError = TabNoError+"error_alpha,";	
			InitialStyle(element);					
			return (true);
		}
	}
}


//check email field
function ValidEmail(element){		
	var adresse = element.value;
	var place = adresse.indexOf("@",1);
	var point = adresse.indexOf(".",place+2);
	

	if (adresse !="") {
		if ((place > -1)&&(adresse.length >2)&&(point > 1))	{
			TabNoError = TabNoError+"error_email,";	
			InitialStyle(element);				
			return true;
		}else{
			TabError = TabError+"error_email,"; 
			ErrorStyle(element);			
			return false;
		}	
	}else{
//			TabError = TabError+"error_email,"; 
//			ErrorStyle(element);		
//			return(false);
			TabNoError = TabNoError+"error_email,"; 
			InitialStyle(element);		
			return(true);
	}
}


//check password field
function ValidPassword(element1,element2,confirm,newPass){
	if(element1.value.length>=5){
			
			TabNoError = TabNoError+"error_password,";			
		                TabNoError = TabNoError+"error_passlength,";	
			InitialStyle(element1);		
			
			if (confirm==1){
				if (element1.value != element2.value) {
					TabError = TabError+"error_password,";
					ErrorStyle(element1);
					ErrorStyle(element2);
					return false; 
				}else{
					TabNoError = TabNoError+"error_password,";	
					TabNoError = TabNoError+"error_passlength,";					
					InitialStyle(element1);	
					InitialStyle(element2);
					return true;
				}
			}
	}else{
if (newPass==1 && element1.value.length!=0){
		TabError = TabError+"error_passlength,";	
		ErrorStyle(element1);
		if (confirm==1)ErrorStyle(element2);			
		return false; 
}else if (newPass==1 && element1.value.length==0){
					TabNoError = TabNoError+"error_passlength,";	
					InitialStyle(element1);	
					if (confirm==1)InitialStyle(element2);
		return true; 

}
if (newPass==0){
		TabError = TabError+"error_passlength,";	
		ErrorStyle(element1);
		if (confirm==1)ErrorStyle(element2);			
		return false; 
}
	}

}
//check Age
function ValidAge(element){
	if (element.value!=""){
		if (isNaN(element.value)) {
		 ErrorStyle(element);
		 TabError = TabError+"error_generic,";
		 return false;
		}else{
			if(element.value <= 0){
				ErrorStyle(element);
			    TabError = TabError+"error_generic,";			
				return false; 
			}else{
				 TabNoError = TabNoError+"error_generic,";	
				 return true;			
			}		
		}
	}	
}



//check if checkbox are checked or not (not used)
/*
function check(){

	with(window.document.forms[0]){
	var cnt = 0;

	for(var i = 0; i < length ; i++) {
		InitialStyle(elements[i]);
		if(elements[i].checked == true){
			cnt++;
		}else{
			if(cnt == 0)
				ErrorStyle(elements[i]);
			}
		}
	}
	if(cnt == 0){
		//alert("vous devez cochÃ© au moins une case");
		return false;
	}
	
}
*/




/********************************************************************************/			
/*	Managing children display							*/
/********************************************************************************/	

//display children fields
function NbChildren(element){
	var a = element.value;
	a = parseInt(a);
	if (a>=0 && a<=10){
		initNbChildren(element);
		for (i=0; i< a; i++){
			if (a<=10){
				id = 40+i;
				id ="id"+id;
				for (j=1; j<= 4; j++){changestyle(id+"r"+j, "block");}
			}else{
//				var element=document.getElementById('id35');
				ErrorStyle(element);
				return false;
			}
		}
	}
}

// hide  children fields
function initNbChildren(element){
	for (i=0; i< 10; i++){
		id = 40+i;
		id ="id"+id;
		for (j=1; j<= 4; j++){changestyle(id+"r"+j, "none");}
	}
//	var element=document.getElementById('id35');
	InitialStyle(element);
}
/************** DDS ***************/
function showSignIn() {
	if (document.getElementById('signIn-off').style.display == 'block'){
		document.getElementById('signIn-off').style.display = 'none';
		document.getElementById('signIn-on').style.display = 'block';
	} else {	
		document.getElementById('signIn-off').style.display= 'block';
		document.getElementById('signIn-on').style.display = 'none';
	}
}


function errorSSOInit(){

if (document.getElementById('errorMessage')){	document.getElementById('errorMessage').style.display='none';}
	document.getElementById('error_mandatory').style.display='none';
	document.getElementById('error_login').style.display='none';
	document.getElementById('error_email').style.display='none';
	document.getElementById('error_password').style.display='none';
	document.getElementById('error_passlength').style.display='none';
	document.getElementById('error_generic').style.display='none';
	document.getElementById('errorSSOButton').style.display='none';
	
	if (document.getElementById('errorSSOButton2')){document.getElementById('errorSSOButton2').style.display='none';}			
	if (document.getElementById('error_date')){	document.getElementById('error_date').style.display='none';}
	if (document.getElementById('error_optin')){	document.getElementById('error_optin').style.display='none';}
	if (document.getElementById('error_zip')){	document.getElementById('error_zip').style.display='none';}
	if (document.getElementById('error_alpha')){	document.getElementById('error_alpha').style.display='none';}
	if (document.getElementById('error_numeric')){	document.getElementById('error_numeric').style.display='none';}	
		
	if (document.getElementById('error_loginMandatory')){	document.getElementById('error_loginMandatory').style.display='none';}
	if (document.getElementById('error_loginLogin')){	document.getElementById('error_loginLogin').style.display='none';}
	if (document.getElementById('error_loginPassword')){	document.getElementById('error_loginPassword').style.display='none';}
	if (document.getElementById('error_loginEmail')){	document.getElementById('error_loginEmail').style.display='none';}
	if (document.getElementById('error_loginPasslength')){	document.getElementById('error_loginPasslength').style.display='none';}	

	if (document.getElementById('id0')) {document.getElementById('id0').style.display='block';}	

	if (document.getElementById('sso_register')) {document.getElementById('sso_register').style.display='block';}	
	if (document.getElementById('sso_login')) {document.getElementById('sso_login').style.display='block';}	
	if (document.getElementById('BO2Register')) {document.getElementById('BO2Register').style.display='block';}	
	if (document.getElementById('BO2Login')) {document.getElementById('BO2Login').style.display='block';}	
}

function errorSSOButton(){
	flag = false;
	flag2 = false;
	if(document.getElementById('error_mandatory').style.display!='none'){flag=true};		
	if(document.getElementById('error_login').style.display!='none'){flag=true};		
	if(document.getElementById('error_email').style.display!='none'){flag=true};		
	if(document.getElementById('error_password').style.display!='none'){flag=true};		
	if(document.getElementById('error_passlength').style.display!='none'){flag=true};		
	if(document.getElementById('error_generic').style.display!='none'){flag=true};	

	if (document.getElementById('error_date')){if(document.getElementById('error_date').style.display!='none'){flag=true};}
	if (document.getElementById('error_optin')){if(document.getElementById('error_optin').style.display!='none'){flag=true};}
	if (document.getElementById('error_zip')){if(document.getElementById('error_zip').style.display!='none'){flag=true};}
	if (document.getElementById('error_alpha')){if(document.getElementById('error_alpha').style.display!='none'){flag=true};}
	if (document.getElementById('error_numeric')){if(document.getElementById('error_numeric').style.display!='none'){flag=true};}	

	if (document.getElementById('error_loginMandatory')){if(document.getElementById('error_loginMandatory').style.display!='none'){flag2=true};}	
	if (document.getElementById('error_loginLogin')){if(document.getElementById('error_loginLogin').style.display!='none'){flag2=true};}
	if (document.getElementById('error_loginPassword')){if(document.getElementById('error_loginPassword').style.display!='none'){flag2=true};}
	if (document.getElementById('error_loginEmail')){if(document.getElementById('error_loginEmail').style.display!='none'){flag2=true};}
	if (document.getElementById('error_loginPasslength')){if(document.getElementById('error_loginPasslength').style.display!='none'){flag2=true};}
	
	(flag==true)?document.getElementById('errorSSOButton').style.display='block':document.getElementById('errorSSOButton').style.display='none';
	if (document.getElementById('errorSSOButton2')){(flag2==true)?document.getElementById('errorSSOButton2').style.display='block':document.getElementById('errorSSOButton2').style.display='none';	}
	if (flag==true) {document.getElementById('id0').style.display='none';}	

	if (flag==true | flag2==true){ 
		if (document.getElementById('sso_register')) {document.getElementById('sso_register').style.display='none';}	
		if (document.getElementById('sso_login')) {document.getElementById('sso_login').style.display='none';}	
		if (document.getElementById('BO2Register')) {document.getElementById('BO2Register').style.display='none';}	
	}	

	if (flag==true){ 
		if (document.getElementById('signIn_off')) {document.getElementById('signIn_off').style.display='none';}
	}

	if (flag2==true) {
		if (document.getElementById('BO2Login')) {document.getElementById('BO2Login').style.display='none';}	
		if (document.getElementById('register_off')) {document.getElementById('register_off').style.display='none';}	
	}	

}





/************** Optin  Popup *************/
function  alertPopup(url){

	if (viewed==0)javascript:OpenLinkPopup2(url,'Popup',558,425,50,50,0,0,1,0,0,0,0,0);
	viewed = viewed+1;
}
