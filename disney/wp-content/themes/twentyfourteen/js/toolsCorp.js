// Block J - Tab Management 
//Change Style
function findObj(n, d) { //v4.0
  var p,i,x;
  if(!d) d=document;
  if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document;
    n=n.substring(0,p);
  }
  if(!(x=d[n])&&d.all) x=d.all[n];
  for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=findObj(n,d.layers[i].document);
  if(!x && document.getElementById) x=document.getElementById(n); return x;
}

function changestyle(couche, style) {
  if (!(layer = findObj(couche))) return;
  layer.style.display = style;  
}

function changecolor(couche, name) {
  if (!(layer = findObj(couche))) return;
   layer.className = name;
  
}

function switchLine (nbTab, position, tabName){
//	var tempTabName;
	tempTabName = tabName+'8';	
	if (nbTab>4){
		if (!(layer1 = findObj('line1'))) return;
		if (!(layer2 = findObj('line2'))) return;
		if (position<=4){
	  		layer1.style.top = '31px';
	  		layer2.style.top = '-31px';
	  		if (nbTab!=8){
				changecolor(tempTabName,'tabButtonVide3');	  				  			
	  		} 
	  		 		
		}	
		if (position>4){
	  		layer1.style.top = '0px'; 
	  		layer2.style.top = '0px';	  	  			
	  		if (nbTab!=8){
				changecolor(tempTabName,'tabButtonVide2');	  				  			
	  		}	  		
		}  			
	}	
}

function generateBlockJ (nbTab, position, divName, tabName){	
	var tempDivName;
	var tempTabName;
	var tempTabButton;
	var tempLine;
	
	if (position<=4){tempLine=8}else{tempLine=4} 	
	
	for (var i=1; i<=nbTab; i++){
		tempDivName = divName + i;
		tempTabName = tabName + i;
		if (i != position){
			changestyle(tempDivName,'none');
			if (i== tempLine){ 
				changecolor(tempTabName,'tabButtonOff2');				
			}else{
				changecolor(tempTabName,'tabButtonOff');
			} 			
		}else{
			changestyle(tempDivName,'block');
			if (i== tempLine){
				changecolor(tempTabName,'tabButtonOn2');				
			}else{
				if(nbTab==4 && i==4){
					changecolor(tempTabName,'tabButtonOn2');
				}else{
					changecolor(tempTabName,'tabButtonOn');
				}
			} 	
			if(i!=1 && i!=5){
				tempTabName = tabName + (i-1);
				changecolor(tempTabName,'tabButtonOff3');				
			}
		}	
		if(nbTab==4 && i==4){
			changecolor(tempTabName,'tabButtonOff2');
			if (i == position){
				tempTabName = tabName + (i-1);
				changecolor(tempTabName,'tabButtonOff3');	
			}
		}
		
	}	
	switchLine (nbTab, position, tabName);	
}
// End Block J - Tab Management




//These functions repair the transparent PNG problem - not used
/*
function correctPNG()  {
   for(var i=0; i<document.images.length; i++)
      {
	  var img = document.images[i]
	  var imgName = img.src.toUpperCase()
	  if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
	     {
		 var imgID = (img.id) ? "id='" + img.id + "' " : ""
		 var imgClass = (img.className) ? "class='" + img.className + "' " : ""
		 var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
		 var imgStyle = "display:inline-block;" + img.style.cssText
		 if (img.align == "left") imgStyle = "float:left;" + imgStyle
		 if (img.align == "right") imgStyle = "float:right;" + imgStyle
		 if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
		 var strNewHTML = "<span " + imgID + imgClass + imgTitle
		 + " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
	     + "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
		 + "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>"
		 img.outerHTML = strNewHTML
		 i = i-1
	     }
      }
   }

var User = navigator.userAgent;
var opr = User.indexOf("Firefox")
var ff = User.indexOf("Opera")
if(opr == -1 && ff == -1){
	window.attachEvent("onload", correctPNG);	
	//alert("MS IE")
}
*/

var listOn = false;



// Management of the footer listbox

var inited = false;
function myload() {
    if (inited) return;
    inited = true;
   document.body.onclick = function() {kill();};//alert('body.onclick')
   add_handler(document.body, 'body', 'click', false);
}

function add_handler(obj, objname, evname, useCapture, as_string) {
   var desc;
   var func;
   if (obj.addEventListener) {
      if (!func) func = evname == 'load' ? function() { myload();} : function() {};
      obj.addEventListener(evname, func, useCapture);
   }
   else if (obj.attachEvent) {
       if (useCapture && !as_string) return; 
       if (!func) func = evname == 'load' ? function() {myload();} : function() {};
       obj.attachEvent('on' + evname, func);
   }
}

