function format_validation() {
    var pattern = /^\d{1,2}\/\d{1.2}\/\d{4}$/;
    if(!postarea.Tanggal.value.match(pattern)) {
        alert("Invalid date format");
        postarea.Tanggal.focus();
        return false;
    }
    return true;            
}

var data = new Date();

function convert_to_date() {
	var my_date = postarea.Tanggal.value;
	var parts = my_date.split('/');
	var result = new Date(parts[2],parts[1]-1,parts[0],data.getHours(),data.getMinutes(),data.getSeconds());
    
	if (result.setHours(0,0,0,0) >= data.setHours(0,0,0,0)) {
		return true;
	}
	else {
		alert("Input tanggal salah.");
		return false;
	}
}