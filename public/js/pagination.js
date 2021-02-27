/*!
 * pagination v1.4.1 (https://github.com/nashaofu/pagination)
 * Copyright 2018 nashaofu
 * Licensed under MIT
 */

!function(a){"use strict";"function"==typeof define&&define.amd?define(["jquery"],a):"function"==typeof define&&define.cmd?define(function(b,c,d){a(b("jquery"))}):a(jQuery)}(function(a){"use strict";var b=function(c,d){this.$target=c,this.options=a.extend({},b.DEFAULTS,this.$target.data("pagination"),"object"==typeof d&&d),this.init()};b.VERSION="1.4.0",b.DEFAULTS={total:1,current:1,length:10,size:2,prev:"&lt;",next:"&gt;",click:function(a){}},b.prototype={init:function(){if(this.options.total<1&&(this.options.total=1),this.options.current<1&&(this.options.current=1),this.options.length<1&&(this.options.length=1),this.options.current>Math.ceil(this.options.total/this.options.length)&&(this.options.current=Math.ceil(this.options.total/this.options.length)),this.options.size<1&&(this.options.size=1),"function"==typeof this.options.ajax){var a=this;this.options.ajax({current:a.options.current,length:a.options.length,total:a.options.total},function(b){return a.refresh(b)},a.$target)}else this.render();this.onClick()},render:function(){var a=this.options,b=this.$target;b.empty(),b.append('<li><a herf="javascript:void(0)" data-page="prev">'+a.prev+"</a></li>");var c=this.getPages();c.start>1&&(b.append('<li><a herf="javascript:void(0)" data-page="1">1</a></li>'),b.append("<li><span>...</span></li>"));for(var d=c.start;d<=c.end;d++)b.append('<li><a herf="javascript:void(0)" data-page="'+d+'">'+d+"</a></li>");c.end<Math.ceil(a.total/a.length)&&(b.append("<li><span>...</span></li>"),b.append('<li><a herf="javascript:void(0)" data-page="'+Math.ceil(a.total/a.length)+'">'+Math.ceil(a.total/a.length)+"</a></li>")),b.append('<li><a herf="javascript:void(0)" data-page="next">'+a.next+"</a></li>"),b.find('li>a[data-page="'+a.current+'"]').parent().addClass("active"),a.current<=1&&b.find('li>a[data-page="prev"]').parent().addClass("disabled"),a.current>=Math.ceil(a.total/a.length)&&b.find('li>a[data-page="next"]').parent().addClass("disabled")},getPages:function(){var a=(this.$target,this.options),b=a.current-a.size,c=a.current+a.size;return a.current>=Math.ceil(a.total/a.length)-a.size&&(b-=a.current-Math.ceil(a.total/a.length)+a.size),a.current<=a.size&&(c+=a.size-a.current+1),b<1&&(b=1),c>Math.ceil(a.total/a.length)&&(c=Math.ceil(a.total/a.length)),{start:b,end:c}},onClick:function(){var b=this.$target,c=this.options,d=this;b.off("click"),b.on("click",">li>a[data-page]",function(e){if(!a(this).parent().hasClass("disabled")&&!a(this).parent().hasClass("active")){var f=a(this).data("page");switch(f){case"prev":c.current>1&&c.current--;break;case"next":c.current<Math.ceil(c.total)&&c.current++;break;default:f=parseInt(f),isNaN(f)||(c.current=parseInt(f))}var g={current:c.current,length:c.length,total:c.total};"function"==typeof c.ajax?c.ajax(g,function(a){return d.refresh(a)},b):d.render(),c.click(g,b)}})},refresh:function(a){"object"==typeof a&&(a.total&&(this.options.total=a.total),a.length&&(this.options.length=a.length)),this.render()}},a.fn.pagination=function(c){return this.each(function(){a(this).data("pagination",new b(a(this),c))}),this}});