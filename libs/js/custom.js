//-------------------------------------------------------------------
function _(id_el){
	return document.getElementById(id_el);
}
String.prototype.trim=function(){return this.replace(/^\s+|\s+$/g, '');};
String.prototype.ltrim=function(){return this.replace(/^\s+/,'');};
String.prototype.rtrim=function(){return this.replace(/\s+$/,'');};
String.prototype.fulltrim=function(){return this.replace(/(?:(?:^|\n)\s+|\s+(?:$|\n))/g,'').replace(/\s+/g,' ');};
String.prototype.rplcapostrophe=function(){return this.replace(/'/g, "[|*apstrf*|]");};
String.prototype.restoreapostrophe=function(){return this.replace("[|*apstrf*|]", "'");};
String.prototype.totitlecase=function(){return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});};

function checkfile(inputcontainer, id_element, limitsize, formatfilenya){
	var file = _(id_element).files[0];
	var filename = file.name;
	var filesize = file.size;
	var fileextension=filename.split('.').pop();
	var isiinputcontainer='<input type="file" name="'+id_element+'" id="'+id_element+'" onchange="checkfile(\''+inputcontainer+'\',\''+id_element+'\',\''+limitsize+'\',\''+formatfilenya+'\')" required/>';
    if (file){		
		if (filesize >limitsize){
			_(inputcontainer).innerHTML=isiinputcontainer;
			if(limitsize>=1024000){
					var batas=Math.round(limitsize/1024000);
					var satuan=' MB';						
			}
			if(limitsize<1024000){
					var batas=Math.round(limitsize/1024);
					var satuan=' KB';						
			}
			alert ("Tidak Bisa dilanjutkan. File anda lebih dari "+batas+satuan);
			return false;
		}
		if(formatfilenya!=""){
			if(fileextension!=formatfilenya){
				_(inputcontainer).innerHTML=isiinputcontainer;
				alert ("Tidak Bisa dilanjutkan. format file tidak ."+formatfilenya);
				return false;
			}
		}
		//return false;
    }
}
function validationinputTA(){
	var judulTA = _("fieldjudulTA").value;
	var kategoriTA = _("fieldkategoriTA").value;
	var abstrakTA = _("fieldabstrakTA").value;
	var file1 = _("fileTA").files[0];
	var file2 = _("fileBeritaSeminar").files[0];
	var file3 = _("fileBeritaSidang").files[0];
	//var file = _("fileTA").value;
	var validasi = 1;
	if (judulTA==""){
		//_("divfieldjudulTA").className =_("divfieldjudulTA").className + " has-error";	bisa juga
		_("divfieldjudulTA").classList.add("has-error");
		validasi = 0;}
	else{//_("divfieldjudulTA").className =_("divfieldjudulTA").className - " has-error";	bisa juga
		_("divfieldjudulTA").classList.remove("has-error");}	
	
	if (abstrakTA==""){
		_("divfieldabstrakTA").classList.add("has-error");
		validasi = 0;}
	else{_("divfieldabstrakTA").classList.remove("has-error");}
	
	if (!file1){
		_("divgroupinputfileTA").classList.add("has-error");
		validasi = 0;}
	else{_("divgroupinputfileTA").classList.remove("has-error");}
	if (!file2){
		_("divgroupinputfileBeritaSeminar").classList.add("has-error");
		validasi = 0;}
	else{_("divgroupinputfileBeritaSeminar").classList.remove("has-error");}
	if (!file3){
		_("divgroupinputfileBeritaSidang").classList.add("has-error");
		validasi = 0;}
	else{_("divgroupinputfileBeritaSidang").classList.remove("has-error");}
	
	if(validasi==0){alert("lengkapi form");}
	return validasi;
}
//-----------------------------------------------------------------------------------------------------Upload TA
function uploadTA(){
	if (validationinputTA()==1){
		var judulTA = _("fieldjudulTA").value;
		var kategoriTA = _("fieldkategoriTA").value;
		var abstrakTA = _("fieldabstrakTA").value;
		var file1 = _("fileTA").files[0];
		var file2 = _("fileBeritaSeminar").files[0];
		var file3 = _("fileBeritaSidang").files[0];
		// alert(file.name+" | "+file.size+" | "+file.type);
		var formdata = new FormData();
		formdata.append("judulTA", judulTA);
		formdata.append("kategoriTA", kategoriTA);
		formdata.append("abstrakTA", abstrakTA);
		formdata.append("fileTA", file1);
		formdata.append("fileBeritaSeminar", file2);
		formdata.append("fileBeritaSidang", file3);
		var ajax = new XMLHttpRequest();
		ajax.upload.addEventListener("progress", progressHandler, false);
		ajax.addEventListener("load", completeHandler, false);
		ajax.addEventListener("error", errorHandler, false);
		ajax.addEventListener("abort", abortHandler, false);
		ajax.open("POST", "models/ajax_action.php?op=upload_TA");	
		ajax.send(formdata);
	}
	return false;
}
function progressHandler(event){
	_("body_panel_TA").innerHTML='<p class="help-block" id="loaded_n_total"></p>\
		<progress id="progressBar" value="0" max="100" style="width:300px;"></progress>\
		<h3 id="status"></h3>';
	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	if(Math.round(percent)==100){_("status").innerHTML = "Jangan ditutup, sedang menggabungkan data...";}
	else{_("status").innerHTML = "Sedang mengunggah, "+Math.round(percent)+"% terunggah... harap menunggu";}
}
function completeHandler(event){_("status").innerHTML = event.target.responseText;_("progressBar").value = 0;}
function errorHandler(event){_("status").innerHTML = "Upload Failed";}
function abortHandler(event){_("status").innerHTML = "Upload Aborted";}
//function testfunction(){_("body_panel_TA").innerHTML="test function sukses.!";}

