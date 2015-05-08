(function(){
	//var h5PageSlide = function(element, useroptions){
//		var now = { row:1, col:1 }, last = { row:0, col:0};
//	    const towards = { up:1, right:2, down:3, left:4};
//	    var isAnimating = false;
//	    useroptions = (useroptions === undefined) ? {} : useroptions;
//	    var options = $.extend({
//            sContainer: element,
//        }, useroptions);
//	}
    var now = { row:1, col:1 }, last = { row:0, col:0};
    const towards = { up:1, right:2, down:3, left:4};
    var isAnimating = false;
    var pagesRow = $("#fullscrool").data('row');
  	var limitNum = function(){
    	var arr = [];
    	var idxs = 1;
    	while(idxs < pagesRow+1){
    		arr.push($('[class*="page-'+idxs+'-"]').length);
    		idxs++;
    	}
    	return arr;
    }
    var limitColNum = limitNum();//每行配置页数
    var limitRowNum = pagesRow;//行数
    var sidePst = function(idx){
        var pglen = limitColNum[idx-1];
        var str = '';
        for (var i = 0; i < pglen; i++) {
            str+='<li class="indicator '+(i==0?'active':'')+'" data-index="'+i+'"></li>';
        };
        $('#slideposition').html('<ul>'+str+'</ul>');
        $('#slideposition>ul>li').on("click",function(e){
            var index = $(this).data("index") + 1;
            var i_lf;
            if(index>now.col){
                i_lf = towards.left;
            }else if(index<now.col){
                i_lf = towards.right;
            }else{
                return;
            }
            last.row = now.row;
            last.col = now.col;
            now.row = last.row; now.col = index;                    
            pageMove(i_lf);
        })
    }
    sidePst(now.row);
    s=window.innerHeight/500;
    ss=250*(1-s);

    $('.wrap').css('-webkit-transform','scale('+s+','+s+') translate(0px,-'+ss+'px)');

    document.addEventListener('touchmove',function(event){event.preventDefault(); },false);


    var Hammer = $.AMUI.Hammer;

    var hammertime = new Hammer(document.getElementById('fullscrool'));
    //hammertime.add(new Hammer.Swipe());
    hammertime.get('swipe').set({ direction: Hammer.DIRECTION_ALL });
    
    hammertime.on('swipeleft', function(e) {
        if (isAnimating) return;
        console.log(last,now)
        last.row = now.row;
        last.col = now.col;
        
        if (last.row>0 && last.row<limitRowNum && last.col<limitColNum[now.row-1]) { now.row = last.row; now.col = now.col + 1; pageMove(towards.left);}
    });
    hammertime.on('swiperight', function(e) {
        if (isAnimating) return;
        last.row = now.row;
        last.col = now.col;
        if (last.row>0 && last.row<limitRowNum && last.col!=1) { now.row = last.row; now.col = now.col - 1; pageMove(towards.right);}   
    });
    hammertime.on('swipeup', function(e) {
        if (isAnimating) return;
        console.log(last,now)
        last.row = now.row;
        last.col = now.col;
        if (last.row != limitRowNum) { now.row = last.row+1; now.col = 1; pageMove(towards.up);}
        sidePst(now.row);
    });
    hammertime.on('swipedown', function(e) {
        if (isAnimating) return;
        last.row = now.row;
        last.col = now.col;
        if (last.row!=1) { now.row = last.row-1; now.col = 1; pageMove(towards.down);}
        sidePst(now.row);  
    });
    function pageMove(tw){
        var lastPage = ".page-"+last.row+"-"+last.col,
            nowPage = ".page-"+now.row+"-"+now.col;
        
        switch(tw) {
            case towards.up:
                outClass = 'pt-page-moveToTop';
                inClass = 'pt-page-moveFromBottom';
                break;
            case towards.right:
                outClass = 'pt-page-moveToRight';
                inClass = 'pt-page-moveFromLeft';
                break;
            case towards.down:
                outClass = 'pt-page-moveToBottom';
                inClass = 'pt-page-moveFromTop';
                break;
            case towards.left:
                outClass = 'pt-page-moveToLeft';
                inClass = 'pt-page-moveFromRight';
                break;
        }
        isAnimating = true;
        $(nowPage).removeClass("hide");
        
        $(lastPage).addClass(outClass);
        $(nowPage).addClass(inClass);
        
        setTimeout(function(){
            $(lastPage).removeClass('page-current');
            $(lastPage).removeClass(outClass);
            $(lastPage).addClass("hide");
            $(lastPage).find("img").addClass("hide");
            
            $(nowPage).addClass('page-current');
            $(nowPage).removeClass(inClass);
            $(nowPage).find("img").removeClass("hide");
          
            $('[data-index="'+(last.col-1)+'"]').removeClass('active');
            $('[data-index="'+(now.col-1)+'"]').addClass('active')
            isAnimating = false;
        },600);
    }

})();