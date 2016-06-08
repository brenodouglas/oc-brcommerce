$(document).ready(function(){
    $('#Form-secondaryTabs .tab-pane.layout-cell').addClass('padded-pane');
    $('#Form-field-Product-sku').keypress(function(e){
        if(e.which === 13){
            return false;
        }
    });
});
