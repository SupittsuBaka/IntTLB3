var ajax = new XMLHttpRequest();

function getText() {
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                console.dir(ajax.responseText);
                document.getElementById("1").innerHTML = ajax.response;
            }
        }
    }
    var nursename = document.getElementById("nursename").value;
    ajax.open("get", "handlernname.php?nursename=" + nursename);
    ajax.send();
}

function getXML() {
    
    var department = document.getElementById("depart").value;
    ajax.open("get", "handlerdepart.php?depart=" + department);
    ajax.send();
	ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
				console.dir(ajax);
				
                let rows = ajax.responseXML.children;
                let result = "<table border ='1'>";
                for (var i = 0; i < rows.length; i++) {
                    result += "<tr>";
                    result += "<td>" + rows[i].children[0].firstChild.nodeValue + "</td>";
                    result += "<td>" + rows[i].children[1].firstChild.nodeValue + "</td>";
                    result += "<td>" + rows[i].children[2].firstChild.nodeValue + "</td>";
                    result += "</tr>";
                }
                document.getElementById("2").innerHTML = result;
            }
        }
    }
}

function getJSON() {
    ajax.onreadystatechange = function(){
        let rows = JSON.parse(ajax.responseText);
    console.dir(rows);
    if (ajax.readyState === 4) {
        if (ajax.status === 200) {
            console.dir(ajax);
            let result = "<table border ='1'>";
            result = result + "<tr><th>Player</th><th>Date</th><th>Place</th><th>Score</th><th>Team1</th><th>Team2</th></tr>";
            for (var i = 0; i < rows.length; i++) {
                result += "<tr>";
                result += "<td>" + rows[i].name+ "</td>";
                result += "<td>" + rows[i].date + "</td>";
                result += "<td>" + rows[i].department + "</td>";
                result += "</tr>";
            }
            document.getElementById("3").innerHTML = result;
        }
    }
    };
    var shiftname = document.getElementById("shiftname").value;
    ajax.open("get", "handlershift.php?shiftname=" + shiftname);
    ajax.send();
}