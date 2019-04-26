var xmlHttp

function showUser1(str)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="report_search_query.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged1 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}
function stateChanged1() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("txtHint1").innerHTML=xmlHttp.responseText 
 } 
}


function showUser2(str)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="report_search_query.php"
url=url+"?r="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged2 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}
function stateChanged2() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("txtHint2").innerHTML=xmlHttp.responseText 
 } 
}


function showUser3(str)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="report_search_query.php"
url=url+"?s="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged3 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}
function stateChanged3() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("txtHint3").innerHTML=xmlHttp.responseText 
 } 
}


function showUser4(str)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="report_search_query.php"
url=url+"?t="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged4 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}
function stateChanged4() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("txtHint4").innerHTML=xmlHttp.responseText 
 } 
}


function showUser5(str)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="report_search_query.php"
url=url+"?u="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged5 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}
function stateChanged5() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("txtHint5").innerHTML=xmlHttp.responseText 
 } 
}


function showUser6(str)
{ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
 {
 alert ("Browser does not support HTTP Request")
 return
 }
var url="report_search_query.php"
url=url+"?v="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged6 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}
function stateChanged6() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("txtHint6").innerHTML=xmlHttp.responseText 
 } 
}



function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("txtHint").innerHTML=xmlHttp.responseText 
 } 
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 //Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}

