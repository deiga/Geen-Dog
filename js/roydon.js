
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