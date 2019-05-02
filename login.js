function card_form(valeur)
{
   objMess = document.getElementById('mess');
     if(valeur=="paypal"){
        document.getElementById('info_carte').style.display = none;
       // objMess.innerHTML = " ertbetb";
     }else{
           document.getElementById('info_carte').style.display = block;
       // objMess.innerHTML = "Vous venez de changer la valeur de l'option" 
     }

    // $("div").toggle();
     
}