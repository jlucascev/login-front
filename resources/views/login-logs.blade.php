<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                
            </div>
        </div>
    </body>
    <script type="text/javascript">
        
        $(document).ready(function(){
            refresh();
            window.setInterval(refresh,5000);
        });


        function refresh(){
            $.get('/auth-login/front/public/ajax',function(data){

                data = JSON.parse(data);

                var html="";
                $.each(data,function(index,val){
                    html += "<p>"+val.email+" "+val.fecha+"</p>";
                });


                $(".content").empty();
                $(".content").append(html);
            });
        }

    </script>
</html>
