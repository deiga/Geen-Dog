
function curpage() {
  var url = location.href
  var name = url.substring(url.lastIndexOf('/')+1)
  var nameArr = name.split('.')
  name = nameArr[0]
  if (name.length == 0) {
    document.getElementById('index').className += ' currpage'
  } else {
    document.getElementById(name).className += ' currpage'
  }
}