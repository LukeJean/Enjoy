var myVid=document.getElementById("player"); 
            myVid.addEventListener("timeupdate",timeupdate);     
            var _endTime; 
     
            //CuPlayer.com视频播放 
            function playMedia(startTime,endTime){ 
            //CuPlayer.com设置结束时间 
                _endTime = endTime; 
                var file = document.getElementById("file").files[0]; 
                if(!file){ 
                    alert("请指定视频路径"); 
                    return false; 
                } 
                var url = (window.URL) ? window.URL.createObjectURL(file) : window.webkitURL.createObjectURL(file); 
                myVid.src = url; 
                myVid.controls = true; 
                setTimeout("setCurrentTime('"+startTime+"')",200); 
            } 
     
            //CuPlayer.com设置视频开始播放事件 
            function setCurrentTime(startTime){ 
                myVid.currentTime=startTime; 
                myVid.play(); 
            } 
     
            function timeupdate(){ 
                //CuPlayer.com因为当前的格式是带毫秒的float类型的如：12.231233，所以把他转成String了便于后面分割取秒 
                var time = myVid.currentTime+""; 
                document.getElementById("showTime").value=time; 
                var ts = time.substring(0,time.indexOf(".")); 
                if(ts==_endTime){ 
                    myVid.pause(); 
                } 
            } 