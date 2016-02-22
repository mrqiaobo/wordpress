/*
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

Copyright (c) 2004 Walt Disney Internet Group.  All Rights Reserved.

$Workfile: global.js $
$Author: Rwong $
$Revision: 6 $
$Date: 4/26/05 11:47a $

$Revised By: DSanderson $
$Revision Date: 5/17/06 1:55P $

~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/

function popup(url,name,features){
		var w;
		w=window.open(url,name,features);
		w.focus();
}

function safeOnload(funcName) {
	var winOnLoad = window.onload;
	if (typeof window.onload != 'function') {
		window.onload = funcName;
	} else {
		window.onload = function() {
			winOnLoad();
			funcName();
		}
	}
}

function countItems (item)  {
	i = 0;
	while (this.getElements(item + i)) {
		i=i+1;
	}
	return i;
}

function getElements(itemId)  {
	if (document.getElementById) {
	    objValue = document.getElementById([itemId]);
	}
	return objValue;
}

function addEvent (objTarget, strType, objFunction)  {
	if ( objTarget.addEventListener ) {
		objTarget.addEventListener(strType, objFunction, true);
		return true;
	} else if ( objTarget.attachEvent ) {
		var bResult = objTarget.attachEvent('on' + strType, objFunction);
		return bResult;
	} else {
		return false;
	}
}

Function.prototype.bind = function(object) { 
	var __method = this; 
    return function(event) { 
    	return __method.call(object, event || window.event);
	}
}

function toggleDiv(divId){
     var div = document.getElementById(divId);
     if (div.className == null || div.className == '') {
            div.className = 'hide';
     } else {
            div.className  = '';
     }
}

/********************************************
 This is part of the workaround for the new
 Internet Explorer Flash Update
*********************************************/
function writeFlash(mediaHTML) {
	document.write(mediaHTML);

}

//////////////////////////////////////////////
//Experience Tab Control Start
collapseExpTab = function() {
	//Setting height by adding a class to the element has no effect on IE6.
	//Therefore height is declared here.
	YAHOO.util.Dom.setStyle('exp', 'height', '126px');
}

expandExpTab = function() {
	YAHOO.util.Dom.setStyle('exp', 'height', '354px');
}
//Experience Tab Control End
//////////////////////////////////////////////

//////////////////////////////////////////////
//image toggle Start
//img is an image element
imgOver = function(img) {
	img.src = img.src.replace('/off/', '/on/');
}

//img is an image element
imgOut = function(img) {
	img.src = img.src.replace('/on/', '/off/');
}

//image toggle End
//////////////////////////////////////////////


