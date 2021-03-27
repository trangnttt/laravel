!function(t,i){"function"==typeof define&&define.amd?define(i):"object"==typeof exports?module.exports=i():t.Sparkline=i()}(window,(function(){function t(i,n){this.element=i,this.options=function(t,i){var n={};for(var o in i)n[o]=o in t?t[o]:i[o];return n}(n||{},t.options),this.element.innerHTML="<canvas></canvas>",this.canvas=this.element.firstChild,this.context=this.canvas.getContext("2d"),this.ratio=window.devicePixelRatio||1,this.options.tooltip&&(this.canvas.style.position="relative",this.canvas.onmousemove=s.bind(this))}function i(t,i,n,o,s){var e=i-t;return 0==e?n+o/2:n+o-(this[s]-t)/e*o}function n(t,i,n,s,e,h,l){this.context.beginPath(),this.context.fillStyle=s,this.context.arc(h,l,t,0,2*Math.PI,!1),this.context.fill(),o.call(this,i,n,e,h,l)}function o(t,i,n,o,s){n&&(this.context.save(),this.context.strokeStyle=n.color||"black",this.context.lineWidth=(n.width||1)*this.ratio,this.context.globalAlpha=n.alpha||1,this.context.beginPath(),this.context.moveTo("right"!=n.direction?t:o,s),this.context.lineTo("left"!=n.direction?i:o,s),this.context.stroke(),this.context.restore())}function s(t){var i,n,o,s=t.offsetX||t.layerX||0,e=(this.options.width-2*this.options.dotRadius)/(this.points.length-1),h=(i=0,n=Math.round((s-this.options.dotRadius)/e),o=this.points.length-1,Math.max(i,Math.min(n,o)));this.canvas.title=this.options.tooltip(this.points[h],h,this.points)}return t.options={width:100,height:null,lineColor:"black",lineWidth:1.5,startColor:"transparent",endColor:"black",maxColor:"transparent",minColor:"transparent",minValue:null,maxValue:null,minMaxValue:null,maxMinValue:null,dotRadius:2.5,tooltip:null,fillBelow:!0,fillLighten:.5,startLine:!1,endLine:!1,minLine:!1,maxLine:!1,bottomLine:!1,topLine:!1,averageLine:!1},t.init=function(i,n){return new t(i,n)},t.draw=function(i,n,o){var s=new t(i,o);return s.draw(n),s},t.prototype.draw=function(t){t=t||[],this.points=t,this.canvas.width=this.options.width*this.ratio,this.canvas.style.width=this.options.width+"px";var s=this.options.height||this.element.offsetHeight;this.canvas.height=s*this.ratio,this.canvas.style.height=s+"px";var e=this.options.lineWidth*this.ratio,h=Math.max(this.options.dotRadius*this.ratio,e/2),l=Math.max(this.options.dotRadius*this.ratio,e/2),a=this.canvas.width-2*h,r=this.canvas.height-2*l,c=Math.min.apply(Math,t),p=Math.max.apply(Math,t),x=null!=this.options.minValue?this.options.minValue:Math.min(c,null!=this.options.maxMinValue?this.options.maxMinValue:c),d=null!=this.options.maxValue?this.options.maxValue:Math.max(p,null!=this.options.minMaxValue?this.options.minMaxValue:p),u=h,f=h,m=h,g=i.bind(t,x,d,l,r),v=a/(t.length-1),w=n.bind(this,this.options.dotRadius*this.ratio,h,a+h),b=o.bind(this,h,a+h);if(this.context.save(),this.context.strokeStyle=this.options.lineColor,this.context.fillStyle=this.options.lineColor,this.context.lineWidth=e,this.context.lineCap="round",this.context.lineJoin="round",this.options.fillBelow&&t.length>1){this.context.save(),this.context.beginPath(),this.context.moveTo(m,g(0));for(var L=1;L<t.length;L++)m+=v,u=t[L]==c?m:u,f=t[L]==p?m:f,this.context.lineTo(m,g(L));this.context.lineTo(a+h,r+l+e/2),this.context.lineTo(h,r+l+e/2),this.context.fill(),this.options.fillLighten>0?(this.context.fillStyle="white",this.context.globalAlpha=this.options.fillLighten,this.context.fill(),this.context.globalAlpha=1):this.options.fillLighten<0&&(this.context.fillStyle="black",this.context.globalAlpha=-this.options.fillLighten,this.context.fill()),this.context.restore()}m=h,this.context.beginPath(),this.context.moveTo(m,g(0));for(L=1;L<t.length;L++)m+=v,this.context.lineTo(m,g(L));this.context.stroke(),this.context.restore(),b(this.options.bottomLine,0,l),b(this.options.topLine,0,r+l+e/2),w(this.options.startColor,this.options.startLine,h+(1==t.length?a/2:0),g(0)),w(this.options.endColor,this.options.endLine,h+(1==t.length?a/2:a),g(t.length-1)),w(this.options.minColor,this.options.minLine,u+(1==t.length?a/2:0),g(t.indexOf(c))),w(this.options.maxColor,this.options.maxLine,f+(1==t.length?a/2:0),g(t.indexOf(p)))},t}));