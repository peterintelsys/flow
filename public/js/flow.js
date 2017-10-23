document.getElementById("defaultOpen").click();  


function showDrop(obj){

        var xdrop = obj.getAttribute('data-target');

        var x = document.getElementById(xdrop);
        if (x.style.display === 'flex') {
        x.style.display = 'none';
    }

     else {
        x.style.display = 'flex';
    }

    
}

function closeDrop(obj){
    var ydrop = obj.getAttribute('data-target');
        var y = document.getElementById(ydrop);
        y.style.display = 'none';
}


    


