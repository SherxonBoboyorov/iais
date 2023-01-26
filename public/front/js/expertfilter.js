


$(document).ready(function(){
    let filterExpertForm = $('#filterExpertForm');
    let checkBoxButton = $('input[type="checkbox"]');
    let resultSection = $('#resultExpertSection');

    let showMoreButton = $('.filter_show_more');

    


    checkBoxButton.click(function(e){
        formValues = filterExpertForm.serialize();
        getMessage(formValues)
    });

    showMoreButton.click(function(e){
        id = $(this).data('id');
        less = $(this).data('less');
        let section = $('#regionSection'+id);
        if(e.target.dataset.less=='0'){
            $.ajax({
                type:'GET',
                url:'/expertpeoples/ajax-filter-details',
                data:{id:id},
                success:function(res){
                    e.target.dataset.less=1
                    let showLessText = e.target.dataset.showless
                    e.target.innerHTML = showLessText + ' <span><i class="fas fa-angle-up"></i></span>';
                    section.empty();
                    section.append(res)
                },
                error: function(errors) {
                 console.log(errors);
               }
             });
        }
        else{
            $.ajax({
                type:'GET',
                url:'/expertpeoples/ajax-filter-details',
                data:{id:id,lim:4},
                success:function(res){
                    e.target.dataset.less=0
                    let showMoreText = e.target.dataset.showmore
                    e.target.innerHTML = showMoreText+' <span><i class="fas fa-angle-down"></i></span>';
                    section.empty();
                    section.append(res)
                },
                error: function(errors) {
                 console.log(errors);
               }
             });
        }
      
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
