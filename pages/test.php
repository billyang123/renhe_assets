<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>101</title>

    <script type="text/javascript" src="http://www.qmik.org/lib/Qmik.all.2.2.10.js"></script>
    <link href="../_public/stylesheets/app.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div q-ctrl="demoCtrl" class="box" >
      <p> 全局: ${gname} </p>
      倒计时: <input name="time" type="text"/> ${time} 或 {{time}}

      <div>
          <h3>用户信息  //qmik会自动把user.* 转换成 scope.user ={name:"",nick:"" ...} </h3>
          <p>user.name <input name="user.name" type="text"/>  ${user.name}</p>
          <p>user.nick <input name="user.nick" type="text"/> ${user.nick}</p>
          <p>user.email <input name="user.email" type="text"/> ${user.email}</p>
          <p>user.qq <input name="user.qq" type="text"/> ${user.qq}</p>

          <h3>//显示列表,ul下面的内容是模板,qmik会根据模板来生成相应的页面</h3>
          <h3>
              //q-onclick:是定义的单击事件,可以通过q-onxxx来定义事件,如:q-onclick,q-ontouchmove等
          </h3>
          <ul q-for="item in list" q-onclick="clickList" class="box">
              <li>${item.title}</li>
          </ul>
      </div>
    </div>
    <script>


        $.app(function(scope){//全局控制器的写法
            scope.gname="lllleeeeoooo";
        }).ctrl({
          demoCtrl: function(scope){//定义控制器  scope:会话,作用空间在q-ctrl里面,不能超出
            scope.once({//只触发一次,采用 $.fn.once 方法实现
                viewport: function(){//当控制器所在的位置进入可显示的视口位置时,触发这个方法
                    ///$.ajax({});
                    scope.user.name="leo";
                    scope.user.nick="leo";
                    scope.user.email="cwq0312@163.om";
                    scope.user.qq="555";
                    scope.apply("user");
                }
            });

            scope.watch({//监听器
                //监听name值的变化,发现变化,会触发此事件(通过change事件来触发)
                //因此如果想要手动触发这个方法,需要通过scope.apply(["user.name"]);来触发事件
                "user.name": function(map){
                    $.log("watch:", map);
                },
                "user": function(map){//监听所有user(.*)?的变化

                }
            });

            scope.list= [{
                title:'leo1'
            },{
                title:'leo2'
            }];

            scope.clickList = function(e){

                var i = parseInt(Math.random() * 2);
                var color = i%2==1 ? "red": "green"; 
                $(e.target).css("backgroundColor",color);
            }

            scope.time = 999;
            $.cycle(function(){
                scope.time--;
                scope.apply(["time"]);//更新到界面
            }, 1000);
          }
        });

    </script>
</div>
  </body>
</html>