function popu(page) {
x=screen.width
y=screen.height
window.open(page,'','width='+x+',height='+y+',top=0,left=0,status=yes,resizable=yes,scrollbars=yes,toolbar=yes,location=yes,menubar=yes');
}
function Linkbrowse (URL,ancho,largo,scro){
scrollmax="No"
if (scro==1){
	scrollmax="Yes";
}
x = (screen.width - ancho) / 2;
y = (screen.height - largo) / 2;
window.open(URL,'',"width="+ancho+",height="+largo+",scrollbars="+scrollmax+",left="+x+",top="+y)
}
function blanktext(){
	document.form1.pwd.value=""
}
function fillSelectFromArray(selectCtrl, itemArray, goodPrompt, badPrompt, defaultItem) {
var i, j;
var prompt;
for (i = selectCtrl.options.length; i >= 0; i--) {
selectCtrl.options[i] = null; 
}
prompt = (itemArray != null) ? goodPrompt : badPrompt;
if (prompt == null) {
j = 0;
}
else {
selectCtrl.options[0] = new Option(prompt);
j = 1;
}
if (itemArray != null) {
for (i = 0; i < itemArray.length; i++) {
selectCtrl.options[j] = new Option(itemArray[i][0]);
if (itemArray[i][1] != null) {
selectCtrl.options[j].value = itemArray[i][1]; 
}
j++;
}
selectCtrl.options[0].selected = true;
   }
}
function pulsar(val)
{	
	var sControl='';
	
	if (document.form1.pwd.value.length < 12) 
	{
		document.form1.pwd.value=document.form1.pwd.value + val;
	}
	else
	{
		alert('Máximo 12 dígitos')
	}
}
function sd_key(CTA,KEY,WT,HG){
x = (screen.width - WT) / 2
y = (screen.height - HG) / 2
   window.open("keyactiva.php?cta=" + CTA + "&keyactiva=" + KEY,'',"width=" + WT + ",height=" + HG + ",scrollbars=YES,left="+x+",top="+y) 
   return false
}
function retry(){
	parent.location="keyactiva.php?view=2"
}
function closewindow(){
	window.close()
}
function blanktext(){
	document.form1.pwd.value=""
}
function pulsar(val)
{	
	var sControl='';
	
	if (document.form1.pwd.value.length < 12) 
	{
		document.form1.pwd.value=document.form1.pwd.value + val;
	}
	else
	{
		alert('Máximo 12 dígitos')
	}
}


var frmTabs = false;
var tabCnt = 0;
	function openTab(tab,nUM)
	{
	frmTabs = document.frmHostMain;
	tabCnt = nUM + 1;
	if(frmTabs)
		{
			frmTabs.oTab.value = tab;
			for(ii=0;ii<tabCnt;ii++){
				if(document.getElementById('tab'+ii)){
					if (ii == tab){
//						document.getElementById('tabMain'+ii).background = "imagenes/mov_bla.gif";
						document.getElementById('tab'+ii).style.display = "";}
					else{
//						document.getElementById('tabMain'+ii).background = "imagenes/mov_cel.gif";
						document.getElementById('tab'+ii).style.display = "none";}
				}
			}
		}
	}