add_handler(window, 'window', 'load', false);
add_handler(window, 'window', 'load', true);


function openSelect(id){
	if(document.getElementById(id).style.display == 'none'){
		changestyle(id,'block');
		a=window.pageYOffset;
		/*pagel= window.document.body.offsetHeight-200;
		document.getElementById(id).style.top = pagel+"px"; */
//		window.scroll(0,a);
		listOn = true;		
		//setTimeout("openSelect('selectOpt');",time)
	}else{
		changestyle(id,'none');
		a=window.pageYOffset;
//		window.scroll(0,a);
	}
}

function openSelect1(id,left,top){
	openSelect(id);
	if (navigator.userAgent.indexOf('Firefox') != -1){
		//if firefox
		top -= document.getElementById(id).offsetHeight-2; //-8
	}else if (navigator.userAgent.indexOf('Chrome') != -1){
		left = left +185;
	}else{
		top -= document.getElementById(id).offsetHeight+8;
	}
	document.getElementById(id).style.left=left+"px";		
	document.getElementById(id).style.top=top+"px";
}

function ExOpen(idLink){	
	openSelect1('selectOpt',posLeft(idLink),(findPosY(document.getElementById(idLink))));
}

function kill(){
	if(document.getElementById('selectOpt')){
		if(document.getElementById('selectOpt').style.display == 'block'){
			if (listOn == false){
				document.getElementById('selectOpt').style.display = 'none';
			}else{
				listOn = false;
			}		
		}
	}
}


function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

/*---- Afficher les sous menus -------*/

var ns4 = (document.layers);
var ie4 = (document.all && !document.getElementById);
var ie5 = (document.all && document.getElementById);
var ns6 = (!document.all && document.getElementById);

function posLeft(idLink){
	if(ns4 || ns6){// Netscape 4
		left = (findPosX(document.getElementById(idLink))- 240);
	}
	else if(ie5){// W3C - Explorer 5+ and Netscape 6+
		left = (findPosX(document.getElementById(idLink))- 75);
	}
	return left;
	
}



