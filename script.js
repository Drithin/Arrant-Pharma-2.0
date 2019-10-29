// $(window).scroll(function(){
// 	$('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
// });

// $(window).scroll(function(){
//     var scroll = $(window).scrollTop();
//     if(scroll < 200){
//         $('.fixed-top').css('background-color', 'transparent');
//     } else{
//         $('.fixed-top').css('background-color', 'rgba(21, 26, 68, 0.9)');
//     }
// });

// console.log("Hello");

// $(document).ready(function(){
//     console.log("Hi");
//    var scroll_start = 0;
//    var startchange = $('#change-bg-color-now');
//    var offset = startchange.offset();

//    console.log("Hi2");
//    console.log(startchange.length);
//    console.log(offset);

//    if(startchange.length){

//        $(document).scroll(function(){
//         console.log("Hi3");
//            scroll_start = $(this).scrollTop();
//            console.log(scroll_start);
//            console.log(offset.top)

//            if(scroll_start>offset.top){
//             console.log("Hi4");
//                $('.navbar-custom').css('background-color', 'rgba(21, 26, 68, 0.9) !important' );
//             console.log("Hi5");
//            } else{
//             console.log("Hi6");
//             $('.navbar-custom').css('background-color', 'transparent !important'  );
//             console.log("Hi7");
//            }
//        })
//    }
// })

// $(document).ready(function(){
//     $(window).scroll(function(){
//         var scroll = $(window).scrollTop();
//         console.log(scroll);
//         if(scroll>150){
//             console.log("Hey");
//             $("#nav").css("background-color", "rgba(21, 26, 68, 0.9)");
//             console.log("Hello");
//         }
//         // else{
//         //     $("#nav").css("background-color", "transparent");
//         // }
//     })
// })

$(document).ready(function(){
    $(window).scroll(function(){
        var scroll = $(window).scrollTop();
        if (scroll > 200) {
          $(".navbar").css("background-color" , "rgba(21, 26, 68, 0.9)");
       
        //   $(" .navbar").css("height" , "20%");
        }
  
        else{
            $(".navbar").css("background-color" , "transparent");  	
        }

     


       

    })

    

   

    
  })

 
