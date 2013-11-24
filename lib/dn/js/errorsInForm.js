$(document).ready(function(){
    $('input[type="text"]').each(function(){
        if($(this).val() == ''){
            $(this) .attr('placeholder', 'Ce champ est obligatoire')
                    .parent().attr('class', $(this).parent().attr('class')+' has-error')
                    .prev().css('color', '#b94a48');
        }
    });
});