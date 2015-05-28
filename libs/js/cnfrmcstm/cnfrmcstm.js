var boolbantu=false;
function open_box(message,par1,par2)
{
boolbantu=false;
var box_content='<div id="overlay" class="overlay"></div>';
box_content=box_content+'<div id="box_frame"><div id="box">'+message+'<br><div id="cnfrm_sbmt" onclick="confirmyes(\''+par1+'\',\''+par2+'\')">Submit</div><div id="cnfrm_cncl">Cancel</div></div></div>';
document.getElementById("dynamic").innerHTML=box_content;

document.getElementById("cnfrm_cncl").onclick=function(){
document.getElementById("dynamic").innerHTML="";
boolbantu=false;
};
}


function reset_dynamic()
{
document.getElementById("dynamic").innerHTML="";
}
