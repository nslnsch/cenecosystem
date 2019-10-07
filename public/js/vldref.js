function vldref(){
	refint=document.getElementById("int").selectedIndex;
	refext=document.getElementById("ext").selectedIndex;
	id_real=document.getElementById("id_real").selectedIndex;
	if (refint === 0 && refext === 0){
        swal({
            type: "info",
            title: "Debe seleccionar una referencia valida!",
            showConfirmButton: false,
            timer: 2000
        });
        return false;
	}else if(id_real === 0){
		swal({
            type: "info",
            title: "Debe seleccionar quien realizará el estudio?",
            showConfirmButton: false,
            timer: 2000
        });
        return false;
	}
}

function vldrefc(){
	refint=document.getElementById("int").selectedIndex;
	refext=document.getElementById("ext").selectedIndex;
	if((refint == null)||(refint == 0)){
		document.getElementById("ext").disabled=false;
	}else if((refint !== null)||(refint !== 0)){
		document.getElementById("ext").disabled=true;
	}
	if((refext == null)||(refext == 0)){
		document.getElementById("int").disabled=false;
	}else if((refext !== null)||(refext !== 0)){
		document.getElementById("int").disabled=true;
	}
}