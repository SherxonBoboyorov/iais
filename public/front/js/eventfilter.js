$(document).ready(function(){
    let filterForm = $('#filtereventForm');
    let checkBoxButton = $('input[type="checkbox"]');
    let resultSection = $('#result_event_section');

    let showMoreButton = $('.filter_show_more');

    let eventType = $('.eventtype-change');

    eventType.click(function(e){
        e.preventDefault();
        eventTypeValue = e.target.dataset.eventtype;
        filterForm.data('l',eventTypeValue);
        formValues = filterForm.serialize()+'&'+'l='+eventTypeValue;
        getMessage(formValues);
    });

    console.log(showMoreButton);
    showMoreButton.click(function(e){
        console.log(showMoreButton);
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


    checkBoxButton.click(function(e){
        formValues = filterForm.serialize()+'&'+'l='+filterForm.data('l');
        getMessage(formValues)
    });

    function getMessage(formValues) {
        $.ajax({
           type:'POST',
           url:'/eventproducts/ajax-event-filter',
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




