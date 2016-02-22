function OpenLinkPopup(strURL,strName,intHeight,intWidth){
    window.open(strURL,strName, config='height='+intHeight+', width='+intWidth+', toolbar=no, menubar=no, scrollbars=yes, resizable=yes, location=no, directories=no, status=no');
}

function OpenLinkPopup2(strURL,strName,intWidth,intHeight,intleft,inttop,inttoolbar,intmenubar,intscrollbars,intresizable,intlocation,intdirectories,intstatus,intchannelmode){

if (intWidth!=0){strWidth= 'width='+intWidth+','}else{strWidth=''}
if (intHeight!=0){strHeight='height='+intHeight+','}else{strHeight=''} 


    window.open(strURL,strName, config=strWidth+strHeight+'left='+intleft+',top='+inttop+',toolbar='+inttoolbar+', menubar='+intmenubar+', scrollbars='+intscrollbars+',resizable='+intresizable+', location='+intlocation+', directories='+intdirectories+', status='+intstatus+',channelmode='+intchannelmode);
}


function GetSelectLink(selectUrl) {
    url=selectUrl.options[selectUrl.selectedIndex].value ;
    if(url != ""){
        window.location.href=url;
    }
}

function ReloadPageForFlash(arg){
    if(location.search.substring(1)){
        // There is already parameter in the URL
        window.location = window.location + "&" + arg;
    }
    else{
        window.location = window.location + "?" + arg;
    }
}



//CFT - fonction de redirection sur les pages nécessitant le login
//URLPage= Page origine
//ParamID= Paramètre d'action
//PageName= Nom de page pour la popup
//LoginPage= Url de la page de login  
//Popup= 0 si page destination est un redirect, 1 si c'est une popup
//PopupParam= Param de la popup destination de type 'OpenLinkPopup2'

function CheckLogged(URLPage, ParamID, PageName, LoginPage, Popup, PopupParam){
//LoginPageParam 535,400,50,50,0,0,1,1,0,0,0,0

var reg = new RegExp("[ ,]+", "g");
var tabParam = PopupParam.split(reg);
             if(ParamID.indexOf("addBookmarks") == -1){
	if(Test_Login()){
		if (Popup==1 ){
			OpenLinkPopup2(URLPage+ParamID,PageName,tabParam[0],tabParam[1],tabParam[2],tabParam[3],tabParam[4],tabParam[5],tabParam[6],tabParam[7],tabParam[8],tabParam[9],tabParam[10],tabParam[11]);
		}else{
			window.location.href = URLPage+ParamID;
		}      
	}else{
		OpenLinkPopup2(LoginPage+'?URL='+URLPage+ParamID,'popup_login',530,410,50,50,0,0,0,0,0,0,0,0);
	}
          }
}		






/***************************************************************/
// Fonction a ajouter dans les JS pour utiliser l'affichage auto des onglets
/***************************************************************/

function Querystring(qs) { // optionally pass a querystring to parse
	this.params = new Object()
	this.get=Querystring_get
	
	if (qs == null)
		qs=location.search.substring(1,location.search.length)

	if (qs.length == 0) return

// Turn <plus> back to <space>
// See: http://www.w3.org/TR/REC-html40/interact/forms.html#h-17.13.4.1
	qs = qs.replace(/\+/g, ' ')
	var args = qs.split('&') // parse out name/value pairs separated via &
	
// split out each name=value pair
	for (var i=0;i<args.length;i++) {
		var value;
		var pair = args[i].split('=')
		var name = unescape(pair[0])

		if (pair.length == 2)
			value = unescape(pair[1])
		else
			value = name
		
		this.params[name] = value
	}
}

function Querystring_get(key, default_) {
	// This silly looking line changes UNDEFINED to NULL
	if (default_ == null) default_ = null;
	
	var value=this.params[key]
	if (value==null) value=default_;
	
	return value
}


function tabLoader(noTab, nbTab){

	var tabName=noTab.substring(0, noTab.length-1);
	var tabNumber=noTab.substring(noTab.length-1,noTab.length);	
	generateBlockJ (nbTab, tabNumber,'div',tabName);
	return true;
}
