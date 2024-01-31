// JavaScript Document

function getQueryVariable(variable) { 
    var query = window.location.search.substring(1); 
    var vars = query.split("&"); 
    for (var i=0;i<vars.length;i++) { 
        var pair = vars[i].split("="); 
        if (pair[0] == variable) { 
            return pair[1]; 
        } 
    } 
    return null;
} 

function mailingEmailChanged() {
    if ($('mailing_email').value) {
       $$('#mailing_list text').addClass('focus');
    } else
        $$('#mailing_list text').removeClass('focus');
}

window.addEvent('domready', function() {    
    if ($('mailing_list')) {       
        $('mailing_email').onblur = mailingEmailChanged;
        $('mailing_email').onkeyup = mailingEmailChanged;
        $('mailing_email').onchange = mailingEmailChanged;
    }
});