function updateTA(){
	var judulTA = _("fieldjudulTA").value;
	var kategoriTA = _("fieldkategoriTA").value;
	var abstrakTA = _("fieldabstrakTA").value;
	var file1 = _("fileTA").files[0];
	var file2 = _("fileBeritaSeminar").files[0];
	var file3 = _("fileBeritaSidang").files[0];
	// alert(file.name+" | "+file.size+" | "+file.type);
	var formdata = new FormData();
	formdata.append("judulTA", judulTA);
	formdata.append("kategoriTA", kategoriTA);
	formdata.append("abstrakTA", abstrakTA);
	formdata.append("fileTA", file1);
	formdata.append("fileBeritaSeminar", file2);
	formdata.append("fileBeritaSidang", file3);
	var ajax = new XMLHttpRequest();
	ajax.upload.addEventListener("progress", progressHandlerupdateTA, false);
	ajax.addEventListener("load", completeHandlerupdateTA, false);
	ajax.open("POST", "models/ajax_action.php?op=update_TA");	
	ajax.send(formdata);
}
function progressHandlerupdateTA(event){
	_("body_panel_TA").innerHTML='<p class="help-block" id="loaded_n_total"></p>\
		<progress id="progressBar" value="0" max="100" style="width:300px;"></progress>\
		<h3 id="status"></h3>';
	_("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	if(Math.round(percent)==100){_("status").innerHTML = "Jangan ditutup, sedang menggabungkan data...";}
	else{_("status").innerHTML = "Sedang mengunggah, "+Math.round(percent)+"% terunggah... harap menunggu";}
}
function completeHandlerupdateTA(event){_("status").innerHTML = event.target.responseText;_("progressBar").value = 0;}

//---------------------------------------------------------------
//CONFIRM YES
function confirmyes(functionname, par2){
	var fn = window[functionname];
	if (typeof fn === "function"){
		fn(par2);
	}
}
//-----------------------------------------------------------------------------------------------------Hapus TA
function hapusTAmahasiswa(idmahasiswa){
	//alert(idmahasiswa);
	var box_content='<div id="overlay"></div>';
	box_content=box_content+'<div id="box_frame1" class="row"><div class="col-md-6 col-md-offset-3"><img src="images/loading.gif"/></div></div>';
	_("dynamic").innerHTML=box_content;
	ajax = new XMLHttpRequest();
	ajax.addEventListener("load", completeHandler, false);
	ajax.open("GET", "models/ajax_action.php?op=deleteTAmahasiswa&BP="+idmahasiswa);
	ajax.send();
	window.location.href = '?route=mypanel';
}
//-----------------------------------------------------------------------------------------------------Minta Sidang TA
function mintasidangTA(idmahasiswa){
	var box_content='<div id="overlay"></div>';
	box_content=box_content+'<div id="box_frame1" class="row"><div class="col-md-6 col-md-offset-3"><img src="images/loading.gif"/></div></div>';
	_("dynamic").innerHTML=box_content;
	ajax = new XMLHttpRequest();
	ajax.addEventListener("load", completeHandler, false);
	ajax.open("GET", "models/ajax_action.php?op=mintasidangTA&bpmahasiswa="+idmahasiswa);
	ajax.send();
	window.location.href = '?route=mypanel';
}
//-----------------------------------------------------------------------------------------------------Registrasi MHS
function validationregistrasiMhs(){
	var BP = _("BP").value.trim().rplcapostrophe();
	var namamhs = _("namamhs").value.trim().rplcapostrophe();
	var emailmhs = _("emailmhs").value.trim().rplcapostrophe();
	var passlogin = _("passlogin").value.trim().rplcapostrophe();
	var repasslogin = _("repasslogin").value.trim().rplcapostrophe();
	var file1 = _("fileTranskrip").files[0];
	var file2 = _("fileKRS").files[0];
	var file3 = _("filePembimbing").files[0];
	var file4 = _("fileKTM").files[0];
	var validasi = 1;
	if (BP==""){
		_("divfieldBP").classList.add("has-error");
		validasi = 0;}
	else{
		_("divfieldBP").classList.remove("has-error");}
	if (namamhs==""){
		_("divfieldnamamhs").classList.add("has-error");
		validasi = 0;}
	else{_("divfieldnamamhs").classList.remove("has-error");}
	if (emailmhs==""){
		_("divfieldemailmhs").classList.add("has-error");
		validasi = 0;}
	else{_("divfieldemailmhs").classList.remove("has-error");}		
	if (passlogin==""){
		_("divfieldpasslogin").classList.add("has-error");
		validasi = 0;}
	else{_("divfieldpasslogin").classList.remove("has-error");}	
	if (repasslogin==""){
		_("divfieldrepasslogin").classList.add("has-error");
		validasi = 0;}
	else{_("divfieldrepasslogin").classList.remove("has-error");}	
	if (!file1){
		_("divgroupfileTranskrip").classList.add("has-error");
		validasi = 0;}
	else{_("divgroupfileTranskrip").classList.remove("has-error");}
	if (!file2){
		_("divgroupfileKRS").classList.add("has-error");
		validasi = 0;}
	else{_("divgroupfileKRS").classList.remove("has-error");}
	if (!file3){
		_("divgroupfilePembimbing").classList.add("has-error");
		validasi = 0;}
	else{_("divgroupfilePembimbing").classList.remove("has-error");}
	if (!file4){
		_("divgroupfileKTM").classList.add("has-error");
		validasi = 0;}
	else{_("divgroupfileKTM").classList.remove("has-error");}
	if ((passlogin!="")&&(repasslogin!="")){
		if(passlogin!=repasslogin){
			validasi=0;
			_("divfieldpasslogin").classList.add("has-error");
			_("divfieldrepasslogin").classList.add("has-error");
			_("ketpassword").innerHTML="Password dan konfirmasi password tidak cocok.";
		}
	}	
	if(validasi==0){alert("lengkapi form");}
	return validasi;
}
function registrasiMhs(){
	if(validationregistrasiMhs()==1)
	{
		var box_content='<div id="overlay"></div>';
		box_content=box_content+'<div id="box_frame1" class="row"><div class="col-md-6 col-md-offset-3"><img src="images/loading.gif"/></div></div>';
		_("dynamic").innerHTML=box_content;
		var ajax = new XMLHttpRequest();
		ajax.addEventListener("load", completeCheckRegMhs, false);
		ajax.open("GET", "models/ajax_registrasiTAmhs.php?op=checkBP&BP="+_("BP").value.trim().rplcapostrophe());	
		ajax.send();
	}
function completeCheckRegMhs(event){
	//alert(event.target.responseText);
	if(event.target.responseText==2){_("dynamic").innerHTML="";
	alert("BP ini sudah terdaftar. Hubungin Admin untuk pengaduan penyalah gunaan.");
	}
	if(event.target.responseText==1){_("dynamic").innerHTML="";
	alert("Mohon bersabar admin sedang bekerja, BP ini sudah masuk dalam daftar antrian pendaftaran.");
	}
	if(event.target.responseText==0){
		var BP = _("BP").value.trim().rplcapostrophe();
		var namamhs = _("namamhs").value.trim().totitlecase().rplcapostrophe();
		var emailmhs = _("emailmhs").value.trim().rplcapostrophe();
		var passlogin = _("passlogin").value.trim().rplcapostrophe();
		var file1 = _("fileTranskrip").files[0];
		var file2 = _("fileKRS").files[0];
		var file3 = _("filePembimbing").files[0];
		var file4 = _("fileKTM").files[0];
		var formdata = new FormData();
		formdata.append("BP", BP);
		formdata.append("namamhs", namamhs);
		formdata.append("emailmhs", emailmhs);
		formdata.append("passlogin", passlogin);
		formdata.append("fileTranskrip", file1);
		formdata.append("fileKRS", file2);
		formdata.append("filePembimbing", file3);
		formdata.append("fileKTM", file4);
		var ajax = new XMLHttpRequest();
		ajax.upload.addEventListener("progress", progressHandlerRegMhs, false);
		ajax.addEventListener("load", completeHandlerRegMhs, false);
		ajax.addEventListener("error", errorHandlerRegMhs, false);
		ajax.addEventListener("abort", abortHandlerRegMhs, false);
		ajax.open("POST", "models/ajax_registrasiTAmhs.php?op=registrasiMhs");	
		ajax.send(formdata);
	}
}
function progressHandlerRegMhs(event){
	var box_content='<div id="overlay"></div>';
	box_content=box_content+'<div id="box_frameLoadProgress" class="row"><div class="col-md-4 col-md-offset-4">\
		<progress id="progressBar" value="0" max="100" style="width:300px;"></progress>\
		<h3 id="status"></h3></div></div>';
	_("dynamic").innerHTML=box_content;
	var percent = (event.loaded / event.total) * 100;
	_("progressBar").value = Math.round(percent);
	if(Math.round(percent)==100){_("status").innerHTML = "Jangan ditutup, sedang menggabungkan data...";}
	else{_("status").innerHTML = "Sedang mengunggah, "+Math.round(percent)+"% terunggah... harap menunggu";}
}
function completeHandlerRegMhs(event){window.location.href = 'index.php';}
function errorHandlerRegMhs(event){_("status").innerHTML = "Upload Failed. Close this Window";}
function abortHandlerRegMhs(event){_("status").innerHTML = "Upload Aborted. Close this Window";}
}
//-----------------------------------------------------------------------------------------------------Detail pendaftaran
function detailPendaftaranMhs(BP, event){
	var box_content_loading='<div id="overlaysubpanel"></div>';
	box_content_loading=box_content_loading+'<div id="subpanelcontainer" class="container">\
							<div class="row">\
								<div class="col-md-8 col-md-offset-2" id="subpanelcontent" style="height:400px;background:black;box-shadow:0 0 50px #999;">\
									<div class="row"><div class="col-md-11 col-md-offset-1"><img src="images/loading.gif"/></div></div>\
								</div>\
							</div>\
							</div>';
	_("subpanel").innerHTML=box_content_loading;
	ajax = new XMLHttpRequest();
	ajax.addEventListener("load", completeHandlerLhtDetail, false);
	ajax.open("GET", "models/ajax_tabelRegistrasiTAmhs.php?op=lihatDetail&BP="+BP);
	ajax.send();
	event.preventDefault();
}
function completeHandlerLhtDetail(event){
	var dtl=event.target.responseText.split('|*~');
	//alert (event.target.responseText);
	var linktranskrip='<a href="documents/pendaftaranMhs/transkrip/'+dtl[4]+'" target="_blank" class="btn btn-success btn-xs margin" download="transkrip_'+dtl[4]+'"><span class="glyphicon glyphicon-circle-arrow-down"></span> Download</a>';
	var linkKRS='<a href="documents/pendaftaranMhs/krs/'+dtl[5]+'" target="_blank"  class="btn btn-success btn-xs margin" download="krs_'+dtl[5]+'"><span class="glyphicon glyphicon-circle-arrow-down"></span> Download</a>';
	var linkSPDP='<a href="documents/pendaftaranMhs/spdp/'+dtl[6]+'" target="_blank" class="btn btn-success btn-xs margin" download="spdp_'+dtl[6]+'"><span class="glyphicon glyphicon-circle-arrow-down"></span> Download</a>';
	var linkKTM='<a href="documents/pendaftaranMhs/ktm/'+dtl[7]+'" target="_blank" class="btn btn-success btn-xs margin" download="ktm_'+dtl[7]+'"><span class="glyphicon glyphicon-circle-arrow-down"></span> Download</a>';
	var box_content='<div id="overlaysubpanel"></div>';
	box_content=box_content+'<div id="subpanelcontainer" class="container">\
							<div class="row">\
								<div class="col-md-8 col-md-offset-2" id="subpanelcontent" style="height:400px;">\
									<div class="row-margin-top">\
										<table  border=1; style="color:black;width:100%;">\
											<tr><td> <h4 style="color:black;">BP</h4> </td> <td>'+dtl[0]+'</td> </tr>\
											<tr><td> <h4 style="color:black;">Nama</h4> </td> <td>'+dtl[1].rplcapostrophe()+'</td> </tr>\
											<tr><td> <h4 style="color:black;">Password</h4> </td> <td>'+dtl[2]+'</td> </tr>\
											<tr><td> <h4 style="color:black;">email</h4> </td> <td>'+dtl[3]+'</td> </tr>\
											<tr><td> <h4 style="color:black;">Transkrip</h4> </td> <td>'+linktranskrip+'</td> </tr>\
											<tr><td> <h4 style="color:black;">Kartu Rencana Studi</h4> </td> <td>'+linkKRS+'</td> </tr>\
											<tr><td> <h4 style="color:black;">Surat Penunjuk Dosen Pembimbing</h4> </td> <td>'+linkSPDP+'</td> </tr>\
											<tr><td> <h4 style="color:black;">Kartu Tanda Mahasiswa</h4> </td> <td>'+linkKTM+'</td> </tr>\
											<tr><td> <h4 style="color:black;">Tanggal Mendaftar</h4> </td> <td>'+dtl[8]+'</td> </tr>\
										</table>\
									</div>\
									<div id="subpanel_close_detailPendaftaran" class="subpanel_close">Close</div>\
								</div>\
							</div>\
							</div>';	
	_("subpanel").innerHTML=box_content;
	document.getElementById("subpanel_close_detailPendaftaran").onclick=function(){document.getElementById("subpanel").innerHTML="";if(dtl[9]==1){notifRegMhs();}};
}
function setujuiRegistrasiMhs(idmahasiswa){
	_("setujubtn").disabled = true;
	var box_content='<div id="overlay"></div>';
	box_content=box_content+'<div id="box_frame1" class="row"><div class="col-md-6 col-md-offset-3"><img src="images/loading.gif"/></div></div>';
	_("dynamic").innerHTML=box_content;
	ajax = new XMLHttpRequest();
	ajax.addEventListener("load", completeHandlersetujuiRegistrasiMhs, false);
	ajax.open("GET", "models/ajax_tabelRegistrasiTAmhs.php?op=setujuiRegistrasiMhs&BP="+idmahasiswa);
	ajax.send();
	function completeHandlersetujuiRegistrasiMhs(event){_("dynamic").innerHTML="";window.location.href = '?route=mypanel&action=lihatregistrasimhs';}
}

function batalSetujuRegistrasiMhs(idmahasiswa){
	_("tlksetujubtn").disabled = true;
	var box_content='<div id="overlay"></div>';
	box_content=box_content+'<div id="box_frame1" class="row"><div class="col-md-6 col-md-offset-3"><img src="images/loading.gif"/></div></div>';
	_("dynamic").innerHTML=box_content;
	ajax = new XMLHttpRequest();
	ajax.addEventListener("load", completeHandlersetujuiRegistrasiMhs, false);
	ajax.open("GET", "models/ajax_tabelRegistrasiTAmhs.php?op=batalSetujuRegistrasiMhs&BP="+idmahasiswa);
	ajax.send();
	function completeHandlersetujuiRegistrasiMhs(event){_("dynamic").innerHTML="";window.location.href = '?route=mypanel&action=lihatregistrasimhs';}
}
function hapusPendaftaranRegistrasiMhs(idmahasiswa){
	var box_content='<div id="overlay"></div>';
	box_content=box_content+'<div id="box_frame1" class="row"><div class="col-md-6 col-md-offset-3"><img src="images/loading.gif"/></div></div>';
	_("dynamic").innerHTML=box_content;
	ajax = new XMLHttpRequest();
	ajax.addEventListener("load", completeHandlersetujuiRegistrasiMhs, false);
	ajax.open("GET", "models/ajax_tabelRegistrasiTAmhs.php?op=hapusPendaftaranRegistrasiMhs&BP="+idmahasiswa);
	ajax.send();
	function completeHandlersetujuiRegistrasiMhs(event){window.location.href = '?route=mypanel&action=lihatregistrasimhs';}
}
//-----------------------------------------------------------------------------------------------------Akun Mahasiswa

function matikanAkunMhs(idmahasiswa){
	var box_content='<div id="overlay"></div>';
	box_content=box_content+'<div id="box_frame1" class="row"><div class="col-md-6 col-md-offset-3"><img src="images/loading.gif"/></div></div>';
	_("dynamic").innerHTML=box_content;
	ajax = new XMLHttpRequest();
	ajax.addEventListener("load", completeHandlermatikanAkunMhs, false);
	ajax.open("GET", "models/ajax_registrasiTAmhs.php?op=matikanAkunMhs&BP="+idmahasiswa);
	ajax.send();
	function completeHandlermatikanAkunMhs(event){window.location.href = '?route=mypanel&action=controlakunmhs';}
}
function aktifkanAkunMhs(idmahasiswa){
	var box_content='<div id="overlay"></div>';
	box_content=box_content+'<div id="box_frame1" class="row"><div class="col-md-6 col-md-offset-3"><img src="images/loading.gif"/></div></div>';
	_("dynamic").innerHTML=box_content;
	ajax = new XMLHttpRequest();
	ajax.addEventListener("load", completeHandleraktifkanAkunMhs, false);
	ajax.open("GET", "models/ajax_registrasiTAmhs.php?op=aktifkanAkunMhs&BP="+idmahasiswa);
	ajax.send();
	function completeHandleraktifkanAkunMhs(event){window.location.href = '?route=mypanel&action=controlakunmhs';}
}
//-----------------------------------------------------------------------------------------------------File TA
function aktifkanFileTA(idmahasiswa){
	var box_content='<div id="overlay"></div>';
	box_content=box_content+'<div id="box_frame1" class="row"><div class="col-md-6 col-md-offset-3"><img src="images/loading.gif"/></div></div>';
	_("dynamic").innerHTML=box_content;
	ajax = new XMLHttpRequest();
	ajax.addEventListener("load", completeHandleraktifkanFileTA, false);
	ajax.open("GET", "models/ajax_fileTA.php?op=aktifkanFileTA&BP="+idmahasiswa);
	ajax.send();
	function completeHandleraktifkanFileTA(event){window.location.href = '?route=mypanel&action=controlfileta';}
}
function matikanFileTA(idmahasiswa){
	var box_content='<div id="overlay"></div>';
	box_content=box_content+'<div id="box_frame1" class="row"><div class="col-md-6 col-md-offset-3"><img src="images/loading.gif"/></div></div>';
	_("dynamic").innerHTML=box_content;
	ajax = new XMLHttpRequest();
	ajax.addEventListener("load", completeHandleraktifkanFileTA, false);
	ajax.open("GET", "models/ajax_fileTA.php?op=matikanFileTA&BP="+idmahasiswa);
	ajax.send();
	function completeHandleraktifkanFileTA(event){window.location.href = '?route=mypanel&action=controlfileta';}
}
function detailFileTA(BP, event){
	var box_content_loading='<div id="overlaysubpanel"></div>';
	box_content_loading=box_content_loading+'<div id="subpanelcontainer" class="container">\
							<div class="row">\
								<div class="col-md-8 col-md-offset-2" id="subpanelcontent" style="height:400px;background:black;box-shadow:0 0 50px #999;">\
									<div class="row"><div class="col-md-11 col-md-offset-1"><img src="images/loading.gif"/></div></div>\
								</div>\
							</div>\
							</div>';
	_("subpanel").innerHTML=box_content_loading;
	ajax = new XMLHttpRequest();
	ajax.addEventListener("load", completeHandlerdetailFileTA, false);
	ajax.open("GET", "models/ajax_fileTA.php?op=lihatDetail&BP="+BP);
	ajax.send();
	event.preventDefault();
}
function completeHandlerdetailFileTA(event){
	var dtl=event.target.responseText.split('|*~');
	var linkTA='<a href="documents/tugas_akhir/fileTA/'+dtl[6]+'" target="_blank" class="btn btn-success btn-xs margin" download="TA_'+dtl[6]+'"><span class="glyphicon glyphicon-circle-arrow-down"></span> Download</a>';
	var linkSeminar='<a href="documents/tugas_akhir/bukti_seminar/'+dtl[7]+'" target="_blank"  class="btn btn-success btn-xs margin" download="bukti_seminar_'+dtl[7]+'"><span class="glyphicon glyphicon-circle-arrow-down"></span> Download</a>';
	var linkSidang='<a href="documents/tugas_akhir/bukti_sidang/'+dtl[8]+'" target="_blank" class="btn btn-success btn-xs margin" download="bukti_sidang'+dtl[8]+'"><span class="glyphicon glyphicon-circle-arrow-down"></span> Download</a>';
	var box_content='<div id="overlaysubpanel"></div>';
	box_content=box_content+'<div id="subpanelcontainer" class="container">\
							<div class="row">\
								<div class="col-md-8 col-md-offset-2" id="subpanelcontent" style="height:400px;overflow-y:scroll;">\
									<div class="row-margin-top">\
										<table  border=1; style="color:black;width:100%;">\
											<tr><td> <h4 style="color:black;">BP</h4> </td> <td>'+dtl[0]+'</td> </tr>\
											<tr><td> <h4 style="color:black;">Nama</h4> </td> <td>'+dtl[1].rplcapostrophe()+'</td> </tr>\
											<tr><td> <h4 style="color:black;">Judul</h4> </td> <td>'+dtl[2]+'</td> </tr>\
											<tr><td> <h4 style="color:black;">Abstrak</h4> </td> <td>'+dtl[3]+'</td> </tr>\
											<tr><td> <h4 style="color:black;">Tanggal Post</h4> </td> <td>'+dtl[4]+'</td> </tr>\
											<tr><td> <h4 style="color:black;">Kategori TA</h4> </td> <td>'+dtl[5]+'</td> </tr>\
											<tr><td> <h4 style="color:black;">FileTA</h4> </td> <td>'+linkTA+'</td> </tr>\
											<tr><td> <h4 style="color:black;">Bukti Seminar</h4> </td> <td>'+linkSeminar+'</td> </tr>\
											<tr><td> <h4 style="color:black;">Bukti Sidang</h4> </td> <td>'+linkSidang+'</td> </tr>\
										</table></br>\
									</div>\
									<div id="subpanel_close_detailTA" class="subpanel_close">Close</div>\
								</div>\
							</div>\
							</div>';	
	_("subpanel").innerHTML=box_content;
	document.getElementById("subpanel_close_detailTA").onclick=function(){document.getElementById("subpanel").innerHTML="";if(dtl[9]==1){notifLihatTA();}};
}
function hajar(){
	alert("sip");
	
}
//-----------------------------------------------------------------------------------------------------notif admin
if ((_("JmlhTABlmDlht"))&&(_("TABlmDlht"))){
	notifLihatTA();
}
if ((_("JmlhRegMhsBlmDlht"))&&(_("RegMhsBlmDlht"))){
	notifRegMhs();
}
function notifLihatTA(){
	ajax = new XMLHttpRequest();
	ajax.addEventListener("load", completeHandlernotifLihatTA, false);
	ajax.open("GET", "models/ajax_fileTA.php?op=notifLihatTA");
	ajax.send();
}
function completeHandlernotifLihatTA(event){
	var dtl=event.target.responseText.split('+=|=+');
	_("JmlhTABlmDlht").innerHTML=dtl[0];
	_("TABlmDlht").innerHTML=dtl[1];
}
function notifRegMhs(){
	ajax = new XMLHttpRequest();
	ajax.addEventListener("load", completeHandlernotifRegMhs, false);
	ajax.open("GET", "models/ajax_tabelRegistrasiTAmhs.php?op=notifLihatRegMhs");
	ajax.send(null);
}
function completeHandlernotifRegMhs(event){
	var dtl=event.target.responseText.split('+=|=+');
	_("JmlhRegMhsBlmDlht").innerHTML=dtl[0];
	_("RegMhsBlmDlht").innerHTML=dtl[1];
}
//-----------------------------------------------------------------------------------------------------BackUP Mahasiswa
function downloadBackUp(){
	window.location = 'sista.sql';
}
//-----------------------------------------------------------------------------------------------------Kategori TA
function hapusKategoriTA(ID){
	//alert(idmahasiswa);
	var box_content='<div id="overlay"></div>';
	box_content=box_content+'<div id="box_frame1" class="row"><div class="col-md-6 col-md-offset-3"><img src="images/loading.gif"/></div></div>';
	_("dynamic").innerHTML=box_content;
	ajax = new XMLHttpRequest();
	ajax.addEventListener("load", completeHandlernotifRegMhs, false);
	ajax.open("GET", "models/ajax_KategoriTA.php?op=hapusKategoriTA&ID="+ID);
	ajax.send(null);
	window.location.href = '?route=mypanel&action=kategoriTA';	
}