function addField(inputBaseName, containerName){    
    var container = document.getElementById(containerName);    
    for (i=0;i<number;i++){
        container.appendChild(document.createTextNode(einputBaseName + (i+1)));
        var input = document.createElement("input");
        input.type = "text";
        container.appendChild(input);        
    }
}