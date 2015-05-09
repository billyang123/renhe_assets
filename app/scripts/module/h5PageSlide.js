(function($){
	var h5PageSlideFn = function(element, useroptions){
        var obj = this;

		var now = { row:1, col:1 }, last = { row:0, col:0};
	    const towards = { up:1, right:2, down:3, left:4};
	    var isAnimating = false;
	    useroptions = (useroptions === undefined) ? {} : useroptions;
	    var options = $.extend({
           element: element,
           pagesRow:$(element).data('row') || 1
        }, useroptions);
        obj.limitColNum = 1;
        obj.init = function(){
            obj.limitColNum = obj.limitNum(options.pagesRow);
            obj.sidePst(now.row);
            s=window.innerHeight/500;
            ss=250*(1-s);

            $('.wrap').css('-webkit-transform','scale('+s+','+s+') translate(0px,-'+ss+'px)');

            document.addEventListener('touchmove',function(event){event.preventDefault(); },false);
            
            var Hammer = $.AMUI.Hammer;

            var hammertime = new Hammer($(options.element)[0]);
            hammertime.get('swipe').set({ direction: Hammer.DIRECTION_ALL });
            hammertime.on('swipeleft', obj.spLeft);
            hammertime.on('swiperight', obj.spRight);
            hammertime.on('swipeup', obj.spUp);
            hammertime.on('swipedown', obj.spDown);
        }
        obj.limitNum = function(pagesRow){
            var arr = [];
            var idxs = 1;
            while(idxs < pagesRow+1){
                arr.push($('[class*="page-'+idxs+'-"]').length);
                idxs++;
            }
            return arr;
        }
        obj.sidePst = function(idx){
            var pglen = obj.limitColNum[idx-1];
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
                obj.pageMove(i_lf);
            })
        }
        obj.spLeft = function(e) {
            if (isAnimating) return;
            last.row = now.row;
            last.col = now.col;           
            if (last.row>0 && last.row<options.pagesRow && last.col<obj.limitColNum[now.row-1]) { now.row = last.row; now.col = now.col + 1; obj.pageMove(towards.left);}
        }
        obj.spRight = function(e){
            if (isAnimating) return;
            last.row = now.row;
            last.col = now.col;
            if (last.row>0 && last.row<options.pagesRow && last.col!=1) { now.row = last.row; now.col = now.col - 1; obj.pageMove(towards.right);}  
        }
        obj.spUp = function(e){
            if (isAnimating) return;
            
            last.row = now.row;
            last.col = now.col;
            if (last.row != options.pagesRow) { now.row = last.row+1; now.col = 1; obj.pageMove(towards.up);}
            obj.sidePst(now.row);
        }
        obj.spDown = function(e){
            if (isAnimating) return;
            last.row = now.row;
            last.col = now.col;
            if (last.row!=1) { now.row = last.row-1; now.col = 1; obj.pageMove(towards.down);}
            obj.sidePst(now.row); 
        }
        obj.pageMove = function(tw){
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
	}
    $.fn.h5PageSlide = function(options){
        return this.each(function(){
            var element = $(this);

            // Return early if this element already has a plugin instance
            if (element.data('h5PageSlide')) return;

            // Pass options and element to the plugin constructer
            var h5PageSlide = new h5PageSlideFn(this, options);
            h5PageSlide.init();
            // Store the plugin object in this element's data
            element.data('h5PageSlide', h5PageSlide);
        });
    }
    $("#fullscrool").h5PageSlide()
})(jQuery);