// WDPRO  Start
/*
WDPRO_LOADER.require("wdprodom"); 
WDPRO_LOADER.require("event"); 
WDPRO_LOADER.addCallback( 
	function() { 
		var $D = WDPRO.util.Dom; 
		var $E = YAHOO.util.Event; 
		var isIE6 = (YAHOO.env.ua.ie > 5 && YAHOO.env.ua.ie < 7);

//////////////////////////////////////////////
		// Global Nav Menus
		
		if (isIE6) {
			var shim = document.createElement("iframe");
			shim.src = 'javascript:false;document.write("");'; 
			$D.setStyle(shim, 'position', 'absolute');
			$D.setXY(shim, [0,0]);
			$D.setStyle(shim, 'display', 'none');
			$D.setStyle(shim, 'border', 'none');
			$D.setStyle(shim, 'padding', '0');
			$D.setStyle(shim, 'margin', '0');
		}

		var menus = $D.getElementsByClassName("globalNavMenu", "div", "globalNav");

		var menuLists = $D.getElementsByClassName("menuList", "ul", "globalNav");
		
		// Pre-load background images of menus
		var imgArray = new Array();
		for (i=0;i<menuLists.length;i++) {
			var headDiv = menuLists[i].getElementsByTagName("div")[0];
			imgArray[i] = new Image();
			var strBackgroundImage = $D.getStyle(headDiv, "backgroundImage");
			strBackgroundImage = strBackgroundImage.replace('url(','');
			strBackgroundImage = strBackgroundImage.replace(')','');
			imgArray[i].src = strBackgroundImage;
		}

		var hideMenuLists = function() {
			$D.setStyle(menuLists, 'display', 'none');
			$D.removeClass(menus, 'active');
			if (isIE6) {
				$D.setStyle(shim, 'display', 'none');
			}
		}

		var showSubMenu = function(el) {
			//hideMenuLists();
			$D.removeClass(menus, 'active');
			$D.addClass(el, 'active');
			var lists = el.getElementsByTagName("ul");
			if (lists.length != 0) {
				var list = lists[0];
				$D.setStyle(list, 'display', 'block');
				if (isIE6) {
					$D.insertAfter(shim, list);
					$D.setStyle(shim, 'height', $D.getHeight(list));
					$D.setStyle(shim, 'width', $D.getWidth(list));
					$D.setStyle(shim, 'display', 'block');
					$D.setXY(shim, $D.getXY(list));
				}
			}
		}

		$E.addListener(
				menus
				, "mouseover"
				, function(ev) {
					var elTarget = $E.getTarget(ev); 
					if ($D.hasClass(elTarget, "globalNavMenu")) { 
						showSubMenu(elTarget);
					}
					else {
						showSubMenu($D.getAncestorByClassName(elTarget, "globalNavMenu"));
					}
				}
		);

		$E.addListener(menus, "mouseout", function() {
			//alert("hiding menu lists");
			hideMenuLists();
		});

		hideMenuLists();
//////////////////////////////////////////////


//////////////////////////////////////////////
//exp expand Start

function expandRecExpDiv() {
	var strHeight = '336px';
	if ($D.hasClass('contentWrapper','narrow')) {
		strHeight = '260px';
	}
	$D.setStyle("exp","height",strHeight);
}

function shrinkRecExpDiv() {
	var strHeight = '126px';
	if ($D.hasClass('contentWrapper','narrow')) {
		strHeight = '60px';
	}
	$D.setStyle("exp","height",strHeight);
}

$E.addListener("exp","mouseover",expandRecExpDiv);
$E.addListener("exp","mouseout",shrinkRecExpDiv);

//exp expand End
//////////////////////////////////////////////

	} // WDPRO_LOADER.addCallback function() End
); 
// WDPRO  End
*/
function openParkMap(webRoot, attname) {
		popup(webRoot + 'general/popup?name=ExplorerParkMapPage&showplace=' + attname,'parkmapwin','width=720,height=652,toolbar=no,scrollbars=no,menubar=no,status=no,location=yes,resizable=no');   	
}

function openwindow(openURL) {
	popup(openURL,'newwin','width=800,height=600,toolbar=yes,scrollbars=yes,menubar=yes,status=yes,location=yes,resizable=yes');   	
}

function changebackwin(url) {
	if (opener && !opener.closed) {
		opener.location.href = url;
		opener.focus();
	}
	else {
		popup(url,'homewin','top=0, left=0,width=800,height=600,toolbar=yes,location=yes,menubar=yes,scrollbars=yes,status=yes,resizable=yes');  
	}
	return;
}

// IE 6 flickering background fix
try {
  document.execCommand("BackgroundImageCache", false, true);
} catch(err) {}

  function showContent(showDiv) {
    if (showDiv!='') {
          removeDiv1 = 'careerApply2';
          removeDiv2 = 'careerApply3';
          removeDiv3 = 'careerApply4';
      if (showDiv== 'careerApply1' ) {
          removeDiv1 = 'careerApply2';
          removeDiv2 = 'careerApply3';
          removeDiv3 = 'careerApply4';
     } else  if (showDiv== 'careerApply2' ) {
          removeDiv1 = 'careerApply1';
          removeDiv2 = 'careerApply3';
          removeDiv3 = 'careerApply4';
     } else  if (showDiv== 'careerApply3' ) {
          removeDiv1 = 'careerApply1';
          removeDiv2 = 'careerApply2';
          removeDiv3 = 'careerApply4';
     } else  if (showDiv== 'careerApply4' ) {
          removeDiv1 = 'careerApply1';
          removeDiv2 = 'careerApply2';
          removeDiv3 = 'careerApply3';
      }
      document.getElementById(showDiv).style.display='block';
      document.getElementById(removeDiv1).style.display='none';
      document.getElementById(removeDiv2).style.display='none';
      document.getElementById(removeDiv3).style.display='none';
    }
  }

  $(document).ready(function()
	{
	  $("a.blank").click(function () {
	    var strCallUri = "";
	    strCallUri = $(this).attr('href');
	    window.open(strCallUri, '_blank');
	    return false;
	  });
	  
	});