/*@cc_on
@if (@_win32 && @_jscript_version>4)

var minmax_elements;

minmax_props= new Array(
  new Array('min-width', 'minWidth'),
  new Array('max-width', 'maxWidth'),
  new Array('min-height','minHeight'),
  new Array('max-height','maxHeight')
);

// Binding. Called on all new elements. If <body>, initialise; check all
// elements for minmax properties

function minmax_bind(el) {
  var i, em, ms;
  var st= el.style, cs= el.currentStyle;

  if (minmax_elements==window.undefined) {
    // initialise when body element has turned up, but only on IE
    if (!document.body || !document.body.currentStyle) return;
    minmax_elements= new Array();
    window.attachEvent('onresize', minmax_delayout);
    // make font size listener
    em= document.createElement('div');
    em.setAttribute('id', 'minmax_em');
    em.style.position= 'absolute'; em.style.visibility= 'hidden';
    em.style.fontSize= 'xx-large'; em.style.height= '5em';
    em.style.top='-5em'; em.style.left= '0';
    if (em.style.setExpression) {
      em.style.setExpression('width', 'minmax_checkFont()');
      document.body.insertBefore(em, document.body.firstChild);
    }
  }

  // transform hyphenated properties the browser has not caught to camelCase
  for (i= minmax_props.length; i-->0;)
    if (cs[minmax_props[i][0]])
      st[minmax_props[i][1]]= cs[minmax_props[i][0]];
  // add element with properties to list, store optimal size values
  for (i= minmax_props.length; i-->0;) {
    ms= cs[minmax_props[i][1]];
    if (ms && ms!='auto' && ms!='none' && ms!='0' && ms!='') {
      st.minmaxWidth= cs.width; st.minmaxHeight= cs.height;
      minmax_elements[minmax_elements.length]= el;
      // will need a layout later
      minmax_delayout();
      break;
  } }
}

// check for font size changes

var minmax_fontsize= 0;
function minmax_checkFont() {
  var fs= document.getElementById('minmax_em').offsetHeight;
  if (minmax_fontsize!=fs && minmax_fontsize!=0)
    minmax_delayout();
  minmax_fontsize= fs;
  return '5em';
}

// Layout. Called after window and font size-change. Go through elements we
// picked out earlier and set their size to the minimum, maximum and optimum,
// choosing whichever is appropriate

// Request re-layout at next available moment
var minmax_delaying= false;
function minmax_delayout() {
  if (minmax_delaying) return;
  minmax_delaying= true;
  window.setTimeout(minmax_layout, 0);
}

function minmax_stopdelaying() {
  minmax_delaying= false;
}

function minmax_layout() {
  window.setTimeout(minmax_stopdelaying, 100);
  var i, el, st, cs, optimal, inrange;
  for (i= minmax_elements.length; i-->0;) {
    el= minmax_elements[i]; st= el.style; cs= el.currentStyle;

    // horizontal size bounding
    st.width= st.minmaxWidth; optimal= el.offsetWidth;
    inrange= true;
    if (inrange && cs.minWidth && cs.minWidth!='0' && cs.minWidth!='auto' && cs.minWidth!='') {
      st.width= cs.minWidth;
      inrange= (el.offsetWidth<optimal);
    }
    if (inrange && cs.maxWidth && cs.maxWidth!='none' && cs.maxWidth!='auto' && cs.maxWidth!='') {
      st.width= cs.maxWidth;
      inrange= (el.offsetWidth>optimal);
    }
    if (inrange) st.width= st.minmaxWidth;

    // vertical size bounding
    st.height= st.minmaxHeight; optimal= el.offsetHeight;
    inrange= true;
    if (inrange && cs.minHeight && cs.minHeight!='0' && cs.minHeight!='auto' && cs.minHeight!='') {
      st.height= cs.minHeight;
      inrange= (el.offsetHeight<optimal);
    }
    if (inrange && cs.maxHeight && cs.maxHeight!='none' && cs.maxHeight!='auto' && cs.maxHeight!='') {
      st.height= cs.maxHeight;
      inrange= (el.offsetHeight>optimal);
    }
    if (inrange) st.height= st.minmaxHeight;
  }
}

// Scanning. Check document every so often until it has finished loading. Do
// nothing until <body> arrives, then call main init. Pass any new elements
// found on each scan to be bound   

var minmax_SCANDELAY= 500;

function minmax_scan() {
  var el;
  for (var i= 0; i<document.all.length; i++) {
    el= document.all[i];
    if (!el.minmax_bound) {
      el.minmax_bound= true;
      minmax_bind(el);
  } }
}

var minmax_scanner;
function minmax_stop() {
  window.clearInterval(minmax_scanner);
  minmax_scan();
}

minmax_scan();
minmax_scanner= window.setInterval(minmax_scan, minmax_SCANDELAY);
window.attachEvent('onload', minmax_stop);

@end @*/



/***********************
       Forms utils 
***********************/

function optionYearPlus2(selectName, selectId, firstValue){		
	currentYear = new Date().getFullYear();
	
	document.write("<select name='"+selectName+"' id='"+selectId+"'>");
        document.write("<option>"+firstValue+"</option>");	
	document.write("<option value='2006'>"+currentYear+"</option>");
	document.write("<option value='2006'>"+(currentYear+1)+"</option>");
	document.write("<option value='2006'>"+(currentYear+2)+"</option>");	
	document.write("</select>");							
}	 

function optionLast90Year(selectName, selectId, firstValue){		
	currentYear = new Date().getFullYear();
	last90 = currentYear-90;
	
	document.write("<select name='"+selectName+"' id='"+selectId+"'>");
        document.write("<option>"+firstValue+"</option>");
	for (var i=currentYear; i>last90; i--) {
		document.write("<option value='"+i+"'>"+i+"</option>");
	}	
	document.write("</select>");	
}	

function optionDRPOpenYear(selectName, selectId, firstValue){		
	currentYear = new Date().getFullYear();
	DRPOpen = 1992;
	document.write("<select name='"+selectName+"' id='"+selectId+"'>");
        document.write("<option>"+firstValue+"</option>");	
	for (var i=currentYear; i>=DRPOpen; i--) {
		document.write("<option value='"+i+"'>"+i+"</option>");
	}	
	document.write("</select>");						
}	 




/***********************
       Footer utils 
***********************/

function findPosX(obj)
{
	var curleft = 0;
	if (obj.offsetParent)
	{
		while (obj.offsetParent)
		{
			curleft += obj.offsetLeft
			obj = obj.offsetParent;
		}
	}
	else if (obj.x)
		curleft += obj.x;
	return curleft;
}


function findPosY(obj)
{
	var curtop = 0;
	if (obj.offsetParent)
	{
		while (obj.offsetParent)
		{
			curtop += obj.offsetTop
			obj = obj.offsetParent;
		}
	}
	else if (obj.y)
		curtop += obj.y;
	return curtop;
}


