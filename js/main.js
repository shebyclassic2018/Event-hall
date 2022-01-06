$(document) . ready (() => {
    var hallEvent = new HallEvent();
    hallEvent.logout();
    hallEvent.searchHall();
   
})


class HallEvent {
    constructor() {
        this.logout = () => {
            $(".logout-cover") . hide();
            $("#logout").click(() => {
                $(".logout-cover") . fadeIn()
            });

            $("#confirm") . click(() => {
                window.open("logout.php", "_SELF");
            })

            $("#cancel") . click (() => {
                $(".logout-cover") . fadeOut();
            })
        };


        this. searchHall = () => {
            var content = $("#search-field") . val();
    if (content.length > 0) {
      $(".direct-fetch") . hide();
      $(".searched-item") . fadeIn();
    } else {
      $(".searched-item") . hide();
      $(".direct-fetch") . fadeIn();
    }
  
    $("#search-field") . keyup(() => {
      content = $("#search-field") . val();
      if (content.length > 0) {
        $(".direct-fetch") . hide();
        $(".searched-item") . fadeIn();
        $(".searched-item") . html("");
  
        $.post("php/search-hall.php", {content : content}, (data) => {
            
            if (data != "null") {
                var obj = JSON.parse(data);
                $("#hall_name").val(obj.hall_name);
                var hall_name = $("#hall_name") . val() . split(',');

                $("#price").val(obj.price);
                var price = $("#price") . val() . split(',');
                
                $("#hall_id").val(obj.id);
                var hall_id = $("#hall_id") . val() . split(',');
  
                $("#capacity").val(obj.capacity);
                var capacity = $("#capacity") . val() . split(',');

                $("#hall_picture").val(obj.hall_picture);
                var hall_picture = $("#hall_picture") . val() . split(',');

                $("#link").val(obj.link);
                var link = $("#link") . val() . split(',');
                
                for (var i = 0; i < hall_name.length; i++) {
                  
                  $(".searched-item") . append(
                    '<div class="hall-frame shadow-000-5">'
                + '<div class="img">'
                    + '<img src="image/hall/'+hall_picture[i]+'">'
                + '</div>'
                + '<div class="hall-button pad-15 flex">'
                    + '<div class="flex-1">'
                       + '<div class="flex">'
                            +'<div class="flex-1">Hall Name</div> '
                            +'<div class="flex-1">'+hall_name[i]+'</div> '
                       +' </div>'
                        +'<div class="flex">'
                           +' <div class="flex-1">Capacity</div> '
                           +' <div class="flex-1">'+capacity[i]+' People</div> '
                       +' </div>'
                        +'<div class="flex">'
                           +' <div class="flex-1">Price</div> '
                           +'<div class="flex-1">'+price[i]+' Tshs</div> '
                        +'</div>'
                    +'</div>'
                +'</div>'
                +'<div class="flex-center">'
                        +'<a href="'+link[i]+'?hall_id='+hall_id[i]+'" class="order-btn round-5 wt-100 flex-center">Order Now</a>'
                    +'</div>'
           +' </div><br><br><br><br><br>'
                  );
                }
                
              
            } else {
              $(".searched-item") . html("<div class='alert alert-info pad-15 wt-100' >No match found</div>");
            }
        })
  
      } else {
        $(".searched-item") . hide();
        $(".direct-fetch") . fadeIn();
      }
    })
        }
    }
}


