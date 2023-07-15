$(document).ready(function(){
    // $('.list').click(function(){
    //   const value = $(this).attr('data-filter');
    //   if (value == 'all'){
    //     $('.itemsbox').show('1000');
    //   }
    //   else {
    //     $('.itemsbox').not('.'+value).hide('1000');
    //     $('.itemsbox').filter('.'+value).show('1000');
    //   }
    // })
  //add active class on selected item
  $('.list').click(function(){
    $(this).addClass('active').siblings().removeClass('active');
    })
  })
