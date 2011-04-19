
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22841460-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

function curpage() {
  var url = location.href
  var name = url.substring(url.lastIndexOf('/')+1)
  var nameArr = name.split('.')
  name = nameArr[0]
  if (name.length == 0) {
    document.getElementById('index').className += ' currpage'
  } else {
    var element = document.getElementById(name)
    if (element != null) {
      element.className += ' currpage'
    }
  }
}