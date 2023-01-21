


$(document).ready(function(){
    let filterForm = $('#filterForm');
    let checkBoxButton = $('input[type="checkbox"]');
    let resultSection = $('#result_section');
    checkBoxButton.click(function(e){
        formValues = filterForm.serialize();
        getMessage(formValues)
    });

    function getMessage(formValues) {
        $.ajax({
           type:'POST',
           url:'/outputnews/ajax-filter',
           data:formValues,
           success:function(res){
            resultSection.empty();
            resultSection.append(res)
           },
           error: function(errors) {
          }
        });
    }
})
