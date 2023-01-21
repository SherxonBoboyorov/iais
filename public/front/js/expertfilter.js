


$(document).ready(function(){
    let filterExpertForm = $('#filterExpertForm');
    let checkBoxButton = $('input[type="checkbox"]');
    let resultSection = $('#resultExpertSection');
    checkBoxButton.click(function(e){
        formValues = filterExpertForm.serialize();
        getMessage(formValues)
    });

    function getMessage(formValues) {
        $.ajax({
           type:'POST',
           url:'/expertpeoples/ajax-expert-filter',
           data:formValues,
           success:function(res){
            console.log(resultSection,res);
            resultSection.empty();
            resultSection.append(res)
           },
           error: function(errors) {
            console.log(errors);
          }
        });
    }
})
