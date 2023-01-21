$(document).ready(function(){
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems, options);
      });
    
      // Or with jQuery
    
      $(document).ready(function(){
        $('.modal').modal();
      });

      // -------------------------------------------------------------------

      document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.sidenav');
        var instances = M.Sidenav.init(elems, options);
      });
    
      // Or with jQuery
    
      $(document).ready(function(){
        $('.sidenav').sidenav();
      });
});

// -------------------------------===========-------------------------------

$(function(){
    let Catalog_max__pro__ul_link = document.querySelectorAll('.header__ru__link');
  
    for(let i = 0; i<Catalog_max__pro__ul_link.length; i++){
        Catalog_max__pro__ul_link[i].addEventListener('click',function(){
            for(let j = 0; j<Catalog_max__pro__ul_link.length;j++){
                Catalog_max__pro__ul_link[j].classList.remove('active');
            }
            this.classList.add('active');
  
        })
    }
  });

// -------------------------------===========-------------------------------

const buttons = document.querySelectorAll('.header__link__cart');
buttons.forEach(function(button, index) {
  button.addEventListener('click', function(e) {
    e.preventDefault();
    
    this.parentNode.classList.toggle('active');
    
    buttons.forEach(function(button2, index2) {
      if ( index !== index2 ) {
        button2.parentNode.classList.remove('active');
      }
    });
  });
});

// -------------------------------===========-------------------------------

const buttons1 = document.querySelectorAll('.history__download__title__h3');
buttons1.forEach(function(button, index) {
  button.addEventListener('click', function(e) {
    e.preventDefault();
    
    this.parentNode.classList.toggle('active');
    
    buttons1.forEach(function(button2, index2) {
      if ( index !== index2 ) {
        button2.parentNode.classList.remove('active');
      }
    });
  });
});

// -------------------------------===========-------------------------------

$(function(){
  let Catalog_max__pro__ul_link = document.querySelectorAll('.history__menu__link');

  for(let i = 0; i<Catalog_max__pro__ul_link.length; i++){
      Catalog_max__pro__ul_link[i].addEventListener('click',function(){
          for(let j = 0; j<Catalog_max__pro__ul_link.length;j++){
              Catalog_max__pro__ul_link[j].classList.remove('active');
          }
          this.classList.add('active');

      })
  }
});

// -------------------------------===========-------------------------------

$(function(){
  let Catalog_max__pro__ul_link = document.querySelectorAll('.experts__pagination__link');

  for(let i = 0; i<Catalog_max__pro__ul_link.length; i++){
      Catalog_max__pro__ul_link[i].addEventListener('click',function(){
          for(let j = 0; j<Catalog_max__pro__ul_link.length;j++){
              Catalog_max__pro__ul_link[j].classList.remove('active');
          }
          this.classList.add('active');

      })
  }
});

// -------------------------------===========-------------------------------

$( ".centers_in__link__cart" ).click(function() {
  $(this ).each(function( i ) {
    if ( this.style.position !== "relative" ) {
      this.style.position = "relative";
      let Catalog_max__pro__ul_link = document.querySelectorAll('.centers_in__cart__item');
      for(let i = 0; i<Catalog_max__pro__ul_link.length; i++){
          Catalog_max__pro__ul_link[i].addEventListener('click',function(){
              for(let j = 0; j<Catalog_max__pro__ul_link.length;j++){
                  Catalog_max__pro__ul_link[j].classList.remove('centers_in__active');
              }
              this.classList.add('centers_in__active');
          })
      }
      
    } else {
      this.style.position = "";
      let Catalog_max__pro__ul_link = document.querySelectorAll('.centers_in__cart__item');
      for(let i = 0; i<Catalog_max__pro__ul_link.length; i++){
          Catalog_max__pro__ul_link[i].addEventListener('click',function(){
              for(let j = 0; j<Catalog_max__pro__ul_link.length;j++){
                  Catalog_max__pro__ul_link[j].classList.remove('centers_in__active');
              }
              this.classList.add('centers_in__active_12');
          })
      }
    }
  });
});

// -------------------------------===========-------------------------------