$(document).ready(function(){
    $('input[type="text"]').each(function(){
        if($(this).val() == ''){
            $(this) .attr('placeholder', 'Ce champ est obligatoire')
                    .parent().attr('class', $(this).parent().attr('class')+' has-error')
                    .prev().css('color', '#b94a48');
        }
    });
    
    var reg = new RegExp("^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$", "g");
    var mail = $('#inputMail');
    if(reg.test(mail.val()))
        mail    .attr('class', 'form-control has-success')
                .parent().attr('class', 'col-sm-6 has-success')
                .prev().css('color', '#468847');
    else{
        mail    .attr('class', 'form-control has-error')
                .parent().attr('class', 'col-sm-6 has-error')
                .prev().css('color', '#b94a48');
    }
});