function f_Visible(iIndice,iLongitud,imagen,control,optsel,nhide,numtot)
{
var i=0;
var iNumer_Regis=0
i=parseInt(iIndice)
iNumer_Regis=parseInt(iLongitud)
var cadena=''
var NcountCredito=0
var saldo=0
saldo = parseInt(optsel)
NcountCredito = parseInt(numtot)
//if (document.getElementById(control + "_" + iIndice).style.display=="none")
//{
//var Limite=0
//Limite=parseInt(iIndice) + parseInt(iNumer_Regis) - 1
//for (i=parseInt(iIndice);i<=Limite;i++)
if (saldo==0){
	for (i=parseInt(iIndice);i<=NcountCredito;i++)
	{
	document.getElementById(control + "_" +  i).style.display="block"
	}
	return false;
}
for (i=parseInt(iIndice);i<=NcountCredito;i++)
	{
	if (eval("document.formctacte." + nhide + "_" + i +" .value")==saldo){
	//document.getElementById(control + "_" + i).style.display="block"
	//alert(document.getElementById(control + "_" + i))
		document.getElementById(control + "_" +  i).style.display="block"
		}
		else {
		document.getElementById(control + "_" +  i).style.display="none"
		}
	}
}
function optransf(ivalue,iChange){
	if (ivalue=='BAN'){
	document.getElementById(iChange).disabled=false}
	else {
	document.getElementById(iChange).disabled=true}
}
function sumtransf(iControl,iToti,iSoles,iDolares,itext,iVeri,ipag,iValue,iMoneda){
	var sumtot=0.00
	var txtmoneda="moneda"
	var iFin=0
	var ipreSum=0.00
	var nsumtot=0.00
	var iCtextpag = 0.00
	if (iVeri==1){
		iCtextpag = Number(eval(iControl+ "." + itext + "_" + ipag +".value"))
		if (iCtextpag>iValue){
			alert("El Monto Supera al Saldo o Deuda Total");
			document.getElementById(itext + "_" + ipag).value=""
//			return false;
		}
	}
	if (iMoneda==1){
		var txtMonedavalor=iSoles
	}
	else {
		var txtMonedavalor=iDolares			
	}
		iFin = parseInt(eval(iControl+ "." + iToti + ".value"))
		for (i=1;i<=iFin;i++){
			ipreSum = Number(eval(iControl + "." + itext + "_" + i +" .value"))
			if (eval(iControl + "." + txtmoneda + "_" + i + ".value")==iMoneda){
				nsumtot += ipreSum
			}
		}
		document.getElementById(txtMonedavalor).value=redondear2(nsumtot)
}
function redondear2(num){ 
	var Isubtot
	Isubtot=Math.floor(num)+".";
	var cents=100*(num-Math.floor(num))+0.5;
	Isubtot += Math.floor(cents/10);
	Isubtot += Math.floor(cents%10);
    return Isubtot; 
 } 

function loophide(iNumber,iCtrl,Imax,iName,Inametbox)
{
	if (iNumber<1){
		document.getElementById(iName).value=1	
		iNumber=1;
	}
for (i=1;i<=Imax;i++)
	{
	if (document.getElementById(Inametbox + "_" + i).value<=parseInt(iNumber)){
		document.getElementById(iCtrl+ "_" +  i).style.display="block";
		}
		else {
		document.getElementById(iCtrl + "_" +  i).style.display="none";
		}
		if (iNumber>Imax){
			document.getElementById(iName).value=Imax
//			i=Imax
		}
		if (iNumber<1){
			document.getElementById(iName).value=1
		}
	}
}
function SumMax(Ictrlm,Isum,Itot)
{
	var nA=Number(document.getElementById(Ictrlm).value);
	if (nA>=Itot){
		return;		
	}
	nA = nA + Isum
	document.getElementById(Ictrlm).value=nA
	loophide(nA,'hide',Itot,Ictrlm,'thide');
}
function ResMax(Ictrlm,Isum,Itot)
{
	var nA=Number(document.getElementById(Ictrlm).value);
	if (nA<=1){
		return;		
	}
	nA = nA - Isum
	document.getElementById(Ictrlm).value=nA
	loophide(nA,'hide',Itot,Ictrlm,'thide');
}
function mouseOver(elem,action) {
		if (action == 'to') {
			elem.style.backgroundColor='#7A92B8';
			elem.style.borderStyle='solid';
			elem.style.borderWidth='1px';
			elem.style.color='#ffffff';
			elem.style.borderColor='#F4F4F4';
		} else {
			elem.style.backgroundColor='#364865';
			elem.style.borderStyle='solid';
			elem.style.borderWidth='0px';
			elem.style.borderColor='#364865';
	}
}
function lProceso(i,Page,variable)
{	
	parent.location=Page+"?"+variable+"="+i;
//	parent.location=Page;
}
function lProceso2(i,Page,variable)
{	
	parent.location=Page+"&"+variable+"="+i;
//	parent.location=Page;
}

