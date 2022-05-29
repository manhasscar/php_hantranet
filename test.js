function sidemenu() {
    
    if(document.iframe1.location.href == 'http://localhost/site/main.php'){

        document.getElementById('left').style.display = 'block';
        
    
    }
    else{
        document.getElementById('left').style.display = 'none';
        
    }

    
}

sidemenu();