/* OLD
function ShowHide(id,imgId,dossier){
	if(document.getElementById(id).style.display=="block")
	{
		changestyle(id, "none");
		document.getElementById(imgId).src = ""+dossier+"/"+dossier+"-f-hidden.gif";
	}else{
		changestyle(id, "block");
		document.getElementById(imgId).src = ""+dossier+"/"+dossier+"-f-visble.gif";
	}
}
*/

function ShowHide(id,imgId,path,styleName){
	if(document.getElementById(id).style.display=="block")
	{
		changestyle(id, "none");
		document.getElementById(imgId).src = path+styleName+"-f-hidden.gif";
	}else{
		changestyle(id, "block");
		document.getElementById(imgId).src = path+styleName+"-f-visble.gif";
	}
}


// Fonction gestion investor-relations

function  chooseIndicator(nbItem, currentItem, itemName, itemImage , classLight, classDark){		

	for (var i=1; i<=nbItem; i++){
		if (i == currentItem){
			document.getElementById(itemName+currentItem).className = classLight; 	
			document.getElementById(itemImage+currentItem).style.display = 'block';
		}else{
			document.getElementById(itemName+i).className= classDark; 	
			document.getElementById(itemImage+i).style.display = 'none';			
		}
	}
}

function zoomIndicator(objetImage, status){
	var posX = findPosX(document.getElementById('referentiel'))-100;
	var posY = findPosY(document.getElementById('referentiel'))-50;
	if (status){
		document.getElementById(objetImage).style.position = 'absolute';
		document.getElementById(objetImage).style.left = posX+"px";		
		document.getElementById(objetImage).style.top = posY+"px";			
		document.getElementById(objetImage).className = 'Display';		
	}else{
		document.getElementById(objetImage).className = 'NoDisplay';
	}
}

/***********************
       Browser detection 
***********************/

var BrowserDetect = {
	init: function () {
		this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
		this.version = this.searchVersion(navigator.userAgent)
			|| this.searchVersion(navigator.appVersion)
			|| "an unknown version";
		this.OS = this.searchString(this.dataOS) || "an unknown OS";
	},
	searchString: function (data) {
		for (var i=0;i<data.length;i++)	{
			var dataString = data[i].string;
			var dataProp = data[i].prop;
			this.versionSearchString = data[i].versionSearch || data[i].identity;
			if (dataString) {
				if (dataString.indexOf(data[i].subString) != -1)
					return data[i].identity;
			}
			else if (dataProp)
				return data[i].identity;
		}
	},
	searchVersion: function (dataString) {
		var index = dataString.indexOf(this.versionSearchString);
		if (index == -1) return;
		return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
	},
	dataBrowser: [
		{ 	string: navigator.userAgent,
			subString: "OmniWeb",
			versionSearch: "OmniWeb/",
			identity: "OmniWeb"
		},
		{
			string: navigator.vendor,
			subString: "Apple",
			identity: "Safari"
		},
		{
			prop: window.opera,
			identity: "Opera"
		},
		{
			string: navigator.vendor,
			subString: "iCab",
			identity: "iCab"
		},
		{
			string: navigator.vendor,
			subString: "KDE",
			identity: "Konqueror"
		},
		{
			string: navigator.userAgent,
			subString: "Firefox",
			identity: "Firefox"
		},
		{
			string: navigator.vendor,
			subString: "Camino",
			identity: "Camino"
		},
		{		// for newer Netscapes (6+)
			string: navigator.userAgent,
			subString: "Netscape",
			identity: "Netscape"
		},
		{
			string: navigator.userAgent,
			subString: "MSIE",
			identity: "Explorer",
			versionSearch: "MSIE"
		},
		{
			string: navigator.userAgent,
			subString: "Gecko",
			identity: "Mozilla",
			versionSearch: "rv"
		},
		{ 		// for older Netscapes (4-)
			string: navigator.userAgent,
			subString: "Mozilla",
			identity: "Netscape",
			versionSearch: "Mozilla"
		}
	],
	dataOS : [
		{
			string: navigator.platform,
			subString: "Win",
			identity: "Windows"
		},
		{
			string: navigator.platform,
			subString: "Mac",
			identity: "Mac"
		},
		{
			string: navigator.platform,
			subString: "Linux",
			identity: "Linux"
		}
	]

};
BrowserDetect.init();

function openPrint(dns){
printPage=window.open(document.location.href+'?print', 'print', 'width=540,height=600,scrollbars=yes');
}


function checkPrint(dns){
if(document.location.href.indexOf('?print')!=-1){
document.getElementById('print').href=dns+'print.css';
window.print();
}
}