function checkChoice(field, ii, Control, Otxt, Ohref) {
if (ii>=0) {
		for (i = 0; i < field.length; i++)
			field[i].checked = false;
		}
field[ii].checked = true;
Control.value=field[ii].value;
Ohref.value=Otxt;
}

function iLink(aHref)
{	
	parent.location=aHref;
}
function checkChoice_i(field,Check,vEry,i) {
//eval('document.'+field+'.bgcolor=#FFFFFF');
//document.getElementById(field).style="background-color:#003399";
//document.getElementById(field).bgcolor="#003399";
eval('document.'+ field +'.bgcolor="#003399"');
//	if (a!=1){
//		//eval("document.frmHostMain."+Check+".checked");
//		eval("document.frmHostMain."+Check+".checked=false");
//		return false;
//	}

//		if (document.getElementById(field).style.display=="none"){
//			document.getElementById(field).style.display = "block";
//		}
//		else{
//			document.getElementById(field).style.display = "none";
//		}
}
function habilita_chk(field,i) {
	var a=false
	a=eval("document.frmHostMain.is_matricula_"+i+".checked");
	if (a==true){
		eval("document.frmHostMain.hide_veri_"+i+".value=1");
	}
	else{
		eval("document.frmHostMain.hide_veri_"+i+".value=0");
	}
//	var b=eval("document.frmHostMain.field"+i+".value");
//		for (ii = 0; ii < field.length; ii++)
//			field[ii].checked = false;
//		}
}
function browse_obs(i,Oobs,Ohide,Ocbx,Otr) {
	var a=eval("document.frmHostMain."+Ocbx+i+".checked");
	if (a==false){
		alert("Para utilizar esta opcion primero deberá activar este curso")
		return;
	}
		if (document.getElementById(Otr+i).style.display=="none"){
			document.getElementById(Otr+i).style.display = "block";
		}
		else{
			document.getElementById(Otr+i).style.display = "none";
		}
}
function check_i_cur(i,Ocbx,Otpago,Opago,Otr,Ovalue) {
	var a=eval("document.frmHostMain."+Ocbx+i+".checked");
	if (a==true){
	eval("frmHostMain."+Opago+i+".disabled=false;");
	eval('frmHostMain.'+Opago+i+'.style.backgroundColor="#FFFFFF"');
	eval('frmHostMain.'+Opago+i+'.value="'+Ovalue+'"');
	eval('frmHostMain.'+Opago+i+'.focus()');
	eval("frmHostMain."+Otpago+i+".disabled=false;");
	
	}
	else {
	eval("frmHostMain."+Opago+i+".disabled=true;");
	eval('frmHostMain.'+Opago+i+'.style.backgroundColor="#E4E4E4"');
	eval('frmHostMain.'+Opago+i+'.value=""');
	eval("frmHostMain."+Otpago+i+".disabled=true;");
	document.getElementById(Otr+i).style.display = "none";
	}
}
function change_tpago(i,Otr,Oselect) {
	var a=eval("document.frmHostMain."+Oselect+i+".value");
	if (a==1){
		document.getElementById(Otr+i).style.display = "none";
	}
	else{
		document.getElementById(Otr+i).style.display = "block";
	}
}
 function putFocus(formInst, elementInst) {
  if (document.forms.length > 0) {
   document.forms[formInst].elements[elementInst].focus();
  }
 }
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
function iscampana(form){
	fcam=form1.campana.value;
	xdiv = document.getElementById("txtclave");
	xcla = document.getElementById("lc_clave");	
	if (fcam<=2009){
		form1.clave.value="Vacio";
		form1.clave.style.visibility="hidden";
		xdiv.style.display='none';
		xcla.style.display='none';
	}
	else {
		form1.clave.value="";
		form1.clave.style.visibility="visible";
		xdiv.style.display='';
		xcla.style.display='';
	}
}
function importacons(){
	var msgfin=confirm("¡IMPORTACIÓN DEL SISTEMA DE CONSULTAS!\n La extracción de consultas es de aquellas finalizadas y un puntaje mayor ó igual a 4 \n\n ¿Desea Continuar?")
	if (msgfin) {
	location.href='?type=2';
	}		
}